import {Link} from 'react-router-dom';
import { useState } from 'react';

function Navbar( {currentpage}) {
  const [toggle,setToggle]=useState(false);
  return (
    <div className="navbar">
      <div>
        {/* <Link to='/'>
            <img src={logo} alt="Logo"/>
        </Link> */}
        <Link className={`menubar ${toggle?"active":""}`} onClick={e => (setToggle(!toggle))} to='#'>
          <span className='fa fa-bars'></span>
        </Link>
      </div>
      <div>
        <ul className={toggle?"active":""}>
            <li><Link to='/' className={`navbar-item ${currentpage==='home'?"active":""}`} ><span className='fa fa-home'></span> Home Page</Link></li>
            <li><Link to='/about' className={`navbar-item ${currentpage==='about'?"active":""}`}>About</Link></li>
            <li><Link to='/contactus' className={`navbar-item ${currentpage==='contactus'?"active":""}`}><span className='fa fa-phone'></span> Contact Us</Link></li>
            {/* <li><Link to='/blog' className={`navbar-item ${currentpage==='blog'?"active":""}`}>Blog</Link></li> */}
            <li><Link to='/register' className={`navbar-item account ${currentpage==='register'?"active":""}`}>Register</Link></li>
            <li><Link to='/login' className={`navbar-item account ${currentpage==='login'?"active":""}`}>Login</Link></li>
        </ul>
      </div>
    </div>
  );
}

export default Navbar;
