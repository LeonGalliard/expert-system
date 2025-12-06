<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kerusakan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\KategoriSolusi;
use Yajra\DataTables\DataTables;

use function Symfony\Component\String\b;

class KerusakanController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $terbaru = Kerusakan::latest('kode_kerusakan')->limit(1)->get();
        if ($terbaru->first()) {
            $terbaru = $terbaru->first();
            $terbaru = (int) str_replace(['k', 'K'], '', $terbaru->kode_kerusakan);
            $terbaru = 'K'.++$terbaru;
        } else {
            $terbaru = 'K01';
        }
        return view('admin.pages.kerusakan.index', [ 'terbaru'=>$terbaru,
            'kerusakan'=>Kerusakan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.kerusakan.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
        $request->validate([
            'kode_kerusakan' => 'required',
            'nama_kerusakan' => 'required',
        ]);
        
        kerusakan::create([
            'kode_kerusakan' => $request->kode_kerusakan,
            'nama_kerusakan' => $request->nama_kerusakan,
       
        ]);
        return redirect()->route('kerusakan.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//untuk menampilkan data spesifik berdasarkan ID yang diberikan
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//untuk memungkinkan pengguna mengedit data yang ada.
    {
        $kerusakan=Kerusakan::find($id);//"$id" adalah parameter yang mewakili ID dari data yang ingin diedit. 
        return view('admin.pages.kerusakan.edit', [
            'kerusakan'=>$kerusakan,
            'kategoris' => KategoriSolusi::all(),
        ]);
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
        $request->validate([
       
            "kode_kerusakan" => "required",
            "nama_kerusakan" => "required",
        ]);
        $kerusakan = Kerusakan::find($id);
        
        if ($request->kode_kerusakan) {
         
        }
        $kerusakan->update([
            'kode_kerusakan' => $request->kode_kerusakan,
            'nama_kerusakan' => $request->nama_kerusakan,
        ]);

        return redirect()->route('kerusakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kerusakan = Kerusakan::find($id);
        $kerusakan->delete();

        return redirect()->route('kerusakan.index');
    }
    public function uplod($id)
    {
        $kerusakan = Kerusakan::find($id);
        $kerusakan->uplod();

        return redirect()->route('kerusakan.index');
    }

    public function getKerusakan(Request $request)
    {
        if (!$request->ajax()) {
            return '';
       
        }

        $data = Kerusakan::OrderBy('kode_kerusakan', 'ASC')->get();
        
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
           
                $editBtn = '<a href="' . route('kerusakan.edit', $row) . '" class="btn btn-md btn-info mr-2 mb-2 mb-lg-0"><i class="far fa-edit"></i> Edit</a>';
              
                $deleteBtn = '<a href="' . route('kerusakan.destroy', $row) . '/delete" onclick="notificationBeforeDelete(event, this)" class="btn btn-md btn-danger btn-delete"><i class="fas fa-trash"></i> Hapus</a>';
               
                return $editBtn . $deleteBtn;
            })
            ->rawColumns(['kode_kerusakan', 'action'])
            ->make(true);
    }
}
