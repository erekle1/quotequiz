<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'required|max:1000',
            'answers' => 'required|array|size:3',
            'answers.*.content' => 'required|max:255',
            'correctAnswerIndex' => ['required', 'integer', 'between:0,2'],

        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'The quote content is required.',
            'content.max' => 'The quote content must not be more than 1000 characters.',
            'answers.array' => 'The answers must be an array.',
            'answers.size' => 'A maximum of 3 answers is allowed.',
            'answers.*.content.required' => 'The answer content is required.',
            'answers.*.content.max' => 'The answer content must not be more than 255 characters.',
        ];
    }
}
