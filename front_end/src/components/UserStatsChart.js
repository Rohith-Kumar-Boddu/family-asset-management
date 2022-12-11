import React,{useState,useEffect} from 'react';
import axios from 'axios';

import ApexReactCharts from 'react-apexcharts'

function UserStatsChart() {
  const [stats,setStats]=useState([]);
  const [families,setFamillies]=useState({jan:0,feb:0,mar:0,apr:0,may:0,jun:0,jul:0,aug:0,sep:0,oct:0,nov:0,dec:0,});
  const [trials,setTrials]=useState({jan:0,feb:0,mar:0,apr:0,may:0,jun:0,jul:0,aug:0,sep:0,oct:0,nov:0,dec:0,});
  const [properties,setProperties]=useState({jan:0,feb:0,mar:0,apr:0,may:0,jun:0,jul:0,aug:0,sep:0,oct:0,nov:0,dec:0,});
  const [projects,setProjects]=useState({jan:0,feb:0,mar:0,apr:0,may:0,jun:0,jul:0,aug:0,sep:0,oct:0,nov:0,dec:0,});
  const [members,setMembers]=useState({jan:0,feb:0,mar:0,apr:0,may:0,jun:0,jul:0,aug:0,sep:0,oct:0,nov:0,dec:0,});

  useEffect(()=>{
      let mount=true;
      let account=localStorage.getItem('account');
        if(localStorage.getItem('account')){
            account=JSON.parse(localStorage.getItem('account'));
        }
        else{
            account=false;
        }
      const displayStats=() =>{
          axios({
              method:'GET',
              url:process.env.REACT_APP_BACKEND_URL_LARAVEL+'userallyearsstats/'+account['id'],
              headers:{
                  'content-type':'application/json'
              }
          })
          .then(result =>{
              if(mount){
                  if(result.data.success){
                      setStats(result.data.response);
                      setTrials({
                        jan:result.data.response[0].jantrials,
                        feb:result.data.response[0].febtrials,
                        mar:result.data.response[0].martrials,
                        apr:result.data.response[0].aprtrials,
                        may:result.data.response[0].maytrials,
                        jun:result.data.response[0].juntrials,
                        jul:result.data.response[0].jultrials,
                        aug:result.data.response[0].augtrials,
                        sep:result.data.response[0].septrials,
                        oct:result.data.response[0].octtrials,
                        nov:result.data.response[0].novtrials,
                        dec:result.data.response[0].dectrials,
                      });
                      setFamillies({
                        jan:result.data.response[0].janfamilies,
                        feb:result.data.response[0].febfamilies,
                        mar:result.data.response[0].marfamilies,
                        apr:result.data.response[0].aprfamilies,
                        may:result.data.response[0].mayfamilies,
                        jun:result.data.response[0].junfamilies,
                        jul:result.data.response[0].julfamilies,
                        aug:result.data.response[0].augfamilies,
                        sep:result.data.response[0].sepfamilies,
                        oct:result.data.response[0].octfamilies,
                        nov:result.data.response[0].novfamilies,
                        dec:result.data.response[0].decfamilies,
                      });
                      setProjects({
                        jan:result.data.response[0].janprojects,
                        feb:result.data.response[0].febprojects,
                        mar:result.data.response[0].marprojects,
                        apr:result.data.response[0].aprprojects,
                        may:result.data.response[0].mayprojects,
                        jun:result.data.response[0].junprojects,
                        jul:result.data.response[0].julprojects,
                        aug:result.data.response[0].augprojects,
                        sep:result.data.response[0].sepprojects,
                        oct:result.data.response[0].octprojects,
                        nov:result.data.response[0].novprojects,
                        dec:result.data.response[0].decprojects,
                      });
                      setProperties({
                        jan:result.data.response[0].janproperties,
                        feb:result.data.response[0].febproperties,
                        mar:result.data.response[0].marproperties,
                        apr:result.data.response[0].aprproperties,
                        may:result.data.response[0].mayproperties,
                        jun:result.data.response[0].junproperties,
                        jul:result.data.response[0].julproperties,
                        aug:result.data.response[0].augproperties,
                        sep:result.data.response[0].sepproperties,
                        oct:result.data.response[0].octproperties,
                        nov:result.data.response[0].novproperties,
                        dec:result.data.response[0].decproperties,
                      });
                      setMembers({
                        jan:result.data.response[0].janmembers,
                        feb:result.data.response[0].febmembers,
                        mar:result.data.response[0].marmembers,
                        apr:result.data.response[0].aprmembers,
                        may:result.data.response[0].maymembers,
                        jun:result.data.response[0].junmembers,
                        jul:result.data.response[0].julmembers,
                        aug:result.data.response[0].augmembers,
                        sep:result.data.response[0].sepmembers,
                        oct:result.data.response[0].octmembers,
                        nov:result.data.response[0].novmembers,
                        dec:result.data.response[0].decmembers,
                      });
                  }
                  else{
                      setStats([]);
                  }
              }
          })
          .catch(err=>{
              setStats([]);
          })
      }
      displayStats();

      return () =>{
          mount=false;
      }

  },[stats])

    const series=[
        {
            name: "Trial",
            data: [trials.jan, trials.feb, trials.mar, trials.apr, trials.may, trials.jun, trials.jul, trials.aug, trials.sep, trials.oct, trials.nov, trials.dec]
        },
        {
            name: "Family",
            data: [families.jan, families.feb, families.mar, families.apr, families.may, families.jun, families.jul, families.aug, families.sep, families.oct, families.nov, families.dec]
        },
        {
            name: "Member",
            data: [members.jan, members.feb, members.mar, members.apr, members.may, members.jun, members.jul, members.aug, members.sep, members.oct, members.nov, members.dec]
        }
        ,
        {
            name: "Property",
            data: [properties.jan, properties.feb, properties.mar, properties.apr, properties.may, properties.jun, properties.jul, properties.aug, properties.sep, properties.oct, properties.nov, properties.dec]
        }
        ,
        {
            name: "Project",
            data: [projects.jan, projects.feb, projects.mar, projects.apr, projects.may, projects.jun, projects.jul, projects.aug, projects.sep, projects.oct, projects.nov, projects.dec]
        }
    ];

    const options={
        chart: {
            id: "yearly-bar",
            height: 250,
          },
          dataLabels:{
            enabled:false
          },
          stroke:{
            curve: 'straight'
          },
          theme:{
            monochrome:{
                enabled:true
            }
          },
          title:{
            text: 'Yearly Stats',
            align: 'center'
          },
          xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          }
    };

  return (
    <div className="">
        <ApexReactCharts 
            options={options} 
            series={series}
            type="bar"
            height={250} />
    </div>
  );
}

export default UserStatsChart;
