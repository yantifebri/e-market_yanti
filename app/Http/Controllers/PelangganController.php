<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePelangganRequest;
use App\Models\Pemasok;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Http\Requests\UpdatePemasokRequest;
use App\Models\Pelanggan;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use PDO;
use PDOException;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd('oke');
        try {
            $pelanggan = Pelanggan::latest()->get();
            return view('pelanggan.index', compact('pelanggan'));
        } catch (QueryException | Exception | PDOException $error) {
            //    $this->failResponse($error->getMessage(), $error->getCode());
            // return redirect()->back()->withErrors(['message' => 'Terjadi error']);
        }
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelangganRequest $request)
    {
        // Produk::create($request->all());
        // return redirect('produk')->with('success', 'Data produk berhasil ditambahkan');
        try {

            DB::beginTransaction();
            Pelanggan::create($request->all());

            DB::commit();
        } catch (QueryException | Exception | PDOException $error) {
        }
        return redirect('pelanggan')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasok $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.edit')->with('pelanggan', $pelanggan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest  $request, $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan = Pelanggan::findOrFail($pelanggan);
            $validate = $request->validated();
            $pelanggan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();
            return redirect('pelanggan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
