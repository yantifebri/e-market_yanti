<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\User;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;

use function PHPUnit\Framework\returnSelf;

class UsersController extends Controller
{
 /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));

      
          
            try {
                $data['users'] = User::orderBy('created_at', 'DESC')->get();

                // untuk merefresh ke halaman itu kembali untuk melihat hasil input
                return view('users.index')->with($data);
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
        // try {
        //     $pelanggan = Pelanggan::latest()->get();
        //     return view('pelanggan.index', compact('pelanggan'));
        // } catch (QueryException | Exception | PDOException $error) {
        //     //    $this->failResponse($error->getMessage(), $error->getCode());
        //     // return redirect()->back()->withErrors(['message' => 'Terjadi error']);
        // }
    
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(StoreUsersRequest $request)
    {
        try {

            DB::beginTransaction();
            User::create($request->all());

            DB::commit();
        } catch (QueryException | Exception | PDOException $error) {
        }
        return redirect('users')->with('success', 'Data user berhasil ditambahkan');
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function edit($id)
    {
        $users = User::find($id);
        return view('users.edit')->with('users', $users);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, $users)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($users);
            $validate = $request->validated();
            $user->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy($users)
    {
        try {
            DB::table('users')->where('id', $users)->delete();
            return redirect('users')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
   

