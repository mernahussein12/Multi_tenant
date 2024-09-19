<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    // Determine if the user is authorized to make this request
    public function authorize(): bool
    {
        return true;
    }

    // Define validation rules for creating or updating a course
    public function rules(): array
    {
        return [
            'name.en' => 'required|string|max:255',
            'name.ar' => 'required|string|max:255',
            'content.en' => 'required|string',
            'content.ar' => 'required|string',
            'image' => 'required|image',
            'slug' => 'required|string|unique:courses,slug',
            'status' => 'required|in:pending,approved,rejected',
        ];
    }
}

