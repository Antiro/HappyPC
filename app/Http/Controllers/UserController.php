<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function update(UserRequest $request, User $user)
    {

        if ($request->img_id==null)
            $request->img_id=$user->img_id;

        if ($request->email==null)
            $request->email=$user->email;

        if ($request->name==null)
            $request->name=$user->name;

        if ($request->phone==null)
            $request->phone=$user->phone;

        $user->update([
            'img_id' => $request->img_id,
            'email'=>$request->email,
            'name'=>$request->name,
            'phone'=>$request->phone,
        ]);

        return redirect()->route('profile')->with('success', 'Данные успешно изменены ...');
    }

    public function adminView()
    {
        $admin = Auth::user();
        $users = User::all();

        return view('admin.user.users', compact(
            'admin',
            'users',
        ));
    }
}
