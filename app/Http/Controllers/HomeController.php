<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlokasiHostname;
use App\SistemOperasi;
use App\Bast;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $os = SistemOperasi::get()->count();
        $bast = Bast::get()->count();
        $dn = date('Y-m-d');
        $tenggat = Bast::where('end_date','<=', $dn)->get();
        // dd($basts);
        return view('dashboard',compact('os','bast','tenggat','no'));
    }

    public function chartUnit(){
        $setjen = AlokasiHostname::where('unit','SETJEN')->get()->count();
        $djpb = AlokasiHostname::where('unit','DJPB')->get()->count();
        $dja = AlokasiHostname::where('unit','DJA')->get()->count();
        $djp = AlokasiHostname::where('unit','DJP')->get()->count();
        $djbc = AlokasiHostname::where('unit','DJBC')->get()->count();
        $djkn = AlokasiHostname::where('unit','DJKN')->get()->count();
        $djpk = AlokasiHostname::where('unit','DJPK')->get()->count();
        $djppr = AlokasiHostname::where('unit','DJPPR')->get()->count();
        $itjen = AlokasiHostname::where('unit','ITJEN')->get()->count();
        $bkf = AlokasiHostname::where('unit','BKF')->get()->count();
        $bppk = AlokasiHostname::where('unit','BPPK')->get()->count();
        $lk = AlokasiHostname::where('unit','LUAR_KEMENKEU')->get()->count();
        
        $unit = [
            [
                'unit' => 'SETJEN',
                'qty' => $setjen
            ],
            [
                'unit' => 'DJPB',
                'qty' => $djpb
            ],
            [
                'unit' => 'DJA',
                'qty' => $dja
            ],
            [
                'unit' => 'DJP',
                'qty' => $djp
            ],
            [
                'unit' => 'DJBC',
                'qty' => $djbc
            ],
            [
                'unit' => 'DJKN',
                'qty' => $djkn
            ],
            [
                'unit' => 'DJPK',
                'qty' => $djpk
            ],
            [
                'unit' => 'DJPPR',
                'qty' => $djppr
            ],
            [
                'unit' => 'ITJEN',
                'qty' => $itjen
            ],
            [
                'unit' => 'BKF',
                'qty' => $bkf
            ],
            [
                'unit' => 'BPPK',
                'qty' => $bppk
            ],
            [
                'unit' => 'LUAR KEMENKEU',
                'qty' => $lk
            ],
        ];
        return response()->json($unit);
    }
}
