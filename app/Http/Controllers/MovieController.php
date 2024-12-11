<?php

namespace App\Http\Controllers;

use App\Models\MovieModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function index()
    {
        $datas = MovieModel::all();

        return response()->json([
            'status_code' => 200,
            'message' => 'Data Berhasil Diambil',
            'data' => $datas
        ], 200);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi'
        ];

        $validator = Validator::make($request->all(), [
            'genre' => 'required',
            'judul' => 'required',
            'durasi' => 'required',
            'rating' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Data Gagal Ditambahkan',
                'errors' => $validator->errors()
            ]);
        }

        $data = MovieModel::create($request->all());

        return response()->json([
            'status_code' => 201,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi'
        ];
        
        $validator = Validator::make($request->all(), [
            'genre' => 'required',
            'judul' => 'required',
            'durasi' => 'required',
            'rating' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Data Gagal Diubah',
                'errors' => $validator->errors()
            ], 400);
        }

        $data = MovieModel::find($id);

        if (!$data) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }

        $data->update($request->all());

        return response()->json([
            'status_code' => 200,
            'message' => 'Data Berhasil Diubah',
            'data' => $data
        ], 200);
    }

    public function destroy(string $id)
    {
        $data = MovieModel::find($id);

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
