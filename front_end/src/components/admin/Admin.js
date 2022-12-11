import AdminNavbar from './AdminNavbar';
import AdminStatsChart from './AdminStatsChart';
import AdminStatsAllChart from './AdminStatsAllChart';

function Admin() {
  let account=localStorage.getItem('account');
  if(localStorage.getItem('account')){
    account=JSON.parse(localStorage.getItem('account'));
  }
  else{
    account=false;
  }

  return (
    <div className="">
      <AdminNavbar currentpage='home'  />
      <div className='wrapper'>
        <h4>Welcom Admin ({account['firstname']+' '+account['lastname']})</h4>
        <div className='wrapper-content'>
          <div className='wrapper-left'>
              <p>A chart showing the data for this Year</p>
              <AdminStatsChart />
          </div>
          <div className='wrapper-left'>
              <p>Information About All Family related issues and resources.</p>
              <AdminStatsAllChart />
          </div>
        </div>
        
        
      </div>
      
    </div>
  );
}

export default Admin;
