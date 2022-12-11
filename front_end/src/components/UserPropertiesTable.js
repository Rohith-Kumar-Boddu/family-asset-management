import React,{useState,useEffect} from 'react';
import axios from 'axios';


function UserPropetiesTable() {

    const [properties,setProperties]=useState([]);
    let account=localStorage.getItem('account');
    if(localStorage.getItem('account')){
        account=JSON.parse(localStorage.getItem('account'));
    }
    else{
        account=false;
    }
    useEffect(()=>{
        let mount=true;
        const displayProperties=() =>{
            axios({
                method:'GET',
                url:process.env.REACT_APP_BACKEND_URL_LARAVEL+'userproperties/'+account['id'],
                headers:{
                    'content-type':'application/json'
                }
            })
            .then(result =>{
                if(mount){
                    if(result.data.success){
                        setProperties(result.data.response);
                    }
                    else{
                        setProperties([]);
                    }
                }
            })
            .catch(err=>{
                setProperties([]);
            })
        }
        displayProperties();

        return () =>{
            mount=false;
        }

    },[properties, account])

  return (
    <div className="">
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>ID</th>
                    <th>Location</th>
                    <th>Units</th>
                    <th>Price(Unit)</th>
                    <th>Family Id</th>
                    <th>Details</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {properties.map((property)=>
                    <tr key={property.id}>
                        <td>{property.no}</td>
                        <td>{property.id}</td>
                        <td>{property.propertylocation}</td>
                        <td>{property.units}</td>
                        <td>{property.sellingpriceperunit}</td>
                        <td>{property.familyid}</td>
                        <td>{property.details}</td>
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

export default UserPropetiesTable;
