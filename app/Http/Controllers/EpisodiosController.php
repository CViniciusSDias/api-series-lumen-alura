<?php

namespace App\Http\Controllers;

use App\Episodio;

class EpisodiosController extends BaseController
{

    protected function recuperarModel(): string
    {
        return Episodio::class;
    }
}
