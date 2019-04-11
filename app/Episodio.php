<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['numero', 'temporada', 'assistido', 'serie_id'];
    public $timestamps = false;
    protected $appends = ['_links'];
    protected $hidden = ['serie_id'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getLinksAttribute()
    {
        return [
            'self' => '/episodios/' . $this->id,
            'serie' => '/series/' . $this->serie()->first()->id
        ];
    }

    public function getAssistidoAttribute(bool $assistido): bool
    {
        return $assistido;
    }
}
