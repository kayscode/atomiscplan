<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SkillPostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return[
            "name"=>"required",
            "state"=>"required",
            "skill_type"=>"required",
            "skill_access_by"=>"required",
            "career_plan_id"=>"required",
            "actions_plan"=>"required"
        ];
    }
}
