<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Family;
use App\Models\Member;
use App\Models\Project;
use App\Models\Property;
use App\Models\Trial;
use App\Models\Contactform;

class DiazController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function questions(){
        $questions=Contactform::all();
        $questionscount=$questions->count();
        $response=array();

        if($questionscount>0){
            $no=0;
            foreach ($questions as $question) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$question->id,
                    'names'=>$question->names,
                    'email'=>$question->email,
                    'question'=>$question->question,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Contact us Question Found.']);
        }
    }

    // trial
    // property
    // project
    // family
    // member

    public function trial(Request $request){
        $status=$request->status;
        $family=$request->family;
        $details=$request->details;
        $userid=$request->userid;
        
        $newtrial=new Trial;
        $newtrial->userid=$userid;
        $newtrial->status=$status;
        $newtrial->familyid=$family;
        $newtrial->details=$details;

        if($newtrial->save()){
            echo json_encode(['success'=>'Trial Saved.']);
        }
        else{
            echo json_encode(['error'=>'Saving Failed.']);
        }
    }

    public function property(Request $request){
        $location=$request->location;
        $units=$request->units;
        $sellingperunit=$request->sellingperunit;
        $family=$request->family;
        $details=$request->details;
        $userid=$request->userid;
        
        $newproperty=new Property;
        $newproperty->userid=$userid;
        $newproperty->units=$units;
        $newproperty->propertylocation=$location;
        $newproperty->sellingpriceperunit=$sellingperunit;
        $newproperty->familyid=$family;
        $newproperty->details=$details;

        if($newproperty->save()){
            echo json_encode(['success'=>'Property Saved.']);
        }
        else{
            echo json_encode(['error'=>'Saving Failed.']);
        }
    }


    public function project(Request $request){
        $location=$request->location;
        $projectname=$request->projectname;
        $cost=$request->cost;
        $family=$request->family;
        $details=$request->details;
        $userid=$request->userid;
        
        $newproject=new Project;
        $newproject->userid=$userid;
        $newproject->projectname=$projectname;
        $newproject->projectlocation=$location;
        $newproject->cost=$cost;
        $newproject->familyid=$family;
        $newproject->details=$details;

        if($newproject->save()){
            echo json_encode(['success'=>'Project Saved.']);
        }
        else{
            echo json_encode(['error'=>'Saving Failed.']);
        }
    }



    public function family(Request $request){
        $location=$request->location;
        $family=$request->family;
        $userid=$request->userid;
        
        $newfamily=new Family;
        $newfamily->userid=$userid;
        $newfamily->familylocation=$location;
        $newfamily->familyname=$family;

        if($newfamily->save()){
            echo json_encode(['success'=>'Family Saved.']);
        }
        else{
            echo json_encode(['error'=>'Saving Failed.']);
        }
    }


    public function member(Request $request){
        $location=$request->location;
        $family=$request->family;
        $membername=$request->membername;
        $userid=$request->userid;
        
        $newproperty=new Member;
        $newproperty->userid=$userid;
        $newproperty->membername=$membername;
        $newproperty->familyid=$family;
        $newproperty->memberlocation=$location;

        if($newproperty->save()){
            echo json_encode(['success'=>'Member Saved.']);
        }
        else{
            echo json_encode(['error'=>'Saving Failed.']);
        }
    }

    public function trials(){
        $trials=Trial::all();
        $trialscount=$trials->count();
        $response=array();
        if($trialscount>0){
            $no=0;
            foreach ($trials as $trial) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$trial->id,
                    'userid'=>$trial->userid,
                    'familyid'=>$trial->familyid,
                    'status'=>$trial->status,
                    'details'=>$trial->details,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Contact us Question Found.']);
        }
    }
    public function projects(){
        $projects=Project::all();
        $projectscount=$projects->count();
        $response=array();
        if($projectscount>0){
            $no=0;
            foreach ($projects as $project) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$project->id,
                    'userid'=>$project->userid,
                    'familyid'=>$project->familyid,
                    'projectname'=>$project->projectname,
                    'projectlocation'=>$project->projectlocation,
                    'cost'=>$project->cost,
                    'details'=>$project->details,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Project Found.']);
        }
    }

    
    public function properties(){
        $properties=Property::all();
        $propertiescount=$properties->count();
        $response=array();
        if($propertiescount>0){
            $no=0;
            foreach ($properties as $property) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$property->id,
                    'userid'=>$property->userid,
                    'familyid'=>$property->familyid,
                    'units'=>$property->units,
                    'sellingpriceperunit'=>$property->sellingpriceperunit,
                    'propertylocation'=>$property->propertylocation,
                    'details'=>$property->details,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Property Found.']);
        }
    }

    
    public function members(){
        $members=Member::all();
        $memberscount=$members->count();
        $response=array();
        if($memberscount>0){
            $no=0;
            foreach ($members as $member) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$member->id,
                    'userid'=>$member->userid,
                    'familyid'=>$member->familyid,
                    'membername'=>$member->membername,
                    'memberlocation'=>$member->memberlocation,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Member Found.']);
        }
    }

    public function families(){
        $families=Family::all();
        $familiescount=$families->count();
        $response=array();
        if($familiescount>0){
            $no=0;
            foreach ($families as $family) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$family->id,
                    'userid'=>$family->userid,
                    'familyname'=>$family->familyname,
                    'familylocation'=>$family->familylocation,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Family Found.']);
        }
    }

    public function usertrials($userid){
        $trials=Trial::where('userid',$userid)->get();
        $trialscount=$trials->count();
        $response=array();
        if($trialscount>0){
            $no=0;
            foreach ($trials as $trial) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$trial->id,
                    'userid'=>$trial->userid,
                    'familyid'=>$trial->familyid,
                    'status'=>$trial->status,
                    'details'=>$trial->details,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Contact us Question Found.']);
        }
    }
    public function userprojects($userid){
        $projects=Project::where('userid',$userid)->get();
        $projectscount=$projects->count();
        $response=array();
        if($projectscount>0){
            $no=0;
            foreach ($projects as $project) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$project->id,
                    'userid'=>$project->userid,
                    'familyid'=>$project->familyid,
                    'projectname'=>$project->projectname,
                    'projectlocation'=>$project->projectlocation,
                    'cost'=>$project->cost,
                    'details'=>$project->details,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Project Found.']);
        }
    }

    
    public function userproperties($userid){
        $properties=Property::where('userid',$userid)->get();
        $propertiescount=$properties->count();
        $response=array();
        if($propertiescount>0){
            $no=0;
            foreach ($properties as $property) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$property->id,
                    'userid'=>$property->userid,
                    'familyid'=>$property->familyid,
                    'units'=>$property->units,
                    'sellingpriceperunit'=>$property->sellingpriceperunit,
                    'propertylocation'=>$property->propertylocation,
                    'details'=>$property->details,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Property Found.']);
        }
    }

    
    public function usermembers($userid){
        $members=Member::where('userid',$userid)->get();
        $memberscount=$members->count();
        $response=array();
        if($memberscount>0){
            $no=0;
            foreach ($members as $member) {
                $no++;
                $response[]=array(
                    'no'=>$no,
                    'id'=>$member->id,
                    'userid'=>$member->userid,
                    'familyid'=>$member->familyid,
                    'membername'=>$member->membername,
                    'memberlocation'=>$member->memberlocation,
                );
            }
            echo json_encode(['success'=>'Success', 'response'=>$response]);
        }
        else{
            echo json_encode(['error'=>'No Member Found.']);
        }
    }

    // allstats
// allyearsstats
    public function allstats(){
        $members=Member::all()->count();
        $trials=Trial::all()->count();
        $projects=Project::all()->count();
        $families=Family::all()->count();
        $properties=Property::all()->count();

        $response=array();
        $response[]=array(
            'trials'=>$trials,
            'projects'=>$projects,
            'families'=>$families,
            'properties'=>$properties,
            'members'=>$members,
        );
        echo json_encode(['success'=>'Success', 'response'=>$response]);
    }

    public function userallstats($userid){
        $members=Member::where('userid',$userid)->count();
        $trials=Trial::where('userid',$userid)->count();
        $projects=Project::where('userid',$userid)->count();
        $families=Family::where('userid',$userid)->count();
        $properties=Property::where('userid',$userid)->count();

        $response=array();
        $response[]=array(
            'trials'=>$trials,
            'projects'=>$projects,
            'families'=>$families,
            'properties'=>$properties,
            'members'=>$members,
        );
        echo json_encode(['success'=>'Success', 'response'=>$response]);
    }

    public function allyearsstats(){
        $members=Member::all();
        $trials=Trial::all();
        $projects=Project::all();
        $families=Family::all();
        $properties=Property::all();

        $jantrials=0;$janprojects=0;$janfamilies=0;$janproperties=0;$janmembers=0;
        $febtrials=0;$febprojects=0;$febfamilies=0;$febproperties=0;$febmembers=0;
        $martrials=0;$marprojects=0;$marfamilies=0;$marproperties=0;$marmembers=0;
        $aprtrials=0;$aprprojects=0;$aprfamilies=0;$aprproperties=0;$aprmembers=0;
        $maytrials=0;$mayprojects=0;$mayfamilies=0;$mayproperties=0;$maymembers=0;
        $juntrials=0;$junprojects=0;$junfamilies=0;$junproperties=0;$junmembers=0;
        $jultrials=0;$julprojects=0;$julfamilies=0;$julproperties=0;$julmembers=0;
        $augtrials=0;$augprojects=0;$augfamilies=0;$augproperties=0;$augmembers=0;
        $septrials=0;$sepprojects=0;$sepfamilies=0;$sepproperties=0;$sepmembers=0;
        $octtrials=0;$octprojects=0;$octfamilies=0;$octproperties=0;$octmembers=0;
        $novtrials=0;$novprojects=0;$novfamilies=0;$novproperties=0;$novmembers=0;
        $dectrials=0;$decprojects=0;$decfamilies=0;$decproperties=0;$decmembers=0;

        $year=date('Y');
        
        $response=array();
        if(($trials->count())>0){
            foreach ($trials as $trial) {
                $created_at=$trial->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $jantrials++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febtrials++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $martrials++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprtrials++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $maytrials++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $juntrials++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $jultrials++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augtrials++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $septrials++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octtrials++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novtrials++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $dectrials++;
                }
            }
        }

        if(($projects->count())>0){
            foreach ($projects as $project) {
                $created_at=$project->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $janprojects++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febprojects++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marprojects++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprprojects++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayprojects++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junprojects++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julprojects++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augprojects++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepprojects++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octprojects++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novprojects++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decprojects++;
                }
            }
        }

        if(($properties->count())>0){
            foreach ($properties as $property) {
                $created_at=$property->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $janproperties++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febproperties++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marproperties++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprproperties++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayproperties++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junproperties++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julproperties++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augproperties++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepproperties++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octproperties++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novproperties++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decproperties++;
                }
            }
        }

        if(($families->count())>0){
            foreach ($families as $family) {
                $created_at=$family->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $janfamilies++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febfamilies++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marfamilies++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprfamilies++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayfamilies++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junfamilies++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julfamilies++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augfamilies++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepfamilies++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octfamilies++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novfamilies++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decfamilies++;
                }
            }
        }

        if(($members->count())>0){
            foreach ($members as $member) {
                $created_at=$member->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $janmembers++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febmembers++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marmembers++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprmembers++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $maymembers++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junmembers++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julmembers++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augmembers++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepmembers++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octmembers++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novmembers++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decmembers++;
                }
            }
        }


        $response[]=array(
            'jantrials'=>$jantrials,
            'janprojects'=>$janprojects,
            'janfamilies'=>$janfamilies,
            'janproperties'=>$janproperties,
            'janmembers'=>$janmembers,
            'febtrials'=>$febtrials,
            'febprojects'=>$febprojects,
            'febfamilies'=>$febfamilies,
            'febproperties'=>$febproperties,
            'febmembers'=>$febmembers,
            'martrials'=>$martrials,
            'marprojects'=>$marprojects,
            'marfamilies'=>$marfamilies,
            'marproperties'=>$marproperties,
            'marmembers'=>$marmembers,
            'aprtrials'=>$aprtrials,
            'aprprojects'=>$aprprojects,
            'aprfamilies'=>$aprfamilies,
            'aprproperties'=>$aprproperties,
            'aprmembers'=>$aprmembers,
            'maytrials'=>$maytrials,
            'mayprojects'=>$mayprojects,
            'mayfamilies'=>$mayfamilies,
            'mayproperties'=>$mayproperties,
            'maymembers'=>$maymembers,
            'juntrials'=>$juntrials,
            'junprojects'=>$junprojects,
            'junfamilies'=>$junfamilies,
            'junproperties'=>$junproperties,
            'junmembers'=>$junmembers,
            'jultrials'=>$jultrials,
            'julprojects'=>$julprojects,
            'julfamilies'=>$julfamilies,
            'julproperties'=>$julproperties,
            'julmembers'=>$julmembers,
            'augtrials'=>$augtrials,
            'augprojects'=>$augprojects,
            'augfamilies'=>$augfamilies,
            'augproperties'=>$augproperties,
            'augmembers'=>$augmembers,
            'septrials'=>$septrials,
            'sepprojects'=>$sepprojects,
            'sepfamilies'=>$sepfamilies,
            'sepproperties'=>$sepproperties,
            'sepmembers'=>$sepmembers,
            'octtrials'=>$octtrials,
            'octprojects'=>$octprojects,
            'octfamilies'=>$octfamilies,
            'octproperties'=>$octproperties,
            'octmembers'=>$octmembers,
            'novtrials'=>$novtrials,
            'novprojects'=>$novprojects,
            'novfamilies'=>$novfamilies,
            'novproperties'=>$novproperties,
            'novmembers'=>$novmembers,
            'dectrials'=>$dectrials,
            'decprojects'=>$decprojects,
            'decfamilies'=>$decfamilies,
            'decproperties'=>$decproperties,
            'decmembers'=>$decmembers,
        );
        echo json_encode(['success'=>'Success', 'response'=>$response]);
    }


    public function userallyearsstats($userid){
        $members=Member::where('userid',$userid)->get();
        $trials=Trial::where('userid',$userid)->get();
        $projects=Project::where('userid',$userid)->get();
        $families=Family::where('userid',$userid)->get();
        $properties=Property::where('userid',$userid)->get();


        $jantrials=0;$janprojects=0;$janfamilies=0;$janproperties=0;$janmembers=0;
        $febtrials=0;$febprojects=0;$febfamilies=0;$febproperties=0;$febmembers=0;
        $martrials=0;$marprojects=0;$marfamilies=0;$marproperties=0;$marmembers=0;
        $aprtrials=0;$aprprojects=0;$aprfamilies=0;$aprproperties=0;$aprmembers=0;
        $maytrials=0;$mayprojects=0;$mayfamilies=0;$mayproperties=0;$maymembers=0;
        $juntrials=0;$junprojects=0;$junfamilies=0;$junproperties=0;$junmembers=0;
        $jultrials=0;$julprojects=0;$julfamilies=0;$julproperties=0;$julmembers=0;
        $augtrials=0;$augprojects=0;$augfamilies=0;$augproperties=0;$augmembers=0;
        $septrials=0;$sepprojects=0;$sepfamilies=0;$sepproperties=0;$sepmembers=0;
        $octtrials=0;$octprojects=0;$octfamilies=0;$octproperties=0;$octmembers=0;
        $novtrials=0;$novprojects=0;$novfamilies=0;$novproperties=0;$novmembers=0;
        $dectrials=0;$decprojects=0;$decfamilies=0;$decproperties=0;$decmembers=0;

        $year=date('Y');
        
        $response=array();
        if(($trials->count())>0){
            foreach ($trials as $trial) {
                $created_at=$trial->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $jantrials++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febtrials++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $martrials++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprtrials++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $maytrials++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $juntrials++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $jultrials++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augtrials++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $septrials++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octtrials++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novtrials++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $dectrials++;
                }
            }
        }

        if(($projects->count())>0){
            foreach ($projects as $project) {
                $created_at=$project->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $janprojects++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febprojects++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marprojects++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprprojects++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayprojects++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junprojects++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julprojects++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augprojects++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepprojects++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octprojects++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novprojects++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decprojects++;
                }
            }
        }

        if(($properties->count())>0){
            foreach ($properties as $property) {
                $created_at=$property->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $janproperties++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febproperties++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marproperties++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprproperties++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayproperties++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junproperties++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julproperties++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augproperties++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepproperties++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octproperties++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novproperties++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decproperties++;
                }
            }
        }

        if(($families->count())>0){
            foreach ($families as $family) {
                $created_at=$family->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $janfamilies++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febfamilies++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marfamilies++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprfamilies++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayfamilies++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junfamilies++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julfamilies++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augfamilies++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepfamilies++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octfamilies++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novfamilies++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decfamilies++;
                }
            }
        }

        if(($members->count())>0){
            foreach ($members as $member) {
                $created_at=$member->created_at;
                if(strpos($created_at,$year.'-01') !==false){
                    $janmembers++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febmembers++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marmembers++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprmembers++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $maymembers++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junmembers++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julmembers++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augmembers++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepmembers++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octmembers++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novmembers++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decmembers++;
                }
            }
        }


        $response[]=array(
            'jantrials'=>$jantrials,
            'janprojects'=>$janprojects,
            'janfamilies'=>$janfamilies,
            'janproperties'=>$janproperties,
            'janmembers'=>$janmembers,
            'febtrials'=>$febtrials,
            'febprojects'=>$febprojects,
            'febfamilies'=>$febfamilies,
            'febproperties'=>$febproperties,
            'febmembers'=>$febmembers,
            'martrials'=>$martrials,
            'marprojects'=>$marprojects,
            'marfamilies'=>$marfamilies,
            'marproperties'=>$marproperties,
            'marmembers'=>$marmembers,
            'aprtrials'=>$aprtrials,
            'aprprojects'=>$aprprojects,
            'aprfamilies'=>$aprfamilies,
            'aprproperties'=>$aprproperties,
            'aprmembers'=>$aprmembers,
            'maytrials'=>$maytrials,
            'mayprojects'=>$mayprojects,
            'mayfamilies'=>$mayfamilies,
            'mayproperties'=>$mayproperties,
            'maymembers'=>$maymembers,
            'juntrials'=>$juntrials,
            'junprojects'=>$junprojects,
            'junfamilies'=>$junfamilies,
            'junproperties'=>$junproperties,
            'junmembers'=>$junmembers,
            'jultrials'=>$jultrials,
            'julprojects'=>$julprojects,
            'julfamilies'=>$julfamilies,
            'julproperties'=>$julproperties,
            'julmembers'=>$julmembers,
            'augtrials'=>$augtrials,
            'augprojects'=>$augprojects,
            'augfamilies'=>$augfamilies,
            'augproperties'=>$augproperties,
            'augmembers'=>$augmembers,
            'septrials'=>$septrials,
            'sepprojects'=>$sepprojects,
            'sepfamilies'=>$sepfamilies,
            'sepproperties'=>$sepproperties,
            'sepmembers'=>$sepmembers,
            'octtrials'=>$octtrials,
            'octprojects'=>$octprojects,
            'octfamilies'=>$octfamilies,
            'octproperties'=>$octproperties,
            'octmembers'=>$octmembers,
            'novtrials'=>$novtrials,
            'novprojects'=>$novprojects,
            'novfamilies'=>$novfamilies,
            'novproperties'=>$novproperties,
            'novmembers'=>$novmembers,
            'dectrials'=>$dectrials,
            'decprojects'=>$decprojects,
            'decfamilies'=>$decfamilies,
            'decproperties'=>$decproperties,
            'decmembers'=>$decmembers,
        );
        echo json_encode(['success'=>'Success', 'response'=>$response]);
    }

}
