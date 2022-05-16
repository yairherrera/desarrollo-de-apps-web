<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActualizarPerfilRequest;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		return 'Mostrando fotos de Usuario';
	}

	public function getCrear()
	{
		return 'Mostrando Formulario de Usuario';
	}

	public function postCrear()
	{
		return 'almacenando Usuario';
	}

	public function getActualizar()
	{
		return view('usuario.actualizar');
	}

	public function postActualizar(ActualizarPerfilRequest $request)
	{
		$usuario = Auth::user();
		$usuario->nombre = $request->get('nombre');
		if ($request->has('password')) {
			$usuario->password = bcrypt($request->get('password'));
		}
		$usuario->save();
		return redirect('/home')->with('correcto','su perfil ha sido actualizado');
	}

}
?>