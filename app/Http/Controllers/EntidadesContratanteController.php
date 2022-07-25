<?php

namespace App\Http\Controllers;

use App\Http\Resources\EntidadesContratanteResource;
use App\Models\EntidadesContratante;
use App\Models\Osce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntidadesContratanteController extends BaseController
{
    //
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'RUC' => 'required',
            'nomenclatura' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        Osce::where("nomenclatura",$request->nomenclatura)->update(["estado"=>$request->estado]);

        /*verificamos si ya existe y en que estado se encuentra, para actualizar*/
        $verify = EntidadesContratante::where([
            [ "RUC","=",$request->RUC],
            ["nomenclatura", "=", $request->nomenclatura],

        ])->get()->first();

        if ($verify) {
            EntidadesContratante::where([
                [ "RUC","=",$request->RUC],
                ["nomenclatura", "=", $request->nomenclatura],

            ])->update($request->except(['nomenclatura']));
            return $this->sendResponse(new EntidadesContratanteResource($verify), 'Entidad Contratante updated.');
        }

        $entidad = EntidadesContratante::create($input);
        return $this->sendResponse(new EntidadesContratanteResource($entidad), 'Entidad Contratante created.');
    }

    public function show(){
        $e_c = EntidadesContratante::all();
        return response()->json($e_c, 200);
    }
}
