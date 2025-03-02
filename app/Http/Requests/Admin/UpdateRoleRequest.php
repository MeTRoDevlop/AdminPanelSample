<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('role_edit');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'      => ['required', 'string', 'max:255', Rule::unique('roles')->ignore(request()->route('role')->id)],
            'label'      => ['required', 'string', 'max:255'],
            'permissions'   => ['required', 'array'],
            'permissions.*' => ['exists:permissions,id', 'integer'],
        ];
    }
}
