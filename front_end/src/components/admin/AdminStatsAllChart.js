import React,{useState,useEffect} from 'react';
import axios from 'axios';

import ApexReactCharts from 'react-apexcharts'

function AdminStatsAllChart() {
  const [stats,setStats]=useState([]);
  const [families,setFamillies]=useState(0);
  const [trials,setTrials]=useState(0);
  const [properties,setProperties]=useState(0);
  const [projects,setProjects]=useState(0);
  const [members,setMembers]=useState(0);

  useEffect(()=>{
      let mount=true;
      const displayStats=() =>{
          axios({
              method:'GET',
              url:process.env.REACT_APP_BACKEND_URL_LARAVEL+'allstats',
              headers:{
                  'content-type':'application/json'
              }
          })
          .then(result =>{
              if(mount){
                  if(result.data.success){
                      setStats(result.data.response);
                      setTrials(result.data.response[0].trials);
                      setFamillies(result.data.response[0].families);
                      setProjects(result.data.response[0].projects);
                      setProperties(result.data.response[0].properties);
                      setMembers(result.data.response[0].members);
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
    
    const series=[trials, members, families, properties, projects];
    

    const options={
        chart: {
            id: "yearly-bar",
            height: 250,
            width: '100%',
          },
          labels: ['Trials', 'Members', 'Families', 'Properties', 'Projects'],
          theme:{
            monochrome:{
                enabled:true
            }
          },
          plotOptions:{
            pie:{
                dataLabels:{
                    offset:-5
                }
            }
          },
          dataLabels:{
            formatter(val, opts){
                const name=opts.w.globals.labels[opts.seriesIndex]
                return [name, val.toFixed(1)+'%']
            }
            
          },
          stroke:{
            curve: 'straight'
          },
          title:{
            text: 'Summary Stats',
            align: 'center'
          }
    };

  return (
    <div className="">
        <ApexReactCharts 
            options={options} 
            series={series}
            type="pie"
            height={250} />
    </div>
  );
}

export default AdminStatsAllChart;
