import React,{useState,useEffect} from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

function AdminFamilyTable() {
    const [families,setFamillies]=useState([]);
    useEffect(()=>{
        let mount=true;
        const displayFamilies=() =>{
            axios({
                method:'GET',
                url:process.env.REACT_APP_BACKEND_URL_LARAVEL+'families',
                headers:{
                    'content-type':'application/json'
                }
            })
            .then(result =>{
                if(mount){
                    if(result.data.success){
                        setFamillies(result.data.response);
                    }
                    else{
                        setFamillies([]);
                    }
                }
            })
            .catch(err=>{
                setFamillies([]);
            })
        }
        displayFamilies();

        return () =>{
            mount=false;
        }

    },[families])
  return (
    <div className="">
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>User Id</th>
                    <th>Family Id</th>
                    <th>Family Name</th>
                    <th>Family Location</th>
                    <th>Members</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {families.map((family)=>
                    // `userid`, `familyname`, `familylocation`
                    <tr key={family.id}>
                        <td>{family.no}</td>
                        <td>{family.id}</td>
                        <td>{family.userid}</td>
                        <td>{family.familyname}</td>
                        <td>{family.familylocation}</td>
                        <td><Link to='/admin/family/members'>Members</Link></td>
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

export default AdminFamilyTable;
