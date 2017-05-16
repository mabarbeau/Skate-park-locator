<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpot extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'slug'=> 'required|unique:spots|max:255',
          'title'=> 'required',
          'description'=> 'required',
          'address'=> 'required',
          'locality'=> 'required',
          'reagion'=> 'required',
          // 'postcode'=> '',
          'country'=> 'required',
          'lat'=> 'required',
          'lng'=> 'required'
        ];
    }
}
