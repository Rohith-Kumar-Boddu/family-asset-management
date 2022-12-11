import Navbar from './Navbar';

function Recover() {
  return (
    <div className="">
      <Navbar currentpage='login'  />
      <div className='wrapper'>
        <h4>Forgot Password</h4>
        <p>You Can recover your Password using your email address</p>
        <div className='wrapper-content'>
            <form className='form'>
                <div className='form-content'>
                    <div className='form-row'>
                        <label>Email</label>
                        <input type='email' placeholder='Email'/>
                    </div>
                    <div className='form-btn'>
                        <button>Submit</button>
                    </div>
                </div>
            </form>
        </div>
        
        
      </div>
      
    </div>
  );
}

export default Recover;
