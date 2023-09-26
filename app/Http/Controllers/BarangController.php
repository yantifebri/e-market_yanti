<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StorebarangRequest;
use App\Http\Requests\UpdatebarangRequest;
use App\Models\Produk;
use App\Models\User;
use Database\Factories\BarangFactory;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd('oke');
        try {
            $barang = Barang::latest()->get();
            $produk = Produk::pluck('nama_produk', 'id');
            $users = User::pluck('name', 'id');
            return view('barang.index', compact('barang', 'produk', 'users'));
        } catch (QueryException | Exception | PDOException $error) {
            //    $this->failResponse($error->getMessage(), $error->getCode());
            // return redirect()->back()->withErrors(['message' => 'Terjadi error']);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebarangRequest $request)
    {
        // Produk::create($request->all());
        // return redirect('produk')->with('success', 'Data produk berhasil ditambahkan');
        try {

            DB::beginTransaction();
            Barang::create($request->all());

            DB::commit();
        } catch (QueryException | Exception | PDOException $error) {
        }
        return redirect('barang')->with('success', 'Data barangberhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebarangRequest $request, Barang $barang)
    {
        try {
            DB::beginTransaction();
            $barang = Barang::findOrFail($barang);
            $validate = $request->validated();
            $barang->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {

        try {
            $barang->delete();
            return redirect('barang')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
