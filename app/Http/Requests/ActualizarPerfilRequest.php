<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarPerfilRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'nombre' =>'required',
			'password' =>'min:8|confirmed'
		];
	}
} 
?>