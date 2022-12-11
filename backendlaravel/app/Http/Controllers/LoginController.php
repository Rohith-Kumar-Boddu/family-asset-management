<?php

namespace App\Http\Controllers;

use App\Models\Contactform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
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

    public function signin(Request $request){
        $email=$request->email;
        $password=$request->password;

        $result=Auth::attempt(['email'=>$email,'password'=>$password]);
        if($result){
            $account=Auth::user();
            $res['success']='Signed In';
            $res['account']=array(
                'id'=>$account->id,
                'email'=>$account->email,
                'firstname'=>$account->firstname,
                'lastname'=>$account->lastname,
                'gender'=>$account->gender,
                'role'=>$account->role,
                'phone'=>$account->phone,
            );
            return json_encode($res);
        }
        else{
            echo json_encode(['error'=>'Account not Found.']);
        }
    }

    public function contactform(Request $request){
        $name=$request->name;
        $email=$request->email;
        $question=$request->question;

        $newcontactform=new Contactform;
        $newcontactform->names=$name;
        $newcontactform->email=$email;
        $newcontactform->question=$question;

        if($newcontactform->save()){
            echo json_encode(['success'=>'Your Question has been Sent.']);
        }
        else{
            echo json_encode(['error'=>'Could not Submit.']);
        }
    }

    public function register(Request $request){
        $lastname=$request->lastname;
        $firstname=$request->firstname;
        $email=$request->email;
        $password=$request->password;
        $gender=$request->gender;
        $ancestor=$request->ancestor;
        $ancestorrelation=$request->ancestorrelation;
        $phone=$request->phone;
        $role=$request->role;
        
        $newuser=new User;
        $newuser->firstname=$firstname;
        $newuser->lastname=$lastname;
        $newuser->email=$email;
        $newuser->gender=$gender;
        $newuser->ancestor=$ancestor;
        $newuser->ancestorrelation=$ancestorrelation;
        $newuser->phone=$phone;
        $newuser->role=$role;
        $newuser->password=Hash::make($password);

        if($newuser->save()){
            echo json_encode(['success'=>'Your Registration is Successful.']);
        }
        else{
            echo json_encode(['error'=>'Registration Failed.']);
        }
    }
}
