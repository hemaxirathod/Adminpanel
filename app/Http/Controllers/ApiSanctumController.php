<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\SanctumServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApiSanctumController extends Controller
{
    public function index(Request $request){
        $data = User::all();
        return response()->json(['message'=>"list","data"=>$data]);
    }
    public function loginform(Request $request){
        return view("auth.login");
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "name" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator]);
        }
        $password = Hash::make($request->password);
        $data = User::create([
            "name" => $request->name,
            "email" =>  $request->email,
            "password" => $password,
        ]);

        // $data = User::where("id",1)->get();
        if($data){
            $token = $data->createToken('token-name')->plainTextToken;
            session()->put("token",$token);
            return response()->json(['message'=>'successfully created','token'=> $token]);
        }
        return response()->json(['message'=>'error']);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            "email" =>"required | email",
            "password" => "required", 
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator]);
        }
        $user = User::where("email","=",$request->email)->first();

        // $credentials = $request->only(['email','password']);
        // $user = Auth::attempt($credentials);
       
        if(!$user || !Hash::check($request->password,$user['password'])){
        // if($user) {
            return response()->json(['message'=>"invalid credentials and token"]);
        }
        else{
            $token = $user->createToken('token-name')->plainTextToken;
            return response()->json(["message"=>"Authenticated" ,"access_token" => $token]);
        }
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['message'=>"Logout successfully"]);
    }

    public function dashboardindex(Request $request){
        return response()->json(["success"=>"Redirect to dashboard"]);
    }
}
