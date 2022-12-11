import diazsifontes from '../img/diaz-sifontes1.png';
import Navbar from './Navbar';

function Home() {
  return (
    <div className="">
      <Navbar currentpage='home'  />
      <div className='wrapper'>
        <h4>Welcome to Family Site</h4>
        <div className='wrapper-content'>
          <div className='wrapper-left'>
              <p>Welcome to the Family Site!</p>
              <img src={diazsifontes} alt='Home Page' />
          </div>
          <div className='wrapper-right'>
              <p>Every Family Contains many projects and properties/land not properly managed.</p>
              <p>Here, all issues related to Family are solved.</p>
          </div>
        </div>
        
        
      </div>
      
    </div>
  );
}

export default Home;
