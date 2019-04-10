<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['numero', 'temporada', 'assistido', 'serie_id'];
    public $timestamps = false;

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
