import AdminNavbar from './AdminNavbar';

function AdminProfile() {
  let account=localStorage.getItem('account');
  if(localStorage.getItem('account')){
    account=JSON.parse(localStorage.getItem('account'));
  }
  else{
    account=false;
  }
  return (
    <div className="">
      <AdminNavbar currentpage='profile'  />
      <div className='wrapper'>
        <h4>Profile</h4>
        <div className=''>
            <div className=''>
              <div className=''>
                    <form>
                        <div className='form-content'>
                            <p>Your User Information</p>
                            <div className='form-row'>
                                <label>First Name</label>
                                <input type='text' value={account['firstname']} disabled placeholder='First Name'/>
                            </div>
                            <div className='form-row'>
                                <label>Last Name</label>
                                <input type='text' value={account['lastname']} disabled placeholder='Last Name'/>
                            </div>
                            <div className='form-row'>
                                <label>Email</label>
                                <input type='text' value={account['email']} disabled placeholder='Email'/>
                            </div>
                            <div className='form-row'>
                                <label>Gender</label>
                                <input type='text' value={account['gender']} disabled placeholder='Gender'/>
                            </div>

                            <div className='form-row'>
                                <label>Phone</label>
                                <input type='text' value={account['phone']} disabled placeholder='Phone'/>
                            </div>
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

        
        
        
      </div>
      
    </div>
  );
}

export default AdminProfile;
