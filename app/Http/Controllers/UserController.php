<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use App\Repository\AuthRepository;
use App\Repository\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Validator;


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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('home');
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
            return redirect('/home/recipes');
        }

        // 

        return redirect('/register')->withInput()->withErrors(['email' => 'Email or password are incorrect']);
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
        return view('user.recipes', compact('recipes'));
    }

    public function show($id)
    {
        $recipes = Recipe::find($id);


        return view('user.show', compact('recipes'));
    }
}
