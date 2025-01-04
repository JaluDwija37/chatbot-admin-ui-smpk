<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnansweredQuestionResource;
use App\Models\UnanswerdQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnansweredQuestionController extends Controller
{
    public function index()
    {
        $questions = UnanswerdQuestion::latest()->paginate(5);

        return new UnansweredQuestionResource(true, 'List Pertanyaan Belum Dijawab', $questions);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $question = UnanswerdQuestion::create([
            'question' => $request->question,
        ]);


        return new UnansweredQuestionResource(true, 'Pertanyaan Belum Dijawab Berhasil Ditambahkan!', $question);
    }
}
