<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitsRequest extends FormRequest
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
        $rules = [
            'type_unit' => 'required',
            'name' => 'required|string|max:255',
            'city' => 'required|string',
            'compound' => 'required|',
            'location' => 'nullable|string',
            'no_unit' => 'required|string|max:5',
            'float' => 'required|numeric',
            'elevator' => 'required|in:0,1',
            'distance_between_beach_and_unit' => 'required|integer',
            'distance_between_beach_unit' => 'required|string',
            'distance_between_pool_and_unit' => 'required|integer',
            'distance_between_pool_unit' => 'required|string',
            'Room_amenities' => 'required|array',
            'available_booking_date' => 'required|date_format:Y-m-d',
            'policies_roles' => 'required|string|max:250',
            'type_booking' => 'sometimes',
            'price' => 'required|decimal:1,2',
            'insurance_amount' => 'required|decimal:1,2',
            'sale_id' => 'nullable|exists:sales,id',
            'image.*'=>'mimes:png,jpg,jpeg | image',
        ];
        if (in_array($this->method(), ['PUT','PATCH']))
        {
            $rules['images']='nullable';
        }else{
            $rules['images']='required';
        }
        return $rules;
    }
}
