import logo from '../img/diaz-sifontes-logo21.png';
import {Link} from 'react-router-dom';
import { useState } from 'react';

function UserNavbar( {currentpage}) {
  const [toggle,setToggle]=useState(false);
  return (
    <div className="navbar">
      <div>
        <Link to='/user'>
            <img src={logo} alt="Logo"/>
        </Link>
        <Link className={`menubar ${toggle?"active":""}`} onClick={e => (setToggle(!toggle))} to='#'>
          <span className='fa fa-bars'></span>
        </Link>
      </div>
      <div>
        <ul className={toggle?"active":""}>
            <li><Link to='/user' className={`navbar-item ${currentpage==='home'?"active":""}`} ><span className='fa fa-home'></span> Dashboard</Link></li>
            <li><Link to='/user/trials' className={`navbar-item ${currentpage==='trials'?"active":""}`}>Trials</Link></li>
            <li><Link to='/user/family' className={`navbar-item ${currentpage==='family'?"active":""}`}><span className='fa fa-users'></span> Members</Link></li>
            <li><Link to='/user/projects' className={`navbar-item ${currentpage==='projects'?"active":""}`}>Projects</Link></li>
            <li><Link to='/user/properties' className={`navbar-item ${currentpage==='properties'?"active":""}`}><span className='fa fa-building'></span> Properties</Link></li>
            <li><Link to='/user/profile' className={`navbar-item ${currentpage==='profile'?"active":""}`}><span className='fa fa-user'></span> Profile</Link></li>
            <li><Link to='/login' className="navbar-item logout"><span className='fa fa-power-off'></span> Logout</Link></li>
        </ul>
      </div>
    </div>
  );
}

export default UserNavbar;
