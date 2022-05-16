<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearFotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'album_id'=>'required|exists:album,album_id',
            'nombre'=>'required',
            'descripcion' =>'required',
            'imagen'=>'required|image|max:20000'
        ];
    }
}
