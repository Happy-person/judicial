<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use App\User;
use App\register;

class RegisterController extends Controller
{
    //

    public function publicLogin(Request $request){
        $formData = $request->all();
        $email = $request->email;
        $password = $request->password;
        $usertype = $request->usertype;
        $results = [];

        if (Auth::attempt(['email'=>$email ,'password' => $password,'user_type'=>$usertype])) {

            $publiclogin = Auth::User();
            $token = $publiclogin->createToken('MyApp')->accessToken;
            $results = array('email'=>$email,'pass'=>$token );
        return response::json(array('status' => 1, 'message' => 'User LoggedIn successfully..', 'result' => $results), 200)->header('token', $token);


        }else{

            return response::json(array('status' => 0, 'message' => 'Invalid Username/Password', 'result' => $results), 200);

        }


    }

    public function lawyerLogin(Request $request){
        $formData = $request->all();
        $email = $request->email;
        $password = $request->password;
        $results = [];

        if (Auth::attempt(['email'=>$email ,'password' => $password,'user_type'=>'lawyer'])) {

            $lawyerlogin = Auth::User();
            $token = $lawyerlogin->createToken('MyApp')->accessToken;
            $results = array('email'=>$email,'pass'=>$token );
        return response::json(array('status' => 1, 'message' => 'User LoggedIn successfully..', 'result' => $results), 200)->header('token', $token);


        }else{

            return response::json(array('status' => 0, 'message' => 'Invalid Username/Password', 'result' => $results), 200);

        }


    }
    public function clientLogin(Request $request){
        $formData = $request->all();
        $email = $request->email;
        $password = $request->password;
        $results = [];

        if (Auth::attempt(['email'=>$email ,'password' => $password,'user_type'=>'client'])) {

            $lawyerlogin = Auth::User();
            $token = $lawyerlogin->createToken('MyApp')->accessToken;
            $results = array('email'=>$email,'pass'=>$token );
        return response::json(array('status' => 1, 'message' => 'User LoggedIn successfully..', 'result' => $results), 200)->header('token', $token);


        }else{

            return response::json(array('status' => 0, 'message' => 'Invalid Username/Password', 'result' => $results), 200);

        }


    }
    public function adminLogin(Request $request){
        $formData = $request->all();
        $email = $request->email;
        $password = $request->password;
        $results = [];

        if (Auth::attempt(['email'=>$email ,'password' => $password,'user_type'=>'admin'])) {

            $lawyerlogin = Auth::User();
            $token = $lawyerlogin->createToken('MyApp')->accessToken;
            $results = array('email'=>$email,'pass'=>$token );
        return response::json(array('status' => 1, 'message' => 'User LoggedIn successfully..', 'result' => $results), 200)->header('token', $token);


        }else{

            return response::json(array('status' => 0, 'message' => 'Invalid Username/Password', 'result' => $results), 200);

        }


    }


    public function client(Request $request){

        $formdata=$request->all();
               
         $User = User::create([
            'name'=> $formdata['name'],
            'address'=> $formdata['address'],
            'city'=> $formdata['city'],
            'state'=> $formdata['state'],
            'phone_no'=> $formdata['phone_no'],
            'email'=> $formdata['email'],
            'password'=>bcrypt($formdata['password']),
            'otp'=> $formdata['otp'],
            'user_type'=> $formdata['user_type'],
 
         ]);

         if($User){
            return response::json(array('status' => 1, 'message' => 'Successfully Created'), 200);


         }else{
            return response::json(array('status' => 1, 'message' => 'Failed'), 200);
         }
        }
         public function lawyer(Request $request)
         {
             $formdata=$request->all();
            // echo"<pre>"; print_r($formdata);exit;
            $lawyer_photo= $formdata["photo"];
            $photo_name = $lawyer_photo->getClientOriginalName();
            $lawyer_photo->move(public_path() . '/lawyer_photo/', $photo_name);
            $photo= url('/') . '/lawyer_photo/' . $photo_name;
     
            $lawyer_certificates = $formdata["certificates"];
            $certificate_name = $lawyer_certificates->getClientOriginalName();
            $lawyer_certificates->move(public_path() . '/lawyer_certificates/', $certificate_name);
            $certificates = url('/') . '/lawyer_certificates/' . $certificate_name;
     
       


           $User = User::create([
            'name'=> $formdata['name'],
            'address'=> $formdata['address'],
            'city'=> $formdata['city'],
            'state'=> $formdata['state'],
            'phone_no'=> $formdata['phone_no'],
            'email'=> $formdata['email'],
            'password'=>bcrypt($formdata['password']),
            'otp'=> $formdata['otp'],
            'user_type'=> $formdata['user_type'],
 
         ]);

             $user_id = $User->id;
             
            // echo"<pre>"; print_r($user_id);exit;

           $Register = register::create([
             'user_id' => $user_id,
            'age'=> $formdata['age'],
            'gender'=> $formdata['gender'],
            'qualification'=> $formdata['qualification'],
            'working_status'=> $formdata['working_status'],
            'firm_name'=> $formdata['firm_name'],
            'experience'=> $formdata['experience'],
            'enrollment_no'=> $formdata['enrollment_no'],
            'photo'=> $photo,
            'certificates'=> $certificates,
            
     
            ]
        );
            
       

         if($User){
            return response::json(array('status' => 1, 'message' => 'Successfully Created'), 200);


         }else{
            return response::json(array('status' => 1, 'message' => 'Failed'), 200);
         }
        }
        public function admin(Request $request)
        {
            $formdata=$request->all();
           // echo"<pre>"; print_r($formdata);exit;
           
            $User = User::create([
            'email'=> $formdata['email'],
            'password'=> bcrypt($formdata['password']),
            'user_type'=>$formdata['user_type'],
    
            ]);
    
           
    return Response::json(['message'=>"stored successfully"]);  
        }
        public function clientdetails()
    {
        
        $user = Auth::User();
        $users= User::select('name','address','city','state','phone_no','email')->where('user_type', '=', '2')->first(); 
        $userArray = array();
       {
            //echo"<pre>";print_r($value);exit();
          $userArray[] = [
           
            "name" => $users->name,
            "address" => $users->address,
            "city" => $users->city,
            "state" => $users->state,
            "phone_no" => $users->phone_no,
            "email" => $users->email,
           ];
          ///echo"<pre>";print_r($userArray);exit();
        }
        return response::json(['error' => false, 'message' =>"success", "Result" => $userArray]);
        
        //echo"<pre>";print_r($user);exit();
        return response()->json(['success' => $user]);
    }
    public function lawyerdetails()
    {
        
        $user = Auth::User();
        $users= register::select('name','address','city','state','phone_no', 'email','age','gender','qualification','working_status','firm_name','experience','enrollment_no','photo','certificates')->leftJoin('users','lawyer_profile.user_id','=','users.id')->where('user_type', '=', '1')->first(); 
        $userArray = array();
       {
            //echo"<pre>";print_r($value);exit();
          $userArray[] = [
           
            "name" => $users->name,
            "address" => $users->address,
            "city" => $users->city,
            "state" => $users->state,
            "phone_no" => $users->phone_no,
            "email" => $users->email,
            "age" => $users->age,
            "gender" => $users->gender,
            "qualification" => $users->qualification,  
            "working_status" => $users->working_status,
            "firm_name" => $users->firm_name,
            "experience" => $users->experience,
            "enrollment_no" => $users->enrollment_no,
            "photo" => $users->photo,
            "certificates" => $users->certificates,
            
          ];
          ///echo"<pre>";print_r($userArray);exit();
        }
        return response::json(['error' => false, 'message' =>"success", "Result" => $userArray]);
        
        //echo"<pre>";print_r($user);exit();
        return response()->json(['success' => $user]);
    }

}
