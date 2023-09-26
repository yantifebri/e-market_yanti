<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use PDO;
use PDOException;
use PDF;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd('oke');
        try {
            $produk = Produk::latest()->get();
            return view('produk.index', compact('produk'));
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
    public function store(StoreProdukRequest $request)
    {
        // Produk::create($request->all());
        // return redirect('produk')->with('success', 'Data produk berhasil ditambahkan');
        try {

            DB::beginTransaction();
            Produk::create($request->all());

            DB::commit();
        } catch (QueryException | Exception | PDOException $error) {
        }
        return redirect('produk')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('produk.edit')->with('produk', $produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest  $request, $produk)
    {
        try {
            DB::beginTransaction();
            $produk = Produk::findOrFail($produk);
            $validate = $request->validated();
            $produk->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
            return redirect('produk')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function download(){
           $data['produk'] = Produk::get();
           $pdf = PDF::loadView('produk/data',$data);

           ///download pdf file with download method
        //    $date = date('YMD');
        //    return $pdf->stream();
           return $pdf->download('test.pdf');

    }
    public function exportData(){
            $fileName= date('Ymd').'_produk.xlsx';
            return Excel::download(new ProdukExport, $fileName);
    
    }
}
