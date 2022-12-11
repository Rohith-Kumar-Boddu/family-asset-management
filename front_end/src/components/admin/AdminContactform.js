
import React,{useState,useEffect} from 'react';
import axios from 'axios';
import AdminNavbar from './AdminNavbar';

function AdminContactform() {
    const [contactus,setContactus]=useState([]);
    useEffect(()=>{
        let mount=true;
        const displayProjects=() =>{
            axios({
                method:'GET',
                url:process.env.REACT_APP_BACKEND_URL_LARAVEL+'questions',
                headers:{
                    'content-type':'application/json'
                }
            })
            .then(result =>{
                if(mount){
                    if(result.data.success){
                        setContactus(result.data.response);
                    }
                    else{
                        setContactus([]);
                    }
                }
            })
            .catch(err=>{
                setContactus([]);
            })
        }
        displayProjects();

        return () =>{
            mount=false;
        }

    },[])
  return (
    <div className="">
      <AdminNavbar currentpage='contactus'  />
      <div className='wrapper'>
        <h4>Contact Us Form Questions</h4>
        <div className='wrapper-content'>
          
          <div className='form'>
            <table>
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Question</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                {/* `names`, `email`, `question` */}
                {contactus.map((question)=>
                    <tr key={question.id}>
                        <td>{question.no}</td>
                        <td>{question.names}</td>
                        <td>{question.email}</td>
                        <td>{question.question}</td>
                        <td>
                            <button className='btn-action'>Seen</button>
                            <button className='btn-action'>Responded</button>
                            <button className='btn-action action-del'>Dismissed</button>
                            <button className='btn-action action-del'>Delete</button>
                        </td>
                    </tr>
                )}
                </tbody>
            </table>  
          </div>
        </div>

        
        
        
      </div>
      
    </div>
  );
}

export default AdminContactform;
