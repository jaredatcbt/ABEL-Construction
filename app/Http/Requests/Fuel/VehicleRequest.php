<?php

namespace App\Http\Requests\Fuel;

use App\Abstracts\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required|string',
            'model' => 'required|string',
        ];

    }

    public function messages()
    {

        $messages = [
            'name.required' => 'Name field is required.',
            'name.string' => 'Name must be a string.',
            'model.required' => 'Model is required',
            'model.string' => 'This field must be string',
        ];

        return $messages;
    }
}
