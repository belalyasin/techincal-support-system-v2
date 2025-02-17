<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDefaultMessageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'body' => ['required',
                    'string',
                    'min:3',
                    'max:255',
                    Rule::unique('default_messages', 'body')->ignore($this->id),
                ],
                'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
                'user_id' => ['nullable', 'integer', 'exists:users,id'],
            ];
        } else {
            return [
                'body' => ['sometimes',
                    'string',
                    'min:3',
                    'max:255',
                    Rule::unique('default_messages', 'body')->ignore($this->id),
                ],
                'parent_id' => ['sometimes', 'integer', 'exists:categories,id'],
                'user_id' => ['sometimes', 'integer', 'exists:users,id'],
            ];
        }
    }
}
