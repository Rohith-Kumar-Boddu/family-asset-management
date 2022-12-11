import React ,{useState} from 'react';
import loader from '../img/loading-blue.gif';
import axios from 'axios';
import {Link, Navigate} from 'react-router-dom';
import Navbar from './Navbar';

function Login() {
    const [loading,setLoading]=useState(false);
    const [loadingerror,setLoadingerror]=useState(false);
    const [loadingstatus,setLoadingstatus]=useState(false);
    const [email,setEmail]=useState('');
    const [password,setPassword]=useState('');
    const [redirect,setRedirect]=useState(false);
    const [redirectto,setRedirectto]=useState('');

    const loginnow=(e) =>{
        e.preventDefault();
        setLoadingerror(false);
        setLoadingstatus(false);
        const emailReg=/[a-zA-Z0-9._%+-]+@[a-z0-9+-]+\.[a-z]{2,4}(.[a-z{2,4}])?/g
        const passReg=/(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/g
        if(email===''){
            setLoadingerror('Email is Required');
        }
        else if(!emailReg.test(email)){
            setLoadingerror('Invalid Email Address');
        }
        else if(password===''){
            setLoadingerror('Password is Required');
        }
        else if(!passReg.test(password)){
            setLoadingerror('Ensure Password has 6-16 Characters and alteast 1 letter, number and special characters');
        }
        else{
          setLoadingerror(false);
          setLoading(true);
          let signinform=new FormData();
          signinform.append('email',email);
          signinform.append('password',password);

          axios.post(process.env.REACT_APP_BACKEND_URL_LARAVEL+'signin',signinform)
          .then(result =>{
              if(result.data.success){
                let account=result.data.account;
                localStorage.setItem('account',JSON.stringify(result.data.account));
                setLoading(false);
                setLoadingstatus(result.data.success);
                setRedirect(true);
                setRedirectto('/'+account['role'])
              }
              else{
                setLoading(false);
                setLoadingerror(result.data.error);
              }
          })
          .catch(err=>{
              setLoading(false);
              setLoadingerror("x. "+ err);
          })
        }
    }

    if(redirect){
      return <Navigate to={redirectto} />
    }
  return (
    <div className="">
      <Navbar currentpage='login'  />
      <div className='wrapper'>
        <h4>Login to Family Site</h4>
        <div className='wrapper-content'>
            <form className='form'>
                <div className='form-content'>
                    <div className='form-row'>
                        <label>Email</label>
                        <input type='email' placeholder='Email'
                          value={email} onChange={(event) => setEmail(event.target.value)}/>
                    </div>
                    <div className='form-row'>
                        <label>Password</label>
                        <input type='password' placeholder='Password'
                          value={password} onChange={(event) => setPassword(event.target.value)}/>
                    </div>
                    {loadingerror &&
                      <div className='form-row'>
                        <p className='form-error'>
                          {loadingerror}
                          <button onClick={() =>setLoadingerror(false)}><span className='fa fa-times'></span></button>
                        </p>
                      </div>
                    }
                    {loadingstatus &&
                      <div className='form-row'>
                        <p className='form-status'>
                          {loadingstatus}
                          <button onClick={() =>setLoadingstatus(false)}><span className='fa fa-times'></span></button>
                        </p>
                      </div>
                    }
                    <div className=''>
                        <button className='submit-btn' onClick={loginnow}>
                          {loading?
                              <img src={loader} alt="loader" width='40px' height='20px' />
                            :
                            'Login Now'
                          }
                        </button>
                    </div>
                    <br/>
                    <Link to='/forgot-password'>Forgot Password?</Link>
                </div>
                
                
                
                
            </form>
        </div>
        
        
      </div>
      
    </div>
  );
}

export default Login;
