<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Pages::where('subject','LIKE','%' .$request->search. '%')->paginate(10);
        }else{
            $data = Pages::paginate(5);
            Session::put('halaman_url',request()->fullUrl());
        }

        return view('v_pages/datapages',compact('data'));
    }

    public function tambah(){
        return view('v_pages/tambahpages');
    }

    public function insert(Request $request){
        Pages::create($request->all());
        return redirect()->route("pages")->with('success','data berhasil disimpan');
    }

    public function tampilkan($id){
        $data = Pages::find($id);
        return view('v_pages/tampilkanpages',compact('data'));
    }

    // public function update(Request $request,$id){
    //     $data = Pages::find($id);
    //     $data->update($request->all());
    //     if(session('halaman_url')){
    //         return redirect(session('halaman_url'))->with('success','data berhasil diupdate');
    //     }
    //     return redirect()->route("pages")->with('success','data berhasil diupdate');
    // }

    public function update(Request $request,$id){
        $data = Pages::find($id);
        $data->update($request->all());
        return redirect()->route("tampilkanpages",$id)->with('success','data berhasil diupdate');
    }

    public function delete($id){
        $data = Pages::find($id);
        $data->delete();
        return redirect()->route("pages")->with('success','data berhasil dihapus');
    }

    public function exportpdf(){
        $data = Pages::all();
        view()->share('data',$data);
        $pdf = PDF::loadview('v_pages/datapages-pdf');
        return $pdf->download('data.pdf');
    }
}
