<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use App\Http\Requests\CrearFotoRequest;
use App\Http\Requests\ActulizarFotoRequest;
use Carbon\Carbon;

class FotoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		$album_id = $request->get('album_id');
		$album = Album::find($album_id);
		$fotos = $album->fotos;
		return view('album.fotos',['fotos'=>$fotos,'album'=>$album]);

	}

	public function getCrear()
	{
		$album_id = $request->get('album_id');
		return view('foto.crear',['album_id'=>$album_id]);
	}

	public function postCrear()
	{
		$album_id = $request->get('album_id');
		$imagen = $request->file('image');
		$ruta ='/img/';
		$nombre = sha1(Carbon::now()). "." .$image->guessExtension();
		$image->move(getcwd().$ruta,$nombre);
		$foto = new Foto;
		$foto->foto_nombre = $request ->get('nombre');
		$foto->foto_descripcion = $request->get('descripcion');
		$foto->foto_ruta = $ruta.$nombre;
		$foto->album_id = $album_id;
		$foto->save();

		return redirect("/album/fotos?album_id=$album_id")->with('correcto','La foto ha sido creada');
	}

	public function getActualizar()
	{
		$foto_id = $request->get('foto_id');
		$foto = Foto::find($foto_id);
		return view('foto.actualizar',['foto'=>$foto]);
	}


	public function postActualizar()
	{
		return 'Actualizando la Foto';
	}

	public function postEliminar()
	{
		return 'Eliminando Foto';
	}

	public function missingMethod($parameters=array())
	{
		abort(404);
	}
}
?>