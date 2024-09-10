<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Admin\Faq;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::query()->get();
        return view('faq.index', ['faqs' => $faqs]);
    }

    public function create(): View
    {
        return view('faq.create');
    }

    public function store(FaqRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (!$data['patterns'][0]) {
            $data['patterns'] = [""];
        }

        Faq::create([
            'tag' => $data['tag'],
            'patterns' => json_encode($data['patterns'], true),
            'responses' => json_encode($data['responses']),
        ]);

        return redirect()->route('faq.index');
    }

    public function edit(Faq $faq): View
    {
        return view('faq.edit', ['faq' => $faq]);
    }

    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $data = $request->validated();

        if (!$data['patterns'][0]) {
            $data['patterns'] = [""];
        }

        $faq->update([
            'tag' => $data['tag'],
            'patterns' => json_encode($data['patterns']),
            'responses' => json_encode($data['responses']),
        ]);

        return redirect()->route('faq.index');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('faq.index');
    }

    public function api()
    {
        // Fetch some data
        $data = Faq::all();
        $intents = $data->map(function ($item) {
            return [
                'tag' => $item->tag,
                'patterns' => $item->patterns ? json_decode($item->patterns, true) : [""],
                'responses' => json_decode($item->responses, true),
                'context' => [""], // Assuming context is empty in your example
            ];
        });

        // Return the data as JSON
        return response()->json([
            'success' => true,
            'data' => [
                'intents' => $intents,
            ],
        ], 200);
    }
}
