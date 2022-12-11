import UserNavbar from './UserNavbar';
import UserStatsChart from './UserStatsChart';
import UserStatsAllChart from './UserStatsAllChart';

function User() {
  let account=localStorage.getItem('account');
  if(localStorage.getItem('account')){
    account=JSON.parse(localStorage.getItem('account'));
  }
  else{
    account=false;
  }
  return (
    <div className="">
      <UserNavbar currentpage='home'  />
      <div className='wrapper'>
        <h4>Welcom User ({account['firstname']+' '+account['lastname']})</h4>
        <div className='wrapper-content'>
          <div className='wrapper-left'>
              <p>A chart showing the data for this Year</p>
              <UserStatsChart />
          </div>
          <div className='wrapper-left'>
              <p>Information About All Family related issues and resources.</p>
              <UserStatsAllChart />
          </div>
        </div>
        
        
      </div>
      
    </div>
  );
}

export default User;
