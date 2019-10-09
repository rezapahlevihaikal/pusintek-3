<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SistemOperasi;
use App\AlokasiHostname;
use DB;

class AlokasiHostnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view ('alokasihostname.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sistemoperasi = SistemOperasi::all();
        return view ('alokasihostname.create', compact('sistemoperasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request);
        if($request->unit === 'SETJEN'){
            $id_unit = 'VDC01';
        }elseif($request->unit === 'DJA'){
            $id_unit = 'VDC02';
        }elseif($request->unit === 'DJP'){
            $id_unit = 'VDC03';
        }elseif($request->unit === 'DJBC'){
            $id_unit = 'VDC04';
        }elseif($request->unit === 'DJPB'){
            $id_unit = 'VDC05';
        }elseif($request->unit === 'DJKN'){
            $id_unit = 'VDC06';
        }elseif($request->unit === 'DJPK'){
            $id_unit = 'VDC07';
        }elseif($request->unit === 'DJPPR'){
            $id_unit = 'VDC08';
        }elseif($request->unit === 'ITJEN'){
            $id_unit = 'VDC09';
        }elseif($request->unit === 'BKF'){
            $id_unit = 'VDC11';
        }elseif($request->unit === 'BPPK'){
            $id_unit = 'VDC12';
        }elseif($request->unit === 'LUAR_KEMENKEU'){
            $id_unit = 'VDC13';
        }
        
        $statement = DB::select("SHOW TABLE STATUS LIKE 'alokasi_hostnames'");
        $nextId = $statement[0]->Auto_increment;
        // $nextId = str_pad($nextId , 3 , 0);
        // dd($nextId);
        // $lastvmId = AlokasiHostname::orderBy('id', 'desc')->first()->id;
        $lastIncreament = substr($nextId, -3);
        $newOrderId = str_pad($lastIncreament , 3, 0, STR_PAD_LEFT);
        // dd($newOrderId);
        $tipe = $request->tipe;
        $hostname = $id_unit.''.$newOrderId.''.$tipe;

        
        $alokasihostname = new AlokasiHostname;
        $alokasihostname->unit = $request->unit;
        $alokasihostname->hostname = $hostname;
        $alokasihostname->description = $request->desc;
        $alokasihostname->ip = $request->ip;
        $alokasihostname->label_vm = $hostname.'-'.$request->desc;
        $alokasihostname->sistem_operasi = $request->sistemOperasi;
        $alokasihostname->cpu = $request->cpu;
        $alokasihostname->memory = $request->memory;
        $alokasihostname->disk = $request->disk;
        $alokasihostname->cluster_host = $request->clusterHost;
        $alokasihostname->data_store = $request->dataStore;
        $alokasihostname->no_tiket = $request->tiket;
        $alokasihostname->keterangan = $request->keterangan;
        $alokasihostname->pic = $request->pic;
        $alokasihostname->pic_opd = $request->picOpd;
        $alokasihostname->no_bast = $request->noBast;
        $alokasihostname->save();

        return redirect()->route('alokasihostname.index')->withStatus(__('Alokasi Hostname VM successfully created.'));
        
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
        $alokasihostname = AlokasiHostname::find($id);
        $sistemoperasi = SistemOperasi::all();

        return view ('alokasihostname.edit', compact('alokasihostname','sistemoperasi'));
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
        $alokasihostname = AlokasiHostname::find($id);
        $alokasihostname->description = $request->desc;
        $alokasihostname->ip = $request->ip;
        $alokasihostname->sistem_operasi = $request->sistemOperasi;
        $labelvm = $alokasihostname->hostname."-".$request->desc;
        $alokasihostname->label_vm = $labelvm;
        $alokasihostname->cpu = $request->cpu;
        $alokasihostname->memory = $request->memory;
        $alokasihostname->disk = $request->disk;
        $alokasihostname->cluster_host = $request->clusterHost;
        $alokasihostname->data_store = $request->dataStore;
        $alokasihostname->no_tiket = $request->tiket;
        $alokasihostname->keterangan = $request->keterangan;
        $alokasihostname->pic = $request->pic;
        $alokasihostname->pic_opd = $request->picOpd;
        $alokasihostname->no_bast = $request->noBast;
        $alokasihostname->save();
        return redirect()->route('alokasihostname.index')->withStatus(__('Alokasi Hostname VM successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alokasihostname = AlokasiHostname::findOrFail($id);
        AlokasiHostname::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Alokasi Hostname VM Deleted'
        ]);
    }
}
