<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
	protected$table = 'foto';

	/**
	* The primary key for the model.
	*
	*@var string
	*/
	protected $primaryKey = 'foto_id';

	/**
	*@var array
	*/
	protected $fillable = ['foto_nombre', 'foto_descripcion', 'foto_ruta','album_id'];

	public function album()
	{
		return $this->belongsTo('App\Models\Album', 'album_id', 'album_id');
	}

}
