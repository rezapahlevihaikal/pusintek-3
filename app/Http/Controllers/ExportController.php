<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use File;
use DB;
use Excel;
use App\Bast;
use Yajra\DataTables\Datatables;
use App\SistemOperasi;
use App\AlokasiHostname;
use Validator;
use App\Upload_file;

class ExportController extends Controller
{
    public function cetak_surat($id)
    {
        $no = 1;
        $bast = Bast::find($id);
        $pdf = PDF::loadview('BAST_CLOUD', compact('bast','no'));
        $pdf->setPaper('legal', 'potrait');
    	return $pdf->stream();
    }

    public function uploadFile($id)
    {
        $scan = Upload_File::where('bast_id',$id)->first();
        if($scan == null){
            $scan = 'gadagambar';
        }
        $id_bast = $id;

        // return response()->file('./scan/'.$scan->gambar);
        // dd($id_bast);

        return view('uploadfile',compact('id_bast' , 'scan'));
    }

    public function showFile($id){
        $scan = Upload_File::where('bast_id',$id)->first();
        return response()->file('./scan/'.$scan->gambar);
    }

   

    public function StoreUploadFile(Request $request)
    {

        // dd($request);
      $this->validate(
          $request, 
            [
                // 'gambar'    => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
                'gambar' => 'required|file|mimes:pdf'
            ],
            [
                'gambar.required' => 'harus upload scan an bro/sis',
                // 'gambar.image' => 'upload nya cuma bisa image bro/sis',
                'gambar.mimes' => 'upload nya cuma bisa image bro/sis',
                'gambar.max' => 'file nya kegedean cuma bs max 2mb :(',
            ]
    
        );

      $upload = new Upload_file;
      $upload->bast_id = $request->no_bast;
        
      if($request->hasFile('gambar')){
          $file = $request->file('gambar');
          $filename =time().'.'.$file->getClientOriginalExtension();
          $destinationPath = public_path('scan');
          $file->move($destinationPath , $filename);
          $upload->gambar = $filename;
      }
      $upload->save();

      return back();

    }

    public function UpdateFileUpload (Request $request , $id){
        $this->validate(
            $request, 
                [
                    // 'gambar'    => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
                    'gambar' => 'required|file|mimes:pdf'
                ],
                [
                    'gambar.required' => 'harus upload scan an bro/sis',
                    // 'gambar.image' => 'upload nya cuma bisa image bro/sis',
                    'gambar.mimes' => 'upload nya cuma bisa image bro/sis',
                    'gambar.max' => 'file nya kegedean cuma bs max 2mb :(',
                ]
        
            );
        
        $upload = Upload_file::where('bast_id',$id)->first();
        // dd($upload);
        $upload->bast_id = $request->no_bast;
            
        if($request->hasFile('gambar')){

            File::delete('scan/'.$upload->gambar);
            $file = $request->file('gambar');
            $filename =time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('scan');
            $file->move($destinationPath , $filename);
            $upload->gambar = $filename;
        }
        $upload->save();

        return back();

    }

    public function cetak_excel($id)
    {
        
    }
    
    public function jsonOs(){
        $sistemoperasi = SistemOperasi::all();
        return Datatables::of($sistemoperasi)
        ->addIndexColumn()
        ->addColumn('action', function($sistemoperasi){
            return 
                   '<a href="/sistemoperasi/'. $sistemoperasi->id .'/edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                   '<a onclick="deleteData('. $sistemoperasi->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>' ;
        })
        ->rawColumns(['action'])->make(true);
    }

    public function jsonHostname(){
        $alokasihostname = AlokasiHostname::all();

        return Datatables::of($alokasihostname)
        ->addIndexColumn()
        ->addColumn('action', function($alokasihostname){
            return 
                   '<a href="/alokasihostname/'. $alokasihostname->id .'/edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                   '<a onclick="deleteData('. $alokasihostname->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        })
        ->rawColumns(['action'])->make(true);
    }

    public function jsonBast(){
        $bast = Bast::all();

        return Datatables::of($bast)
        ->addIndexColumn()
        ->addColumn('pdf', function($bast){
            return '<a href="/export/cetak_surat/'.$bast->id.'" target="_blank">
                        <i class="far fa-file-pdf fa-lg"> </i>
                    </a>'.
                    '<a href="#"><i class="far fa-file-excel fa-lg"></i></a>';
        })
        ->addColumn('action', function($bast){
            return 
                   '<a href="/bastdocument/'. $bast->id .'/edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                   '<a href="/uploadfile/'. $bast->id .'" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Upload Scan</a> ' .
                   '<a onclick="deleteData('. $bast->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        })
        ->rawColumns(['action','pdf'])->make(true);
    }

}
