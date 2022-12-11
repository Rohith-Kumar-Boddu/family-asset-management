import React,{useState,useEffect} from 'react';
import axios from 'axios';

function UserFamilyMembersTable() {
    const [members,setMembers]=useState([]);
    let account=localStorage.getItem('account');
    if(localStorage.getItem('account')){
        account=JSON.parse(localStorage.getItem('account'));
    }
    else{
        account=false;
    }
    useEffect(()=>{
        let mount=true;
        const displayFamilies=() =>{
            axios({
                method:'GET',
                url:process.env.REACT_APP_BACKEND_URL_LARAVEL+'usermembers/'+account['id'],
                headers:{
                    'content-type':'application/json'
                }
            })
            .then(result =>{
                if(mount){
                    if(result.data.success){
                        setMembers(result.data.response);
                    }
                    else{
                        setMembers([]);
                    }
                }
            })
            .catch(err=>{
                setMembers([]);
            })
        }
        displayFamilies();

        return () =>{
            mount=false;
        }

    },[members, account])
  return (
    <div className="">
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>User Id</th>
                    <th>Family Id</th>
                    <th>Member Name</th>
                    <th>Member Location</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            {/* `userid`, `familyid`, `membername`, `memberlocation` */}
            {members.map((member)=>
                <tr key={member.id}>
                    <td>{member.no}</td>
                    <td>{member.userid}</td>
                    <td>{member.familyid}</td>
                    <td>{member.membername}</td>
                    <td>{member.memberlocation}</td>
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

export default UserFamilyMembersTable;
