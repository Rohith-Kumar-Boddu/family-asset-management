import React ,{useState} from 'react';
import loader from '../../img/loading-blue.gif';
import axios from 'axios';
import AdminNavbar from './AdminNavbar';
import AdminPropertiesTable from './AdminPropertiesTable';

function AdminProperties() {
  const [loading,setLoading]=useState(false);
  const [loadingerror,setLoadingerror]=useState(false);
  const [loadingstatus,setLoadingstatus]=useState(false);
  const [family,setFamily]=useState('');
  const [location,setLocation]=useState('');
  const [units,setUnits]=useState('');
  const [sellingperunit,setSellingperunit]=useState('');
  const [details,setDetails]=useState('');
  const [show,setShow]=useState(false);
  
  const unitReg=/[0-9]{1,8}?/g
  const spriceReg=/[0-9]{1,10}?/g
  
  let account=localStorage.getItem('account');
  if(localStorage.getItem('account')){
    account=JSON.parse(localStorage.getItem('account'));
  }
  else{
    account=false;
  }

  const submitPropertyform=(e) =>{
    e.preventDefault();
    setLoadingerror(false);
    setLoadingstatus(false);
    if(location===''){
        setLoadingerror('Property Location is Required');
    }
    else if(units===''){
        setLoadingerror('Property Units is Required');
    }
    else if(!unitReg.test(units)){
        setLoadingerror('Please Specify valid Units');
    }
    else if(sellingperunit===''){
        setLoadingerror('Property Selling Price per UNit is Required');
    }
    else if(!spriceReg.test(sellingperunit)){
        setLoadingerror('Please Specify valid Units');
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
      trialform.append('units',units);
      trialform.append('sellingperunit',sellingperunit);
      trialform.append('details',details);
      trialform.append('userid',account['id']);

      axios.post(process.env.REACT_APP_BACKEND_URL_LARAVEL+'property',trialform)
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
      <AdminNavbar currentpage='properties'  />
      <div className='wrapper'>
        <h4>Family Properties</h4>
        <div className='wrapper-content'>
        {!show &&
            <div className='wrapper-full'>
              <div className=''>
                    <form>
                      <div className='form-content'>
                        <p>New Property Form. <button className='btn-action' onClick={() =>setShow(!show)}><span className='fa fa-info-circle'></span> Show Properties</button></p>
                        <div className='form-row'>
                            <label>Property Location</label>
                            <input type='text' placeholder='Property Location'
                              value={location} onChange={(event) => setLocation(event.target.value)}/>
                        </div>
                        <div className='form-row'>
                            <label>Units</label>
                            <input type='number' placeholder='Units'
                              value={units} onChange={(event) => setUnits(event.target.value)}/>
                        </div>
                        <div className='form-row'>
                            <label>Selling Price per Unit</label>
                            <input type='number' placeholder='Cost'
                              value={sellingperunit} onChange={(event) => setSellingperunit(event.target.value)}/>
                        </div>
                        <div className='form-row'>
                            <label>Family ID</label>
                            <input type='text' placeholder='Family ID'
                              value={family} onChange={(event) => setFamily(event.target.value)}/>
                        </div>
                        <div className='form-row'>
                            <label>Details</label>
                            <textarea placeholder='Property Details'
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
                            <button onClick={submitPropertyform}>
                            {loading?
                                <img src={loader} alt="loader" width='40px' height='20px' />
                              :
                              'Save Property'
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
              <p>Family Properties. <button className='btn-action' onClick={() =>setShow(!show)}><span className='fa fa-plus-circle'></span> New Property</button></p>
              <AdminPropertiesTable />
              
          </div>
          }
        </div>

        
        
        
      </div>
      
    </div>
  );
}

export default AdminProperties;
