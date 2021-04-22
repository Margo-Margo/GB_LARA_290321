<?php


namespace App\Http\Controllers;


use App\Models\Feedback;
use Illuminate\Support\Facades\View;

class FeedbackController extends Controller
{

    public function create()
    {
        return response(view('feedback'));
    }

    public function save()
    {
        return redirect()->route('feedback::create');
    }

}
