<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
        ];
    }
}
