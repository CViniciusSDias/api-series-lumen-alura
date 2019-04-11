<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['nome'];
    public $timestamps = false;
    protected $appends = ['_links'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute()
    {
        return [
            'self' => '/series/' . $this->id,
            'episodios' => $this->episodios()->get()->map(function (Episodio $episodio) {
                return '/episodios/' . $episodio->id;
            }),
        ];
    }
}
