<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Estudiante::all();
        $data = ["data" => $rows];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataBody = $request->all();
        $Estudiante = new Estudiante();
        $Estudiante->nombre = $dataBody['nombre'];
        $Estudiante->codigo = $dataBody['codigo'];
        $Estudiante->email = $dataBody['email'];
        $Estudiante->save();
        $data = ["data" => $Estudiante];
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Estudiante::find($id);
        if (empty($row)) {
            return response()->json(['msg' => "error"], 404);
        }
        $data = ["data" => $row];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBody = $request->all();
        $Estudiante = Estudiante::find($id);
        if (empty($Estudiante)) {
            return response()->json(['msg' => "error"], 404);
        }
        $Estudiante->nombre = $dataBody['nombre'];
        $Estudiante->codigo = $dataBody['codigo'];
        $Estudiante->email = $dataBody['email'];
        $Estudiante->save();
        $data = ["data" => $Estudiante];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Estudiante::find($id);
        if (empty($row)) {
            return response()->json(['msg' => "error"], 404);
        }
        $row->delete();
        $data = ["data" => "Estudiante eliminado"];
        return response()->json($data, 200);
    }
}
