<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultiCityRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "from1" => "required",
            "to1" => "required",
            "DepartureDate1" => "required",
            "from2" => "required",
            "to2" => "required",
            "DepartureDate2" => "required",
            "from3" => "required",
            "to3" => "required",
            "DepartureDate3" => "required",
            "Adults" => "required",
            "Chilldren" => "optional",
            "Infants" => "optional",
        ];
    }
}
