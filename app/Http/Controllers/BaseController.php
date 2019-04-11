<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    abstract protected function recuperarModel(): string;

    public function store(Request $request)
    {
        return response($this->recuperarModel()::create($request->all()), 201);
    }

    public function index(Request $request)
    {
        return $this->recuperarModel()::paginate($request->query('per_page', 10));
    }

    public function show(int $id)
    {
        $model = $this->recuperarModel()::find($id);
        if (is_null($model)) {
            return response()->json('Recurso não existente', 404);
        }

        return $model;
    }

    public function update(Request $request, int $id)
    {
        $model = $this->recuperarModel()::find($id);
        if (is_null($model)) {
            return response()->json('Recurso não existente', 404);
        }

        $model->fill($request->all());
        if (!$model->save()) {
            return response()->json('Erro ao atualizar recurso', 500);
        }

        return $model;
    }

    public function destroy(int $id)
    {
        if (!$this->recuperarModel()::destroy($id)) {
            return response()->json('Recurso não existente', 404);
        }

        return response('')
            ->setStatusCode(204);
    }
}
