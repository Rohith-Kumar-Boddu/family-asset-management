import React ,{useState} from 'react';
import loader from '../../img/loading-blue.gif';
import axios from 'axios';
import AdminNavbar from './AdminNavbar';
import AdminProjectsTable from './AdminProjectsTable';

function AdminProjects() {
  const [loading,setLoading]=useState(false);
  const [loadingerror,setLoadingerror]=useState(false);
  const [loadingstatus,setLoadingstatus]=useState(false);
  const [family,setFamily]=useState('');
  const [location,setLocation]=useState('');
  const [projectname,setProjectname]=useState('');
  const [cost,setCost]=useState('');
  const [details,setDetails]=useState('');
  const [show,setShow]=useState(false);

  const costReg=/[0-9]{1,10}?/g

  
  let account=localStorage.getItem('account');
  if(localStorage.getItem('account')){
    account=JSON.parse(localStorage.getItem('account'));
  }
  else{
    account=false;
  }
  const submitProjectform=(e) =>{
    e.preventDefault();
    setLoadingerror(false);
    setLoadingstatus(false);
    if(location===''){
        setLoadingerror('Project Location is Required');
    }
    else if(projectname===''){
        setLoadingerror('Project Name is Required');
    }
    else if(cost===''){
        setLoadingerror('Project Cost is Required');
    }
    else if(!costReg.test(cost)){
        setLoadingerror('Please Specify a Valid amount');
    }
    else if(family===''){
        setLoadingerror('Family ID is Required');
    }
    else if(details===''){
        setLoadingerror('Trial Details is Required');
    }
    else{
      setLoadingerror(false);
      setLoading(true);
      let trialform=new FormData();
      trialform.append('location',location);
      trialform.append('family',family);
      trialform.append('projectname',projectname);
      trialform.append('cost',cost);
      trialform.append('details',details);
      trialform.append('userid',account['id']);

      axios.post(process.env.REACT_APP_BACKEND_URL_LARAVEL+'project',trialform)
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
      <AdminNavbar currentpage='projects'  />
      <div className='wrapper'>
        <h4>Family Projects</h4>
        <div className='wrapper-content'>
          {!show &&
            <div className='wrapper-full'>
              <div className=''>
                    <form>
                    <div className='form-content'>
                      <p>New Project Form. <button className='btn-action' onClick={() =>setShow(!show)}><span className='fa fa-info-circle'></span> Show Projects</button></p>
                      <div className='form-row'>
                          <label>Project Location</label>
                          <input type='text' placeholder='Project Location'
                            value={location} onChange={(event) => setLocation(event.target.value)}/>
                      </div>
                      <div className='form-row'>
                          <label>Project Name</label>
                          <input type='text' placeholder='Project Name'
                            value={projectname} onChange={(event) => setProjectname(event.target.value)}/>
                      </div>
                      <div className='form-row'>
                          <label>Cost</label>
                          <input type='number' placeholder='Cost'
                            value={cost} onChange={(event) => setCost(event.target.value)}/>
                      </div>
                      <div className='form-row'>
                          <label>Family ID</label>
                          <input type='text' placeholder='Family ID'
                            value={family} onChange={(event) => setFamily(event.target.value)}/>
                      </div>
                      <div className='form-row'>
                          <label>Details</label>
                          <textarea placeholder='Project Details'
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
                          <button onClick={submitProjectform}>
                            {loading?
                                <img src={loader} alt="loader" width='40px' height='20px' />
                              :
                              'Save Project'
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
              <p>Family Projects. <button className='btn-action' onClick={() =>setShow(!show)}><span className='fa fa-plus-circle'></span> New Project</button></p>
              <AdminProjectsTable />
              
          </div>
          }
        </div>

        
        
        
      </div>
      
    </div>
  );
}

export default AdminProjects;
