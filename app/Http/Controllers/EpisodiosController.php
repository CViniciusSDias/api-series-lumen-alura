<?php

namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EpisodiosController extends BaseController
{
    protected function recuperarModel(): string
    {
        return Episodio::class;
    }

    public function buscarPorSerie(int $serieId)
    {
        try {
            return Episodio::query()->where('serie_id', $serieId)->firstOrFail();
        } catch (ModelNotFoundException $notFoundHttpException) {
            return response()->json('Recurso não existente', 404);
        }
    }
}
