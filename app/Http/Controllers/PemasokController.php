<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use PDO;
use PDOException;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd('oke');
        try {
            $pemasok = Pemasok::latest()->get();
            return view('pemasok.index', compact('pemasok'));
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
    public function store(StorePemasokRequest $request)
    {
        // Produk::create($request->all());
        // return redirect('produk')->with('success', 'Data produk berhasil ditambahkan');
        try {

            DB::beginTransaction();
            Pemasok::create($request->all());

            DB::commit();
        } catch (QueryException | Exception | PDOException $error) {
        }
        return redirect('pemasok')->with('success', 'Data produk berhasil ditambahkan');
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
        $pemasok = Pemasok::find($id);
        return view('pemasok.edit')->with('pemasok', $pemasok);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemasokRequest  $request, $pemasok)
    {
        try {
            DB::beginTransaction();
            $pemasok = Pemasok::findOrFail($pemasok);
            $validate = $request->validated();
            $pemasok->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasok $pemasok)
    {
        try {
            $pemasok->delete();
            return redirect('pemasok')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
