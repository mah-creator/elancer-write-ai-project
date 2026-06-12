<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class PostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'cover' => [
                'nullable',
                'image',
                'mimetypes:image/png,image/jpeg',
                'dimensions:min_width=200,min_height=200,max_width=2000,max_height=2000'
            ],
            'tags' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'content.required' => 'The content field is required.',
            'cover.image' => 'The cover must be an image.',
            'cover.mimetypes' => 'The cover must be a file of type: png, jpeg.',
            'cover.dimensions' => 'The cover has invalid image dimensions.',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'title',
            'content' => 'content',
            'cover' => 'cover image',
        ];
    }
}
