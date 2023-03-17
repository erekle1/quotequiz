<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveQuoteRequest;
use App\Http\Resources\QuoteResource;
use App\Models\Answer;
use App\Models\Quote;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $quotes = QuoteResource::collection(Quote::paginate(12));
        return Inertia::render('Admin/Quote/Index', [
            'quotes' => $quotes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/Quote/Add', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveQuoteRequest $request)
    {

        $quote = Quote::create([
            'quiz_id' => 1,
            'content' => $request->get('content')
        ]);
        $answers = $request->get('answers');

        foreach ($answers as $index => $answer) {
            Answer::create([
                'is_correct' => $request->get('correctAnswerIndex') == $index ? 1 : 0,
                'content'    => $request->get('content'),
                'quote_id'   => $quote->id
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
