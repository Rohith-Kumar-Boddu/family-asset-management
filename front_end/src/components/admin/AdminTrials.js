import React ,{useState} from 'react';
import loader from '../../img/loading-blue.gif';
import axios from 'axios';
import AdminNavbar from './AdminNavbar';
import AdminTrialsTable from './AdminTrialsTable';

function AdminTrials() {
  const [loading,setLoading]=useState(false);
  const [loadingerror,setLoadingerror]=useState(false);
  const [loadingstatus,setLoadingstatus]=useState(false);
  const [family,setFamily]=useState('');
  const [status,setStatus]=useState('');
  const [details,setDetails]=useState('');
  const [show,setShow]=useState(false);

  let account=localStorage.getItem('account');
  if(localStorage.getItem('account')){
    account=JSON.parse(localStorage.getItem('account'));
  }
  else{
    account=false;
  }

  const submitRegisterform=(e) =>{
    e.preventDefault();
    setLoadingerror(false);
    setLoadingstatus(false);
    if(family===''){
        setLoadingerror('Family ID is Required');
    }
    else if(status===''){
        setLoadingerror('Trial Status is Required');
    }
    else if(details===''){
        setLoadingerror('Trial Details is Required');
    }
    else{
      setLoadingerror(false);
      setLoading(true);
      let trialform=new FormData();
      trialform.append('status',status);
      trialform.append('family',family);
      trialform.append('details',details);
      trialform.append('userid',account['id']);

      axios.post(process.env.REACT_APP_BACKEND_URL_LARAVEL+'trial',trialform)
      .then(result =>{
          if(result.data.success){
          setLoading(false);
          setLoadingstatus(result.data.success);
          }
          else{
          setLoading(false);
          setLoadingerror(result.data.error);
          }
      })
      .catch(err=>{
          setLoading(false);
          setLoadingerror("x. "+ err);
      })
    }
  }
  return (
    <div className="">
      <AdminNavbar currentpage='trials'/>
      <div className='wrapper'>
        <h4>Trials</h4>
        <div className='wrapper-content'>
          {!show &&
          <div className='wrapper-full'>
            <div className=''>
                  <form>
                    <div className='form-content'>
                      <p>New Family Trial Form. <button className='btn-action' onClick={() =>setShow(!show)}><span className='fa fa-info-circle'></span> Show Trial</button></p>
                      <div className='form-row'>
                          <label>Family ID</label>
                          <input type='text' placeholder='Family Id'
                            value={family} onChange={(event) => setFamily(event.target.value)}/>
                      </div>
                      <div className='form-row'>
                          <label>Status</label>
                          <input type='text' placeholder='Status'
                            value={status} onChange={(event) => setStatus(event.target.value)}/>
                      </div>
                      <div className='form-row'>
                          <label>Details</label>
                          <textarea placeholder='Trial Details'
                            value={details} onChange={(event) => setDetails(event.target.value)}></textarea>
                      </div>
                      {loadingerror &&
                        <div className='form-row'>
                          <p className='form-error'>
                            {loadingerror}
                            <button onClick={() =>setLoadingerror(false)}><span className='fa fa-times'></span></button>
                          </p>
                        </div>
                      }
                      {loadingstatus &&
                        <div className='form-row'>
                          <p className='form-status'>
                            {loadingstatus}
                            <button onClick={() =>setLoadingstatus(false)}><span className='fa fa-times'></span></button>
                          </p>
                        </div>
                      }
                      <div className='form-btn'>
                          <button onClick={submitRegisterform}>
                            {loading?
                                <img src={loader} alt="loader" width='40px' height='20px' />
                              :
                              'Save Trial'
                            }
                          </button>
                      </div>
                    </div>
                      
                  </form>
              </div>
          </div>
          }
          {show &&
          <div className='wrapper-full'>
              <p>Family Trials. <button className='btn-action' onClick={() =>setShow(!show)}><span className='fa fa-plus-circle'></span> New Trial</button></p>
              <AdminTrialsTable />
          </div>
          }
        </div>

      </div>
      
    </div>
  );
}

export default AdminTrials;
