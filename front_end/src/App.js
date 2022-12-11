import './App.css';
import './styles.css';

import {BrowserRouter as Router , Route, Routes} from 'react-router-dom';

import Home from './components/Home';
import About from './components/About';
import Register from './components/Register';
import Contactus from './components/Contactus';
import Login from './components/Login';
import Blog from './components/Blog';
import Recover from './components/Recover';

import User from './components/User';
import UserTrials from './components/UserTrials';
import UserFamilyMembers from './components/UserFamilyMembers';
import UserProjects from './components/UserProjects';
import UserProperties from './components/UserProperties';
import UserProfile from './components/UserProfile';

import Admin from './components/admin/Admin';
import AdminFamily from './components/admin/AdminFamily';
import AdminFamilyMembers from './components/admin/AdminFamilyMembers';
import AdminProjects from './components/admin/AdminProjects';
import AdminProperties from './components/admin/AdminProperties';
import AdminTrials from './components/admin/AdminTrials';
import AdminProfile from './components/admin/AdminProfile';
import AdminContactform from './components/admin/AdminContactform';

function App() {
  return (
    <div className="App">
      <Router>
        <Routes>
          <Route path='/' element={<Home />} />
          <Route path='/about' element={<About />} />
          <Route path='/register' element={<Register />} />
          <Route path='/login' element={<Login />} />
          <Route path='/contactus' element={<Contactus />} />
          <Route path='/blog' element={<Blog />} />
          <Route path='/forgot-password' element={<Recover />} />
          

          <Route path='/user' element={<User />} />
          <Route path='/user/trials' element={<UserTrials />} />
          <Route path='/user/family' element={<UserFamilyMembers />} />
          <Route path='/user/projects' element={<UserProjects />} />
          <Route path='/user/properties' element={<UserProperties />} />
          <Route path='/user/profile' element={<UserProfile />} />


          <Route path='/admin' element={<Admin />} />
          <Route path='/admin/trials' element={<AdminTrials />} />
          <Route path='/admin/family' element={<AdminFamily />} />
          <Route path='/admin/projects' element={<AdminProjects />} />
          <Route path='/admin/properties' element={<AdminProperties />} />
          <Route path='/admin/profile' element={<AdminProfile />} />
          <Route path='/admin/contactform' element={<AdminContactform />} />
          
          <Route path='/admin/family/members' element={<AdminFamilyMembers />} />


        </Routes>
      </Router>
    </div>
  );
}

export default App;
