<?php

namespace App\Http\Controllers;

use App\Models\TiketModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    public function index(){
        $tiket = TiketModel::with('jadwal.cinema')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data tiket berhasil ditampilkan.',
            'data' => $tiket,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Kolom :attribute tidak boleh kosong.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'exists' => 'Kolom :attribute tidak valid.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
        ];

        $validator = Validator::make($request->all(), [
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'jumlah_tiket' => 'required|integer',
            'harga' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
                'data' => null,
            ], 400);
        }

        $tiket = TiketModel::find($id);

        if (!$tiket) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tiket tidak ditemukan.',
            ], 404);
        }

        $tiket->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Data tiket berhasil diubah.',
            'data' => $tiket,
        ], 200);
    }

    public function destroy(string $id)
    {
        $tiket = TiketModel::find($id);

        if (!$tiket) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tiket tidak ditemukan.',
            ], 404);
        }

        $tiket->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data tiket berhasil dihapus.',
        ], 200);
    }
}
