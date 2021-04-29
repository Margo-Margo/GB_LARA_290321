<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminNewsSaveRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|string|min:10|max:50|unique:news",
            "description" => "required|max:1024",
            "category_id" => "required|exists:categories,id|integer",
            "active" => "boolean",
            "publish_date" => "date",
        ];
    }
}
