import React ,{useState} from 'react';
import loader from '../img/loading-blue.gif';
import axios from 'axios';
import Navbar from './Navbar';

function Register() {
    const [loading,setLoading]=useState(false);
    const [loadingerror,setLoadingerror]=useState(false);
    const [loadingstatus,setLoadingstatus]=useState(false);
    const [firstname,setFirstname]=useState('');
    const [lastname,setLastname]=useState('');
    const [email,setEmail]=useState('');
    const [password,setPassword]=useState('');
    const [confirmpass,setConfirmpass]=useState('');
    const [gender,setGender]=useState('');
    const [ancestor,setAncestor]=useState('');
    const [ancestorrelation,setAncestorrelation]=useState('');
    const [phone,setPhone]=useState('');
    const [role,setRole]=useState('');

    const submitRegisterform=(e) =>{
        e.preventDefault();
        setLoadingerror(false);
        setLoadingstatus(false);
        const emailReg=/[a-zA-Z0-9._%+-]+@[a-z0-9+-]+\.[a-z]{2,4}(.[a-z{2,4}])?/g
        const passReg=/(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/g
        const phoneReg=/[0-9]{10,13}?/g
        
        if(firstname===''){
            setLoadingerror('First Name is Required');
        }
        else if(lastname===''){
            setLoadingerror('Last Name is Required');
        }
        else if(email===''){
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
        else if(password!==confirmpass){
            setLoadingerror('Password Should Match');
        }
        else if(gender===''){
            setLoadingerror('Gender is Required');
        }
        else if(ancestor===''){
            setLoadingerror('Ancestor is Required');
        }
        else if(ancestorrelation===''){
            setLoadingerror('Ancestor relation is Required');
        }
        else if(phone===''){
            setLoadingerror('Phone is Required');
        }
        else if(!phoneReg.test(phone)){
            setLoadingerror('Ensure Phone has 10-13 numbers');
        }
        else if(role===''){
            setLoadingerror('Role is Required');
        }
        else{
        setLoadingerror(false);
        setLoading(true);
        let registrationform=new FormData();
        registrationform.append('firstname',firstname);
        registrationform.append('email',email);
        registrationform.append('lastname',lastname);
        registrationform.append('password',password);
        registrationform.append('gender',gender);
        registrationform.append('ancestor',ancestor);
        registrationform.append('ancestorrelation',ancestorrelation);
        registrationform.append('phone',phone);
        registrationform.append('role',role);

        axios.post(process.env.REACT_APP_BACKEND_URL_LARAVEL+'register',registrationform)
        .then(result =>{
            if(result.data.success){
            setLoading(false);
            setLoadingstatus(result.data.success);
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
  return (
    <div className="">
      <Navbar currentpage='register'  />
      <div className='wrapper'>
        <h4>Register a Family Member Account</h4>
        <div className='wrapper-content'>
            <form className='form'>
                <div className='form-content'>
                    <div className='form-row'>
                        <label>First Name</label>
                        <input type='text' placeholder='First Name' 
                            value={firstname} onChange={(event) => setFirstname(event.target.value)}/>
                    </div>
                    <div className='form-row'>
                        <label>Last Name</label>
                        <input type='text' placeholder='Last Name'
                            value={lastname} onChange={(event) => setLastname(event.target.value)}/>
                    </div>
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
                    <div className='form-row'>
                        <label>Confirm Password</label>
                        <input type='password' placeholder='Confirm Password'
                            value={confirmpass} onChange={(event) => setConfirmpass(event.target.value)}/>
                    </div>
                </div>
                <div className='form-content'>
                    <div className='form-row'>
                        <label>Gender</label>
                        <select value={gender} onChange={(event) => setGender(event.target.value)}>
                            <option value=''>Select</option>
                            <option value='Male'>Male</option>
                            <option value='Female'>Female</option>
                        </select>
                    </div>
                    <div className='form-row'>
                        <label>Ancestor</label>
                        <select value={ancestor} onChange={(event) => setAncestor(event.target.value)}>
                            <option value=''>Select</option>
                            <option value='Diaz'>Diaz</option>
                            <option value='Daiz Two'>Daiz Two</option>
                            <option value='Daiz Three'>Daiz Three</option>
                            <option value='Daiz Four'>Daiz Four</option>
                            <option value='Daiz Five'>Daiz Five</option>

                        </select>
                    </div>
                    <div className='form-row'>
                        <label>Ancestor-Relation</label>
                        <select value={ancestorrelation} onChange={(event) => setAncestorrelation(event.target.value)}>
                            <option value=''>Select Relation</option>
                            <option value='Son'>Son</option>
                            <option value='Daughter'>Daughter</option>
                            <option value='Grandfather'>Grandfather</option>
                            <option value='Brother'>Brother</option>
                            <option value='Sister'>Sister</option>
                            <option value='Grandmother'>Grandmother</option>
                        </select>
                    </div>
                    <div className='form-row'>
                        <label>Phone</label>
                        <input type='number' placeholder='Phone'
                            value={phone} onChange={(event) => setPhone(event.target.value)}/>
                    </div>
                    <div className='form-row'>
                        <label>Role</label>
                        <select value={role} onChange={(event) => setRole(event.target.value)}>
                            <option value=''>Select</option>
                            <option value='user'>User</option>
                            <option value='admin'>Admin</option>
                        </select>
                    </div>
                </div>
                {loadingerror &&
                    <div className='form-btn'>
                    <p className='form-btn-error'>
                        {loadingerror}
                        <button onClick={() =>setLoadingerror(false)}><span className='fa fa-times'></span></button>
                    </p>
                    </div>
                }
                {loadingstatus &&
                    <div className='form-btn'>
                    <p className='form-btn-status'>
                        {loadingstatus}
                        <button onClick={() =>setLoadingstatus(false)}><span className='fa fa-times'></span></button>
                    </p>
                    </div>
                }

                <div className='form-btn'>
                    <button onClick={submitRegisterform}>
                        {loading?
                            <img src={loader} alt="loader" width='40px' height='20px' />
                        :
                        'Register Account'
                        }
                    </button>
                </div>
            </form>
        </div>
        
        
      </div>
      
    </div>
  );
}

export default Register;
