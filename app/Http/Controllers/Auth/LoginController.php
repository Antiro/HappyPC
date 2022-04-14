<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Application;
use App\Models\Contact;
use App\Models\ImagesOfUser;
use App\Models\Review;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // переходим на страницу авторизации
    public function login()
    {
        return view('auth.login');
    }

    // выполняем проверку идентификационных данных
    public function loginCheck(LoginRequest $request)
    {

        if (Auth::attempt($request->only(['email', 'password']),
            $request->get('remember') == 'on')
        ) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'errorLogin' => 'ошибка входа...'
        ]);
    }


//  выходим из аккаунта
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    }

// показываем страницу личного кабинета
    public function profile()
    {
         $user=Auth::user();
         $applications=Application::where('user_id',$user->id)->get()->all();
         $reviews=Review::where('user_id',$user->id)->get()->all();
         $imgUsers=ImagesOfUser::all();

        return view('auth.profile',[
            'user'=>$user,
            'applications'=>$applications,
            'reviews'=>$reviews,
            'imgUsers'=>$imgUsers,
            'contacts' => Contact::all(),
        ]);
    }
}
