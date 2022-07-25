<?php

namespace App\Http\Controllers;

use App\Http\Resources\EntidadeResource;
use App\Models\Entidade;
use App\Models\Osce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntidadeController extends BaseController
{
    //
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'entidad_contratante' => 'required',
            'nomenclatura' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        Osce::where("nomenclatura", $request->nomenclatura)->update(["estado" => $request->estado]);

        /*verificamos si ya existe y en que estado se encuentra, para actualizar*/
        $verify = Entidade::where([
            ["entidad_contratante", "=", $request->entidad_contratante],
            ["nomenclatura", "=", $request->nomenclatura],

        ])->get()->first();

        if ($verify) {
            Entidade::where([
                ["entidad_contratante", "=", $request->entidad_contratante],
                ["nomenclatura", "=", $request->nomenclatura],

            ])->update($request->except(['nomenclatura']));
            return $this->sendResponse(new EntidadeResource($verify), 'Entidad updated.');
        }

        $entidad = Entidade::create($input);
        return $this->sendResponse(new EntidadeResource($entidad), 'Entidad created.');
    }

    public function show(){
        $e = Entidade::all();
        return response()->json($e, 200);
    }
}
