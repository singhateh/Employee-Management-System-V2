<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
//        $details = DB::table('users')
//            ->select('dob', 'gender', 'phone','email','join_date','address')
//            ->get();
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_details = User::join('salaries','salaries.employee_id','=','users.id')
                        ->join('designations','designations.employee_id','=','users.id')
                        ->join('skills','skills.employee_id','=','users.id')
                        ->select('salaries.*','designations.*',
                        'skills.*',
                                   'users.*','users.id as user_id')
                        ->where('users.id',$user_id)
                        ->first();
    //    dd($user_details);
        return view('admin.profile.index',compact('user','user_details'));
    }

    // public function profile(Request $request, $id)
    // {
    //     $user = Auth::user();
    //     $user_details = User::join('salaries','salaries.employee_id','=','users.id')
    //                     ->join('designations','designations.employee_id','=','users.id')
    //                     ->join('skills','skills.employee_id','=','users.id')
    //                     ->select('salaries.*','designations.*','skills.*',
    //                                'users.*','users.id as user_id')
    //                      ->where('users.id',$id)
    //                     ->first();
    // //    dd($user_details);
    //     return view('admin.profile.index',compact('user','user_details'));
    // }


    public function verifyPassword ( Request $request)
    {

        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id', $user_id)->first();
        if (Hash::check($current_password, $check_password->password)) {
            echo 'true';
            die;
        } else {
            echo 'false';
            die;
        }
    }


    public function changePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $old_pwd = User::where('id', Auth::User()->id)->first();
            $current_pwd = $data['current_password'];
            if (Hash::check($current_pwd, $old_pwd->password)) {
                //now update password
                $new_pwd = bcrypt($data['new_password']);
                User::where('id', Auth::User()->id)->update(['password' => $new_pwd]);

                Toastr::success('You have Successfully changed your password!','Success');
                return redirect()->back();
            } else {
                // return the user back
                Toastr::error('Password Fail to update!','Error');
                return redirect()->back();
            }
        }
    }


    // public function changePassword(Request $request)
    // {
    //         $current_pass = $request->get('current_password');
    //         $user_id = Auth::User()->id;
    //         $users = User::where('id', $user_id)->first();
    //         // dd($users); die;

    //         $userCount = User::where('id',$user_id)->where(
    //          'password',$current_pass)->get();

    //          dd($userCount); die;
    //         //  we will use condition here okay
    //         if( $userCount == 1){

    //             $new_password = $user['confirm_password']; // this is the new password that will be save okay.
                
    //             User::where('id', $user_id)
    //             ->update(['password'=>$new_password]);

    //             Toastr::success('You have Successfully changed your password!','Success');
    //             return redirect()->back();

    //         }else{
    //             Toastr::error('Password Fail to update!','Error');
    //             return redirect()->back();
    //             // send invalid message or email not found okay..
    //         }

    //         // so now let's try and see okay..

    // }


    public function image()
    {
        $user = Auth::user();
        //        dd($users->username);
                return view('admin.layout.master',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword1()
    {
        return view('admin.profile.changepw');
    }

    public function updatePassword(Request $request)
    {
        $pass = $request->all();
        $role_id = $request->role_id;
        $userid = $request->user_id;
        $current_password = $pass('current_password');
        $check_password = User::where('id',$userid );
        if(Hash::check($current_password,$check_password->password)){
           
        $updateRole = User::where('id',$userid)->update([
                'password' => $role_id
       ]);
            Toastr::success('Password successfully updated!','Success');
            return redirect()->back();
        }else{
            Toastr::error('Password Fail to update!','Error');
            return redirect()->back();
        }
    //    return view('admin.profile.changepw');
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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
