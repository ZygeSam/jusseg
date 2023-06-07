<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoundTripRequest extends FormRequest
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
            "DepartureDate1" => "required",
            "PreferredTime1" => "optional",
            "from2" => "required",
            "to2" => "required",
            "DepartureDate2" => "required",
            "PreferredTime2" => "optional",
            "from1" => "required",
            "to1" => "required",
            "Adults" => "required",
            "Chilldren" => "optional",
            "Infants" => "optional",
        ];
    }
}
