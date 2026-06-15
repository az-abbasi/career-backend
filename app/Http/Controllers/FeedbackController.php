<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $feedback = Feedback::create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'category' => $request->category,
            'comment' => $request->comment,
        ]);

        return response()->json(['message' => 'Feedback submitted successfully!', 'feedback' => $feedback]);
    }

    public function index()
    {
        $feedbacks = Feedback::with('user')->latest()->get();
        return response()->json($feedbacks);
    }
}