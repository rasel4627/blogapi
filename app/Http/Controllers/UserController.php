<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function AllUser()
    {
    	$user = DB::table('user')->get();
    	return $user;
    }

    public function SingleUser($id)
    {
        $singleuser = DB::table('user')->where('id',$id)->get();
        return $singleuser;
    }

    public function UserRegistration(Request $request)
    {
    	$array = json_decode($request->getContent(),true);
        $data['name'] = $array['name'];
        $data['website'] = $array['website'];
        $data['email'] = $array['email'];
        $data['password'] = $array['password'];
    	$insert = DB::table('user')->insert($data);
        $val = DB::table('user')->where('email',$array['email'])->where('password',$array['password'])->get();
        return $val;
    }

    

    public function UserLogin(Request $request) {
        $data = json_decode($request->getContent(),true);
        $mail = $data['email'];
        $pass = $data['password'];
        $result = DB::table('user')->where('email',$mail)->get();
        if(!is_null($result)){ 
            $success = DB::table('user')->where('email', $mail)->where('password', $pass)->select('*')->get();
            return $success;
        }
    }

}
