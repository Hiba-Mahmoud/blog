<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>'required|unique:posts,title|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'content'=>'required|string',
            'status'=>'required|in:active,pending',
            'tags'=>'required|string',
            'category_id'=>'required|numeric',
        ];
    }
    public function messege()
    {
        return [

        ];
    }
}
