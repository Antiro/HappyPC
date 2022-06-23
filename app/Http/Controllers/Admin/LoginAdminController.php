<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\AboutUs;
use App\Models\Application;
use App\Models\Contact;
use App\Models\Evaluation;
use App\Models\ImagesOfService;
use App\Models\ImagesOfUser;
use App\Models\MyClass;
use App\Models\Review;
use App\Models\Role;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\User;
use App\Models\Worker;
use App\Models\WorkersClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use function GuzzleHttp\Promise\all;

class LoginAdminController extends Controller
{
    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function loginAdminCheck(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))
            && Gate::allows('admin')) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        if (Auth::attempt($request->only(['email', 'password']))
            && Gate::allows('moderator')) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'errorLogin' => 'Ошибка входа'
        ]);
    }

    // выходим из аккаунта
    public function logoutAdmin()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // показываем страницу личного кабинета
    public function dashboard()
    {
        $admin = Auth::user();

        $aboutUs = AboutUs::all();
        $classes = MyClass::all();
        $contacts = Contact::all();
        $roles = Role::all()->count();
        $users = User::all()->count();
        $reviews = Review::all()->count();
        $workers = Worker::all()->count();
        $services = Service::all()->count();
        $sponsors = Sponsor::all()->count();
        $contactsCount = Contact::all()->count();

        $allApplications = Application::all()->count();
        $workApplications = Application::all()->where('status_id', 1)->count();
        $readyApplications = Application::all()->where('status_id', 4)->count();

        $evaluations = Evaluation::all();
        $imgOfUser = ImagesOfUser::all();
        $evaluationsLikes = Review::where('evaluation_id', 1)->where('status_id', 2)->get()->count();

        $workersClass = WorkersClass::all();
        $imgOfServices = ImagesOfService::all();

        return view('admin.dashboard', compact(
                'admin', 'roles', 'users', 'reviews', 'workers', 'aboutUs',
                'classes', 'contacts', 'services', 'sponsors',
                'evaluations', 'imgOfUser', 'workersClass', 'imgOfServices',
                'evaluationsLikes', 'contactsCount' , 'allApplications','workApplications','readyApplications',
            )
        );
    }
}
