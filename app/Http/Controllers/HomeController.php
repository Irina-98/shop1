<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $date = date('d.m.Y H:i:s');
            Storage::append('ownLog.log', "[HomePageEnter] $date {$user->name} зашел на страницу home");
        }


        $categories = Category::get();// вывести все категории
        $data = [
            'categories' => $categories, 
            'title' => 'СПИСОК КАТЕГОРИЙ',
            'showTitle' => true
        ];
        return view('home', $data);
    }
            

    public function profile (Request $request)
    {
        //dd(session());
        //Auth::loginUsingId(1);
        $user = Auth::user();
       // $addresses = Address::where('user_id', $user->id)->get();//обращение к модели через где и получаем все адреса конкретного пользователя 
        return view('profile', compact('user'));// путь в личный кабинет прописали далее стр. веб
    }

    public function profileUpdate (Request $request)
    {
        $request->validate([
            'picture' => 'mimes:jpg,bmp,png',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user = User::find(Auth::user()->id);

        $file = $request->file('picture');
        $input = $request->all();

        

        if ($input['password']) {
            $currentPassword = $input['current_password'];
            if (!Hash::check($currentPassword, request()->user()->password)) {
                session()->flash('currentPasswordError');
                return back();
            } else {
                $user->password = Hash::make($input['password']);
                $user->save();
            }
        }

        if ($file) {
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $ext;
            $file->storeAs('public/img/users', $fileName);
            $user->picture = $fileName;
        }

        $address = Address::find($input['main_address']);
        $address->main = 1;
        $address->save();
        Address::where('user_id', $user->id)->where('id', '!=', $input['main_address'])->update([
            'main' => 0
        ]);

        if ($input['new_address']) {

            if ($input['main_new_address']) {
                Address::where('user_id', $user->id)->update([
                    'main' => 0
                ]);
                $mainAddress = true;
            } else {
                $mainAddress = !$user->addresses->contains(function ($address) {
                    return $address->main == true;
                });
            }
        

            $mainAddress = !$user->addresses->contains(function ($address) {
                return $address->main == true;// проверка
            });

            $address = new Address();
            $address->user_id = $user->id;
            $address->address = $input['new_address'];
            $address->main = $mainAddress;// проверка
            $address->save();
        }

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();
        session()->flash('profileUpdated');
        return back();
    }

    
}