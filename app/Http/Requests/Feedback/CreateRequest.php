<?php

namespace App\Http\Requests\Feedback;

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
            'name' => ['string', 'required', 'min:5'],
            'phone' => ['required', 'min:11','max:11', 'string'],
            'email' => ['required', 'string', 'min:11'],
            'source' => ['url', 'required', 'min:10'],
            'feedback' => ['string','min:5', 'required'],
        ];
    }
}
