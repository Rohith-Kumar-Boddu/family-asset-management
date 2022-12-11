import Navbar from './Navbar';

function About() {
  return (
    <div className="">
      <Navbar currentpage='about'  />
      <div className='wrapper'>
        <h4>About Family Site</h4>
        <div className='wrapper-content'>
            {/* <div className='wrapper-left'>
                <img src={diazsifonteslogo3} alt='Home Page Photo' />
            </div> */}
            <div className='wrapper-right'>
                <h3>About Us</h3>
                <p>Every Family Contains many projects and properties/land not properly managed.</p>
                <p>Here, all issues related to Family are solved.</p>
                <p>From Family Members to what they Own</p>
                
            </div>
        </div>
        
        
      </div>
      
    </div>
  );
}

export default About;
