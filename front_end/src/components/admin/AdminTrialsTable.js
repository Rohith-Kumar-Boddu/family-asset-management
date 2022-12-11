import React,{useState,useEffect} from 'react';
import axios from 'axios';

function AdminTrialsTable() {
    const [trials,setTrials]=useState([]);
    useEffect(()=>{
        let mount=true;
        const displayProjects=() =>{
            axios({
                method:'GET',
                url:process.env.REACT_APP_BACKEND_URL_LARAVEL+'trials',
                headers:{
                    'content-type':'application/json'
                }
            })
            .then(result =>{
                if(mount){
                    if(result.data.success){
                        setTrials(result.data.response);
                    }
                    else{
                        setTrials([]);
                    }
                }
            })
            .catch(err=>{
                setTrials([]);
            })
        }
        displayProjects();

        return () =>{
            mount=false;
        }

    },[trials])
  return (
    <div className="">
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Trials Id</th>
                    <th>Family Id</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {trials.map((trial)=>
                    // `familyid`, `details`, `status`
                    <tr key={trial.id}>
                        <td>{trial.no}</td>
                        <td>{trial.id}</td>
                        <td>{trial.familyid}</td>
                        <td>{trial.status}</td>
                        <td>{trial.details}</td>
                        <td>
                            <button className='btn-action'>Edit</button>
                            <button className='btn-action action-del'>Delete</button>
                        </td>
                    </tr>
                )}
            </tbody>
        </table>  
    </div>
  );
}

export default AdminTrialsTable;
