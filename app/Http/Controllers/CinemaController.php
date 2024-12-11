<?php

namespace App\Http\Controllers;

use App\Models\CinemaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CinemaController extends Controller
{
    public function index()
    {
        $datas = CinemaModel::with('movies')->get();

        return response()->json([
            'status_code' => 200,
            'message' => 'Data Berhasil Diambil',
            'data' => $datas
        ], 200);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'exists' => 'Id Movie tidak ditemukan'
        ];

        $validator = Validator::make($request->all(), [
            'id_movie' => 'required|exists:movie,id_movie',
            'nama_cinema' => 'required',
            'address' => 'required',
            'harga' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Data Gagal Ditambahkan',
                'errors' => $validator->errors()
            ], 400);
        }

        $data = CinemaModel::create($request->all());

        return response()->json([
            'status_code' => 201,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'exists' => 'Id Movie tidak ditemukan'
        ];

        $validator = Validator::make($request->all(), [
            'id_movie' => 'required|exists:movie,id_movie',
            'nama_cinema' => 'required',
            'address' => 'required',
            'harga' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Data Gagal Diupdate',
                'errors' => $validator->errors()
            ], 400);
        }

        $data = CinemaModel::find($id);

        if (!$data) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Data Tidak Ditemukan',
            ], 404);
        }

        $data->update($request->all());

        return response()->json([
            'status_code' => 200,
            'message' => 'Data Berhasil Diupdate',
            'data' => $data
        ], 200);
    }

    public function destroy(string $id)
    {
        $data = CinemaModel::find($id);

        if (!$data) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status_code' => 200,
            'message' => 'Data Berhasil Dihapus'
        ], 200);
    }
}
