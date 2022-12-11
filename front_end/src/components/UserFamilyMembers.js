import React ,{useState} from 'react';
import loader from '../img/loading-blue.gif';
import axios from 'axios';
import UserNavbar from './UserNavbar';
import UserFamilyMembersTable from './UserFamilyMembersTable';

function UserFamilyMembers() {
  const [loading,setLoading]=useState(false);
  const [loadingerror,setLoadingerror]=useState(false);
  const [loadingstatus,setLoadingstatus]=useState(false);
  const [family,setFamily]=useState('');
  const [member,setMember]=useState('');
  const [location,setLocation]=useState('');
  const [show,setShow]=useState(false);

  const submitFamilMemberform=(e) =>{
    e.preventDefault();
    setLoadingerror(false);
    setLoadingstatus(false);
    let account=localStorage.getItem('account');
    if(localStorage.getItem('account')){
      account=JSON.parse(localStorage.getItem('account'));
    }
    else{
      account=false;
    }
    if(family===''){
        setLoadingerror('Family ID is Required');
    }
    else if(member===''){
        setLoadingerror('Member Name is Required');
    }
    else if(location===''){
        setLoadingerror('Member Location is Required');
    }
    else if(!account){
        setLoadingerror('Please Logout and Login Again');
    }
    else{
      setLoadingerror(false);
      setLoading(true);
      

      let trialform=new FormData();
      trialform.append('location',location);
      trialform.append('family',family);
      trialform.append('membername',member);
      trialform.append('userid',account['id']);

      axios.post(process.env.REACT_APP_BACKEND_URL_LARAVEL+'member',trialform)
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
      <UserNavbar currentpage='family'  />
      <div className='wrapper'>
        <h4>Family Members</h4>
        <div className='wrapper-content'>
        {!show &&
            <div className='wrapper-full'>
              <div className=''>
                    <form>
                        <div className='form-content'>
                            <p>Family Members New Form. <button className='btn-action' onClick={() =>setShow(!show)}><span className='fa fa-info-circle'></span> Show Members</button></p>
                            <div className='form-row'>
                                <label>Family ID</label>
                                <input type='text' placeholder='Family Id'
                                  value={family} onChange={(event) => setFamily(event.target.value)}/>
                            </div>
                            <div className='form-row'>
                                <label>Member Name</label>
                                <input type='text' placeholder='Member Name'
                                  value={member} onChange={(event) => setMember(event.target.value)}/>
                            </div>
                            <div className='form-row'>
                                <label>Member Location</label>
                                <input type='text' placeholder='Member Location'
                                  value={location} onChange={(event) => setLocation(event.target.value)}/>
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
                                <button onClick={submitFamilMemberform}>
                                  {loading?
                                      <img src={loader} alt="loader" width='40px' height='20px' />
                                    :
                                    'Save Member'
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
              <p>Family Members. <button className='btn-action' onClick={() =>setShow(!show)}><span className='fa fa-plus-circle'></span> New Member</button></p>
              <UserFamilyMembersTable />
              
          </div>
          }
        </div>
      </div>
      
    </div>
  );
}

export default UserFamilyMembers;
