<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterIndexTodoRequest extends FormRequest
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
            //
            'filter' => 'nullable|array',
            'filter.categories' => 'nullable|array',
            'filter.categories.*' => 'required_with:categories|integer|exists:categories,id'
        ];
    }
}
