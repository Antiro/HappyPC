<?php

namespace App\Http\Controllers;
use App\Http\Requests\ReviewAdminRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\Status;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function show(Review $review)
    {
        return view('auth.review', ['review' => $review]);
    }

    public function edit(Review $review)
    {
        if (Gate::allows('admin')) {
            return view('admin.review.edit', [
                'review' => $review,
                'statuses' => Status::where('id','<',4)->get(),
                'admin' => Auth::user()
            ]);
        }

        return redirect()->route('admin.review.reviews')
            ->with('errors', 'Возникла ошибка');
    }

    public function update(ReviewRequest $request, Review $review)
    {
        if (Auth::user()->id == $review->user_id) {

            $review->update([
                'text' => $request->get('text'),
                'evaluation_id' => $request->get('evaluation'),
            ]);

            return redirect()->route('review.show', $review)
                ->with('success', 'Данные успешно изменены');
        }
        return redirect()->route('review.show', $review)
            ->with('er', 'Возникла ошибка');
    }

    public function updateAdmin(ReviewAdminRequest $request, Review $review)
    {
//        dd($review);
        if (Gate::allows('admin')) {
            $review->update([
                'status_id'=>$request->get('status_id'),
            ]);

            return redirect()->route('review.edit', $review)
                ->with('success', 'Данные успешно изменены');
        }
        return redirect()->route('review.edit', $review->id)
            ->with('errors', 'Возникла ошибка');
    }

    public function destroy(Review $review)
    {
        if (Gate::allows('admin')) {
            $review->delete();

            return redirect()->route('admin.ReviewsAdminView')
                ->with('success', 'Данные успешно удалены');
        }

        return redirect()->route('admin.ReviewsAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    public function registerReview(ReviewRequest $request)
    {

        $application = Review::create([
                'status_id' => 1,
                'user_id' => $request->user,
                'text' => $request->comment,
                'service_id' => $request->service,
                'evaluation_id' => $request->evaluation,
            ]
        );

        if ($application) {
            return redirect()->route("services.show", $request->service)
                ->with('success', 'Отзыв отправлен на обработку. Вы можете посмотеть статус отзыва в личном кабинете.');
        }

        return back()->withErrors([
            'error' => 'что-то пошло не так...'
        ]);
    }

    public function adminView(Request $request)
    {
        $admin = Auth::user();
        $reviews = Review::allReal();
        $statuses = Status::where('id','<',4)->get();

        if (isset($request->status)) {

            $reviews = $reviews->where('status_id', $request->status);
        }

        return view('admin.review.reviews', [

            'admin' => Auth::user(),
            'reviews' => $reviews->get(),
            'status'=>$request->status,
            'statuses' => $statuses,

        ]);
    }
}
