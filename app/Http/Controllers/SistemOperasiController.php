<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SistemOperasi;


class SistemOperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view ('sistem_operasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('sistem_operasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sistemoperasi = new SistemOperasi;
        $sistemoperasi->name = $request->name;
        $sistemoperasi->save();
        return redirect()->route('sistemoperasi.index')->withStatus(__('Sistem Operasi successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sistemoperasi = SistemOperasi::find($id);
        return view('sistem_operasi.edit', compact('sistemoperasi'));
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
        $sistemoperasi = SistemOperasi::find($id);
        $sistemoperasi->name = $request->name;
        $sistemoperasi->save();
        return redirect()->route('sistemoperasi.index')->withStatus(__('OS successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sistemoperasi = SistemOperasi::findOrFail($id);
        SistemOperasi::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Sistem Operasi Deleted'
        ]);
    }
}
