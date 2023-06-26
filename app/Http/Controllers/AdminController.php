<?php

namespace App\Http\Controllers;

use App\Login;
use App\Models\Customer;
use App\Social;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Socialite;
use App\Models\SocialCustomers;
session_start();


class AdminController extends Controller
{
    public function index(){
        return view('login_admin');
    }

    public function login_facebook(){
        config(['services.facebook.redirect' => env('FACEBOOK_REDIRECT')]);
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook_customer(){
        config(['services.facebook.redirect' => env('FACEBOOK_REDIRECT')]);
        $provider = Socialite::driver('facebook')->user();
        dd($provider);
//        $account = SocialCustomers::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
//        if($account!=NULL){
//            //login in vao trang quan tri
//            $account_name = Customer::where('id_customer',$account->id_customer)->first();
//            Session::put('id_customer',$account_name->id_customer);
//            Session::put('name_customer',$account_name->name_customer);
//            return redirect('/login-checkout')->with('message', 'Đăng nhập bằng tài khoản facebook <span style="color:#ffffff">' .$account_name->email_customer.'</span> Thành công');
//
//        }elseif($account==NULL){
//
//            $customer_login=new SocialCustomers([
//                'provider_user_id' => $provider->getId(),
//                'provider_user_email' =>$provider->getEmail(),
//                'provider'=>'facebook'
//            ]);
//            $customer=Customer::where('email_customer',$provider->getEmail())->first();
//
/////////////////////////////////////////////////////////////////////////
//
//            if(!$customer){
//                $customer=Customer::create([
//                    'name_customer'=>$provider->getName(),
//                    'email_customer'=>$provider->getEmail(),
//                    'customer_password'=>'',
//                    'customer_phone'=>''
//                ]);
//            }
//
//            $customer_login->customer()->associate($customer);
//            $customer_login->save();
//
//            $account_new = Customer::where('id_customer',$customer_login->id_customer)->first();
//            Session::put('id_customer',$account_new->id_customer);
//            Session::put('name_customer',$account_new->name_customer);
//            return redirect('/login-checkout')->with('message', 'Đăng nhập bằng tài khoản facebook <span style="color:#ffffff">' .$account_new->email_customer.'</span> Thành công');
//        }
    }



//    public function homeadmin(){
//        return view('admin.layout1_admin');
//    }
//
//    public function loginadmin(Request $request)
//            {
//                $email_admin = $request->email_admin;
//                $password_admin = md5($request->password_admin);
//
//                $result = DB::table('tbladmin')->where('email_admin', $email_admin)->
//                where('password_admin',$password_admin)->first();
//                if($result){
//                    Session::put('name_admin',$result->name_admin);
//                    Session::put('id_admin',$result->id_admin);
//                    return view('admin.layout1_admin');
//                }else {
//                    Session::put('message','Mat khau hoac tai khoan bi sai');
//                    return Redirect::to('/admin');
//                }
//                // return view('admin.layout1_admin');
//
//
//    }
//
//    public function logoutadmin()
//            {
//                Session::put('name_admin',null);
//                Session::put('id_admin',null);
//                return Redirect::to('/admin');
//            }

}
