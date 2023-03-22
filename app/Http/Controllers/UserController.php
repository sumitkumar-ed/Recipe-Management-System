<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Jobs\EmailVerificationJob;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use App\Repository\AuthRepository;
use App\Repository\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    private $authrepository;
    public function __construct(AuthRepositoryInterface $authrepository)
    {
        $this->authrepository = $authrepository;
    }


    public function search(Request $req)
    {
        $data = Recipe::where('title', 'like', '%' . $req
            ->input('search') . '%')
            ->get();

        return view('user.search', compact('data'));
    }


    public function register(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);



        $user = new User;
        $user->uuid = Str::uuid()->toString();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verification_token = Str::random(40);
        $user->save();
        dispatch(new EmailVerificationJob($user));
        Session::put('success', 'You Have Successfully register ! Please Verify Your email to login .');
        // return redirect()->route('home');
        // dd(Session::get('success'));
        return redirect('/login');
    }
    public function login(Request $request)
    {
        // $user= User::where(['email'=>$request->email])->first();
        // if(!($user and Hash::check($request->password,$user->password)))
        // {
        //     // return "User name And Password is not match";
        //     return redirect('/register');
        // }else{

        //     // return "User name And Password is match";
        //     // dd($request->session()->get('user',$user,));
        //     $request->session()->get('user',$user);
        //     return redirect('/home/recipes');
        // }

        $logindata = $request->only('email', 'password');

        $loginData = $this->authrepository->login($logindata);
        if ($loginData) {
            $verified = Auth::user()->is_email_verified;
            if ($verified) {
                return redirect('/home/recipes');
            }
            Auth::logout();
            Session::flush();
            Session::put('error', 'Please Verify your Email First !');
            return redirect('/login');
        }

        Session::put('error', 'Enter a Valid user name and password !');
        return redirect('/login');
    }

    public function index()
    {


        // $lastThreeRecords = YourModel::orderBy('id', 'desc')->take(3)->get();

        $recipes = Recipe::orderBy('id', 'desc')->take(6)->get();;
        return view('user.home', compact('recipes'));
    }

    public function showAll()
    {
        $recipes = Recipe::all();
        return view('user.recipes', compact('recipes'))->with('success', 'login successfully !');
    }

    public function show($id)
    {

        try {
            $recipes = Recipe::where('uuid', $id)->first();
            if ($recipes) {
                return view('user.show', compact('recipes'));
            }

            return redirect()->back()->withErrors("Invalid Request");
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
