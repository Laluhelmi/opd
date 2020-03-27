<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opd;
use RealRashid\SweetAlert\Facades\Alert;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $datas = opd::get();
        return view('opd.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_opd' => 'required|integer|max:255',
            'nama_opd' => 'required|string'
        ]);
        Opd::create([
            'kode_opd' => $request->get('kode_opd'),
            'nama_opd' => $request->get('nama_opd'),
        ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('opd.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "this is edit";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Opd::findOrFail($id);
        return view('opd.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Opd::find($id)->update([
            'kode_opd' => $request->get('kode_opd'),
            'nama_opd' => $request->get('nama_opd'),
        ]);

        alert()->success('Berhasil.','Data telah diubah!');

        return redirect()->route('opd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Opd::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('opd.index');
    }
}
