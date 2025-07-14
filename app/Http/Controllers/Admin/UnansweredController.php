<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UnanswerdQuestion;
use Illuminate\Http\Request;

class UnansweredController extends Controller
{
    public function index()
    {
        $unanswered_questions = UnanswerdQuestion::query()->orderBy('created_at', 'desc')->get();
        return view('unanswered', compact('unanswered_questions'));
    }

    public function destroy(UnanswerdQuestion $unanswered_question)
    {
        $unanswered_question->delete();
        return redirect()->route('unanswered-question.index')->with('success', 'Unanswered question deleted successfully');
    }
}
