<?php

namespace App\Http\Requests\Character;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:250',
            'element' => 'required|string|min:3|max:250',
            'gender' => 'required|string|min:3|max:250',
            'city' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:3|max:6000',
            'featured_image' => 'required|image|max:5000|mimes:jpg,jpeg,png,webp',
            'model_img' => 'required|image|max:5000|mimes:jpg,jpeg,png,webp',
        ];
    }
}
