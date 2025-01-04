<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Http\Resources\FaqResource;
use App\Models\Admin\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $questions = Faq::query()->get();

        return new FaqResource(true, 'All Question', $questions);
    }
}
