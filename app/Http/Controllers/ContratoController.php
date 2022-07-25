<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContratoResource;
use App\Models\Contrato;
use App\Models\Osce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContratoController extends BaseController
{
    //
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'postor' => 'required',
            'nomenclatura' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        Osce::where("nomenclatura", $request->nomenclatura)->update(["estado" => $request->estado]);

        /*verificamos si ya existe y en que estado se encuentra, para actualizar*/
        $verify = Contrato::where([
            ["postor", "=", $request->postor],
            ["nomenclatura", "=", $request->nomenclatura],

        ])->get()->first();

        if ($verify) {
            Contrato::where([
                ["postor", "=", $request->postor],
                ["nomenclatura", "=", $request->nomenclatura],

            ])->update($request->except(['nomenclatura']));
            return $this->sendResponse(new ContratoResource($verify), 'Contrato updated.');
        }

        $entidad = Contrato::create($input);
        return $this->sendResponse(new ContratoResource($entidad), 'Contrato created.');
    }

    public function show(){
        $contract = Contrato::all();
        return response()->json($contract, 200);
    }
}
