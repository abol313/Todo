<?php

namespace App\Http\Requests;

use App\Models\Todo;
use App\Models\UserTodo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UpdateTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $todo = $this->route('todo');
        return Auth::check() || $todo->hasUser(Auth::id())
            ? Gate::allows('update-todo', $todo)
            : true ;
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
            'title' => 'required|string|between:5,100|',
            'description' => 'nullable|string|max:65535',
            'category' => 'nullable|integer|exists:categories,id',
            'done' => 'required|boolean',
        ];

    }
}
