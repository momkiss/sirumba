<?php

namespace App\Http\Controllers;


use Validator;
use App\Berkas;
use App\Pemohon;
use Auth;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf,docx,xlsx,jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // $request->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);
  
         if ($validator->passes()) {
                $id = $request->id;
                $fileName = str_random(20).'.'.$request->file->extension();  
        
                $request->file->move(public_path('uploads'), $fileName);

                $berkas             = Berkas::find($id);
                $berkas->user_id    = Auth::id();
                $berkas->path       = $fileName;
                $berkas->tersedia   = "Ada";
                $berkas->save();

                // return response()->json(['success'=>'Berhasil']);
                return response()->json([
                    'message'   => 'File berhasil diupload',
                    'uploaded_image' => '<img src="/uploads/'.$fileName.'" class="img-thumbnail" width="300" />',
                    'class_name'  => 'alert-success'
                    ]);
        }

              return response()->json(['error'=>$validator->errors()->all()]);


        // return back()
        //     ->with('success','Upload berhasil.')
        //     ->with('file',$fileName);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berkas = Berkas::where('pemohon_id',$id)->get();
        
        return view('admin.common.berkas')->with('berkas', $berkas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function edit(Berkas $berkas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berkas $berkas)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
  
        $id = $request->id;
        $fileName = str_random(20).'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);

        $berkas             = Berkas::find($id);
        $berkas->user_id    = Auth::user()->id;
        $berkas->path       = $fileName;
        $berkas->tersedia   = "Ada";
        $berkas->save();
   
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berkas $berkas)
    {
        //
    }

    public function upload(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf,docx,xlsx,jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // $request->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);
  
         if ($validator->passes()) {
                $id = $request->id;
                $fileName = str_random(20).'.'.$request->file->extension();  
        
                $request->file->move(public_path('uploads'), $fileName);

                $berkas             = Berkas::find($id);
                $berkas->user_id    = Auth::id();
                $berkas->path       = $fileName;
                $berkas->tersedia   = "Ada";
                $berkas->save();

                // return response()->json(['success'=>'Berhasil']);
                return response()->json([
                    'pesan'   => 'File berhasil diupload',
                    'uploaded_image' => '<img src="/uploads/'.$fileName.'" class="img-thumbnail" width="300" />',
                    'class_name'  => 'alert-success'
                    ]);
        }

              return response()->json(['error'=>$validator->errors()->all()]);


        // return back()
        //     ->with('success','Upload berhasil.')
        //     ->with('file',$fileName);
    }

    public function hapus($id,$pemohon)
    {
        $berkas = Berkas::findOrFail($id);
        $file = $berkas->path;
        File::delete('uploads/'.$file);
        $berkas->path = NULL;
        $berkas->tersedia = "Tidak";
        $berkas->save();

        return response()->json([
            'id'   => $pemohon,
            'pesan' => "Berkas berhasil dihapus"
        ]);
  
    }

     public function detail($id)
    {
        $permohonan = Pemohon::findOrFail($id);
        return View::make('admin.detail.berkas', ['permohonan' => $permohonan]);
    }
}
