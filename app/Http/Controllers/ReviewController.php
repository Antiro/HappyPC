<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function registerReview (ReviewRequest $request)
    {

//        dd($request->user);
//        dd($request->comment);
        $application = Review::create([
                'user_id' => $request->user,
                'service_id' => $request->service,
                'status_id' => 1,
                'evaluation_id' => $request->evaluation,
                'text' => $request->comment,
            ]
        );

        if ($application) {
            return redirect()->route("services.show",$request->service)
                ->with('success', 'Отзыв отправлен на обработку. Вы можете посмотеть статус отзыва в личном кабинете.');
        }

        return back()->withErrors([
            'error' => 'что-то пошло не так...'
        ]);
    }

    public function adminView()
    {
        $admin = Auth::user();
        $reviews = Review::all();

        return view('admin.review.reviews', compact(
            'admin',
            'reviews',
        ));
    }
}
