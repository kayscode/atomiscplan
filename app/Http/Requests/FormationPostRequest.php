<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FormationPostRequest extends FormRequest
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
        return [
            "name" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "fields" => "nullable",
            "hard_skills"=>"nullable",
            "soft_skills"=> "nullable",
            "image" => "nullable",
            "is_published" => "nullable",
            "description" => "nullable"
        ];
    }
}
