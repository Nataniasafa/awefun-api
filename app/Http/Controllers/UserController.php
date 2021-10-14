<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        $data= $request->only(['name', 'email', 'password']);
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email,',
                'password' => 'required|string|min:6',
            ]
            );
            if($validator->fails()){
                $error = $validator->errors();
                return response()->json(compact('error'), 401);
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $status = "success Register User";
            return response()->json(compact('status', 'user'), 200);
    }
    public function loginUser(Request $request)
    {
            $user = User::where('email', $request['email'])->first();

            if($user && Hash::check($request->password, $user->password)){
                $token = Str::random(60);
                $user->remember_token = $token;
                $user->save();

                return response()->json([
                    'status'=>200,
                    'message'=>'success',
                    'token'=>$token,
                    'user'=>$user
                ], 200);
            }
            return response()->json([
                'status'=>401,
                'message'=>'failed',
            ], 401);  
    
      
}
public function logOutUser(Request $request)
{
        $user = User::where('remember_token',$request->bearerToken())->first();
        

        if($user){
            $user->remember_token = null;
            $user->save();
            return response()->json([
                'status'=>200,
                'message'=>'success',
            ], 200);
        }
        return response()->json([
            'status'=>401,
            'message'=>'failes',
        ], 401);

    }
    public function updateUser(Request $request, $id)
{      
            $user = User::find($id);
            $data = $request->all();
           
             if(isset($request->name)){
                 $user->name = $data['name'];
             }
             if(isset($request->email)){
                $user->email = $data['email'];
            }
            if(isset($request->password)){
                $user->password = Hash::make($data['password']);
            }
            $user->save();
               return response()->json(compact('user'),200);
            

    }
    public function getUser($id){
        $user = User::find($id);
    return response()->json(compact('user'), 200);
}
}
