<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\API\UsersApiModel;

class UsersApiController extends Controller
{
    // index
    public function index()
    {
        return response([
            'message' => 'Rest API Biodata Berhasil'
        ], 200);
    }

    // ambil data
    public function biodatauser()
    {
        $biodata = UsersApiModel::all();
        return response([
            'status' => 'success',
            'message' => 'Data Biodata Users ditemukan',
            'biodata' => $biodata
        ], 200);
    }

    // insert data
    public function insert_data_biodata(Request $request)
    {
        $biodata = new UsersApiModel;

        // ambil gambar dan menyimpan gambar
        $insert_biodata['nama'] = $request->nama;
        $insert_biodata['alamat'] = $request->alamat;
        $insert_biodata['phone'] = $request->phone;
        $insert_biodata['ttl'] = $request->ttl;
        $insert_biodata['pendidikan'] = $request->pendidikan;
        $insert_biodata['email'] = $request->email;
        $biodata->create($insert_biodata);
        if ($biodata) {
            return response([
                'status' => 'success',
                'message' => 'insert data biodata berhasil di simpan',
                'data' => $biodata
            ], 200);
        } else {
            return response([
                'status' => 'success',
                'message' => 'insert data biodata gagal di simpan',
                'data' => []
            ], 404);
        }
    }

    // update data
    public function update_data_biodata(Request $request, $id)
    {
        $cek_id = UsersApiModel::firstWhere('id', $id);

        // update image
        // $fileName = time() . $request->file('foto')->getClientOriginalName();
        // $path = $request->file('foto')->storeAs('public/images/biodata', $fileName);
        if ($cek_id) {
            $biodata = UsersApiModel::find($id);
            $update_biodata['nama'] = $request->nama;
            $update_biodata['alamat'] = $request->alamat;
            $update_biodata['phone'] = $request->phone;
            $update_biodata['ttl'] = $request->ttl;
            $update_biodata['pendidikan'] = $request->pendidikan;
            $update_biodata['email'] = $request->email;
            $biodata->update($update_biodata);
            if ($biodata) {
                return response([
                    'status' => 'success',
                    'message' => 'update data biodata berhasil di simpan',
                    'data' => $biodata
                ], 200);
            } else {
                return response([
                    'status' => 'success',
                    'message' => 'update data biodata gagal di simpan',
                    'data' => []
                ], 404);
            }
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Data Product tidak ditemukan'
            ], 404);
        }
    }

    // delete data
    public function delete_data_product($id)
    {
        $cek_id = UsersApiModel::firstWhere('id', $id);

        if ($cek_id) {
            $biodata =  UsersApiModel::destroy($id);
            if ($biodata) {
                return response([
                    'status' => 'success',
                    'message' => 'delete data biodata berhasil',
                    'data' => $biodata
                ], 200);
            } else {
                return response([
                    'status' => 'NOT FOUND',
                    'message' => 'Data biodata tidak ditemukan'
                ], 404);
            }
        }
    }
}
