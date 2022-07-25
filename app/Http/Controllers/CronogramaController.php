<?php

namespace App\Http\Controllers;

use App\Http\Resources\CronogramaResource;
use App\Models\Cronograma;
use App\Models\Osce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CronogramaController extends BaseController
{
    //
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'etapa' => 'required',
            'nomenclatura' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        Osce::where("nomenclatura", $request->nomenclatura)->update(["estado" => $request->estado]);

        /*verificamos si ya existe y en que estado se encuentra, para actualizar*/
        $verify = Cronograma::where([
            ["etapa", "=", $request->etapa],
            ["nomenclatura", "=", $request->nomenclatura],

        ])->get()->first();

        if ($verify) {
            Cronograma::where([
                ["etapa", "=", $request->etapa],
                ["nomenclatura", "=", $request->nomenclatura],

            ])->update($request->except(['nomenclatura']));
            return $this->sendResponse(new CronogramaResource($verify), 'Cronograma updated.');
        }

        $entidad = Cronograma::create($input);
        return $this->sendResponse(new CronogramaResource($entidad), 'Cronograma created.');
    }

    public function show(){
        $cron = Cronograma::all();
        return response()->json($cron, 200);
    }
}
