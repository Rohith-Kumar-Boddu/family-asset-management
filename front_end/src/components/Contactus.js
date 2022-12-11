import React ,{useState} from 'react';
import loader from '../img/loading-blue.gif';
import axios from 'axios';
import Navbar from './Navbar';

function Contactus() {
  const [loading,setLoading]=useState(false);
  const [loadingerror,setLoadingerror]=useState(false);
  const [loadingstatus,setLoadingstatus]=useState(false);
  const [name,setName]=useState('');
  const [email,setEmail]=useState('');
  const [question,setQuestion]=useState('');

  const submitQuestion=(e) =>{
    e.preventDefault();
    setLoadingerror(false);
    setLoadingstatus(false);
    const emailReg=/[a-zA-Z0-9._%+-]+@[a-z0-9+-]+\.[a-z]{2,4}(.[a-z{2,4}])?/g
    if(name===''){
      setLoadingerror('Name is Required');
    }
    else if(email===''){
      setLoadingerror('Email is Required');
    }
    else if(!emailReg.test(email)){
        setLoadingerror('Invalid Email Address');
    }
    else if(question===''){
      setLoadingerror('Question is Required');
    }
    else{
      setLoadingerror(false);
      setLoading(true);
      let contactform=new FormData();
      contactform.append('name',name);
      contactform.append('email',email);
      contactform.append('question',question);

      axios.post(process.env.REACT_APP_BACKEND_URL_LARAVEL+'contactform',contactform)
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
      <Navbar currentpage='contactus'  />
      <div className='wrapper'>
        <h4>Contact Family Site</h4>
        <div className=''>
            <form>
                <div className='form-content'>
                    <p>Fill and Submit this Contact Form</p>
                    <div className='form-row'>
                        <label>Name</label>
                        <input type='text' placeholder='Name' 
                          value={name} onChange={(event) => setName(event.target.value)}/ >
                    </div>
                    <div className='form-row'>
                        <label>Email</label>
                        <input type='email' placeholder='Email' 
                          value={email} onChange={(event) => setEmail(event.target.value)}/>
                    </div>
                    <div className='form-row'>
                        <label>Your Question</label>
                        <textarea placeholder='Your Question' 
                          value={question} onChange={(event) => setQuestion(event.target.value)}></textarea>
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
                    
                    <div className='form-btn'>
                        <button onClick={submitQuestion}>
                          {loading?
                              <img src={loader} alt="loader" width='40px' height='20px' />
                            :
                            'Send Message'
                          }
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
        
        
      </div>
      
    </div>
  );
}

export default Contactus;
