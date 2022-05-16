<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Album;
use App\Http\Requests\CrearAlbumRequest;

class AlbumController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$usuario=Auth::user();
		$albumes = $usuario->albumes;
		return view('album.mostrar',['albumes'=>$albumes]);
	}

	public function getCrear()
	{
		return view('album.crear');
	}

	public function postCrear(CrearAlbumRequest $request)
	{
		$usuario = Auth::user();
		$album = new Album;
		$album->album_nombre = $request->get('nombre');
		$album->album_descripcion = $request->get('descripcion');
		$album->usuario_id = $usuario->id;
		$album->save();

		return redirect('/album')->with('correcto','El álbum ha sido creado');
	}

	public function getActualizar()
	{
		return 'Mostrando Formulario de Actualizacion de Album';
	}

	public function postActualizar()
	{
		return 'Actualizando el Album';
	}

	public function postEliminar()
	{
		return 'Eliminando Album';
	}
	
	public function missingMethod($parameters=array())
	{
		abort(404);
	}
}
?>