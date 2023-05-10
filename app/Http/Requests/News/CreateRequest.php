<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => ['string', 'required', 'min:5'],
            'author' => ['nullable', 'min:4', 'string'],
            'description' => ['required', 'string', 'min:5'],
            'status' => ['string'],
            'category_ids' => ['array', 'required'],
            'category_ids.*' => ['exists:categories,id'],
            'sources' => ['integer'],
            'photo' => ['url', 'nullable'],
        ];
    }

    public function getCategoryIds()
    {
        return (array) $this->validated('category_ids');
    }
}
