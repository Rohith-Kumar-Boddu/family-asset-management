import React,{useState,useEffect} from 'react';
import axios from 'axios';


function AdminProjectsTable() {

    const [projects,setProjects]=useState([]);
    useEffect(()=>{
        let mount=true;
        const displayProjects=() =>{
            axios({
                method:'GET',
                url:process.env.REACT_APP_BACKEND_URL_LARAVEL+'projects',
                headers:{
                    'content-type':'application/json'
                }
            })
            .then(result =>{
                if(mount){
                    if(result.data.success){
                        setProjects(result.data.response);
                    }
                    else{
                        setProjects([]);
                    }
                }
            })
            .catch(err=>{
                setProjects([]);
            })
        }
        displayProjects();

        return () =>{
            mount=false;
        }

    },[projects])

  return (
    <div className="">
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>ID</th>
                    <th>Location</th>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Family Id</th>
                    <th>Details</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {projects.map((project)=>
                    <tr key={project.id}>
                        <td>{project.no}</td>
                        <td>{project.id}</td>
                        <td>{project.projectlocation}</td>
                        <td>{project.projectname}</td>
                        <td>{project.cost}</td>
                        <td>{project.familyid}</td>
                        <td>{project.details}</td>
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

export default AdminProjectsTable;
