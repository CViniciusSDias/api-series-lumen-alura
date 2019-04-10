<?php

namespace App\Http\Controllers;

use App\Serie;

class SeriesController extends BaseController
{
    protected function recuperarModel(): string
    {
        return Serie::class;
    }
}
