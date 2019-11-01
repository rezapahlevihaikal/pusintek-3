<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlokasiHostname;
use App\Upload_file;
use File;
use App\Bast;
use PDF;

class BastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('bastdocument.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alokasihostnames = AlokasiHostname::all();
        return view ('bastdocument.create', compact('alokasihostnames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $bastdoc = new Bast;
        $bastdoc->pernyataan = $request->pernyataan;
        $bastdoc->nama = $request->nama;
        $bastdoc->nip = $request->nip;
        $bastdoc->jabatan = $request->jabatan;
        $bastdoc->unit = $request->unit;
        $bastdoc->start_date = date('Y-m-d');
        if($request->sewa != null){
            $bastdoc->sewa = $request->sewa;
            $effectiveDate = date('Y-m-d', strtotime("+".$request->sewa." months"));
            $bastdoc->end_date = $effectiveDate;
        }else{
            $bastdoc->sewa = 2;
            $effectiveDate = date('Y-m-d', strtotime("+2 months"));
            $bastdoc->end_date = $effectiveDate;
        }
        $bastdoc->save();
        $bastdoc->vm()->attach($request->alokasihostname);
        return redirect()->route('bastdocument.index')->withStatus(__('Bast Document successfully created.'));
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
        $bast = Bast::find($id);
        $alokasihostnames = AlokasiHostname::all();

        return view ('bastdocument.edit' , compact('bast','alokasihostnames'));
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
        $bastdoc = Bast::find($id);
        $bastdoc->pernyataan = $request->pernyataan;
        $bastdoc->nama = $request->nama;
        $bastdoc->nip = $request->nip;
        $bastdoc->jabatan = $request->jabatan;
        $bastdoc->unit = $request->unit;
        $bastdoc->save();
        return redirect()->route('bastdocument.index')->withStatus(__('Bast Document Information successfully updated.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bastdoc = Bast::find($id);
        $upload = Upload_file::where('bast_id',$id)->first();
        $data['count'] = Upload_file::where('bast_id',$id)->count();
        // dd($upload);
        if($data['count'] > 0){
            $path = 'scan/'.$upload->gambar;
            File::delete($path);
            $upload->delete();
        }

        $bastdoc->vm()->detach();
        $bastdoc->delete();
        return response()->json([
            'success' => true,
            'message' => 'Alokasi Hostname VM Deleted'
        ]);
    }

    
}
