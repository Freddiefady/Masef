<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'number_of_rooms' => 'required|integer',
            'number_of_beds' => 'required|integer',
            'bed_width' => 'required|integer',
            'Room_amenities' => 'required|array',
            'number_of_bathroom' => 'required|integer',
            'reception' => 'required|array',
            'content_kitchen' => 'required|array',
            'unit_id' => 'required|exists:units,id',
            'sale_id' => 'required|exists:sales,id',
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
