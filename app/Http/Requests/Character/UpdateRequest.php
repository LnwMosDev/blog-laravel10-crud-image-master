<?php

namespace App\Http\Requests\Character;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // dont' forget to set this as true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
{
    return [
        'name' => 'required|string|max:255',
        'element' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'description' => 'required|string',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // ตรวจสอบว่าไม่ว่างเปล่าและเป็นไฟล์รูปภาพที่ถูกต้อง
        'model_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // ตรวจสอบว่าไม่ว่างเปล่าและเป็นไฟล์รูปภาพที่ถูกต้อง
    ];
}
}
