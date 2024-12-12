<?php

namespace App\Http\Controllers;

use App\Models\JadwalModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index()
    {
        $datas = JadwalModel::with('movie', 'cinema')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data jadwal berhasil diambil',
            'data' => $datas
        ], 200);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'exists' => 'Data :attribute tidak ditemukan',
            'integer' => 'Kolom :attribute harus berupa angka',
        ];

        $validator = Validator::make($request->all(), [
            'id_movie' => 'required|exists:movie,id_movie',
            'id_cinema' => 'required|exists:cinema,id_cinema',
            'waktu_tayang' => 'required',
            'seats' => 'required|integer'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $data = JadwalModel::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Data jadwal berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'exists' => 'Data :attribute tidak ditemukan',
            'integer' => 'Kolom :attribute harus berupa angka',
        ];

        $validator = Validator::make($request->all(), [
            'id_movie' => 'required|exists:movie,id_movie',
            'id_cinema' => 'required|exists:cinema,id_cinema',
            'waktu_tayang' => 'required',
            'seats' => 'required|integer'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $data = JadwalModel::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data jadwal tidak ditemukan'
            ], 404);
        }

        $data->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Data jadwal berhasil diubah',
            'data' => $data
        ], 200);
    }

    public function destroy(string $id)
    {
        $data = JadwalModel::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data jadwal tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data jadwal berhasil dihapus'
        ], 200);
    }
}
