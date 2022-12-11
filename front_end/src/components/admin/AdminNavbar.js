import {Link} from 'react-router-dom';
import { useState } from 'react';

function AdminNavbar( {currentpage}) {
  const [toggle,setToggle]=useState(false);
  return (
    <div className="navbar">
      <div>
        <Link to='/admin'>
            {/* <img src={logo} alt="Logo"/> */}
        </Link>
        <Link className={`menubar ${toggle?"active":""}`} onClick={e => (setToggle(!toggle))} to='#'>
          <span className='fa fa-bars'></span>
        </Link>
      </div>
      <div>
        <ul className={toggle?"active":""}>
            <li><Link to='/admin' className={`navbar-item ${currentpage==='home'?"active":""}`} ><span className='fa fa-home'></span> Dashboard</Link></li>
            <li><Link to='/admin/trials' className={`navbar-item ${currentpage==='trials'?"active":""}`}>Trials</Link></li>
            <li><Link to='/admin/family' className={`navbar-item ${currentpage==='family'?"active":""}`}><span className='fa fa-users'></span> Family</Link></li>
            <li><Link to='/admin/projects' className={`navbar-item ${currentpage==='projects'?"active":""}`}>Projects</Link></li>
            <li><Link to='/admin/properties' className={`navbar-item ${currentpage==='properties'?"active":""}`}><span className='fa fa-building'></span> Properties</Link></li>
            <li><Link to='/admin/contactform' className={`navbar-item ${currentpage==='contactus'?"active":""}`}><span className='fa fa-envelope'></span> Questions</Link></li>
            <li><Link to='/admin/profile' className={`navbar-item ${currentpage==='profile'?"active":""}`}><span className='fa fa-user'></span> Profile</Link></li>
            <li><Link to='/login' className="navbar-item logout"><span className='fa fa-power-off'></span> Logout</Link></li>
        </ul>
      </div>
    </div>
  );
}

export default AdminNavbar;
