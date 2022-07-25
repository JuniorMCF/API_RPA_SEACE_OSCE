<?php

namespace App\Http\Controllers;

use App\Http\Resources\OsceResource;
use App\Models\Osce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OsceController extends BaseController
{
    //
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nomenclatura' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }


        /*verificamos si ya existe y en que estado se encuentra, para actualizar*/
        $verify = Osce::where("nomenclatura", $request->nomenclatura)->get()->first();

        if ($verify) {
            Osce::where("nomenclatura", $request->nomenclatura)->update($request->except(['nomenclatura']));
            return $this->sendResponse(new OsceResource($verify), 'Osce updated.');
        }

        $osce = Osce::create($input);
        return $this->sendResponse(new OsceResource($osce), 'Osce created.');
    }

    public function show(){
        $osces = Osce::all();
        return response()->json($osces, 200);
    }
}
