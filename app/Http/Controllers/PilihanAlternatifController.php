<?php

namespace App\Http\Controllers;

use App\Models\PilihanAlternatif;
use App\Models\TempBobotAlternatifKriterita;
use App\Models\BobotAlternatifKriteria;
use App\Models\Alternatif;

use App\Models\Kriteria;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Services\PenilaianService;

class PilihanAlternatifController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::find(Auth::user()->id);
        $tinggi_badan  =$user->tinggi_badan /100;
        $data['n_imt'] = $user->berat_badan_target / ($tinggi_badan*$tinggi_badan);
        if ($user->jenis_kelamin =='L') {
        $data['nkalori'] = round(88.362 + (13.397 *$user->berat_badan_target) + (4.799 *($user->tinggi_badan))-(5.677 * $user->usia),0);
        } else {
        $data['nkalori'] = round(447.593 + (9.247  *$user->berat_badan_target) + (3.098 *($user->tinggi_badan))-(4.33 * $user->usia),0);
        }
        

//         Perhitungan kalori untuk Wanita: 447.593 + (9.247 x berat badan [kg]) + (3.098 x tinggi badan [cm]) – (4.33 x umur)
// Perhitungan kalori untuk Pria: 88.362 + (13.397 x berat badan [kg]) + (4.799 x tinggi badan [cm]) – (5.677 x umur)

$dataalternatif = Alternatif::all();

        // $dataalternatif= Alternatif::whereNotIn('id_alternatif', \DB::table('pilihan_alternatifs')->select('id_alternatif')->get()->toArray())
        // ->get();
        $pilihanmakanan = PilihanAlternatif::where('id_user',Auth::user()->id)->get();
        return view ('backand.hasil.index',compact('data','user','dataalternatif','pilihanmakanan'));
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
        //simpan pilihan
        $datas['id_alternatif'] = $request->id_alternatif;
        $fdataal = Alternatif::find($request->id_alternatif);
        $datas['kode_alternatif'] = $fdataal->kode_alternatif;
        $datas['nama_alternatif'] =  $fdataal->nama_alternatif;
        $datas['id_user'] = Auth::user()->id;

        $pilihankriteria = PilihanAlternatif::create($datas);

        if ($pilihankriteria) {
            # code...
            $kriteria = Kriteria::all();
               foreach ($kriteria as $value) {
                $nbobot = BobotAlternatifKriteria::where('kriteria_id', $value->id)->where('alternatif_id', $request->id_alternatif)->first();
                if ($nbobot) {
                    # code...
                    $datas['kriteria_id'] =$value->id ;
                    $datas['alternatif_id'] = $request->id_alternatif;
                    $datas['nilai'] = $nbobot->nilai ;
                    $datas['id_user'] = Auth::user()->id;               
                    if ( !empty($datas['kriteria_id']) &&  !empty($datas['alternatif_id']) &&  !empty($datas['nilai']) &&  !empty($datas['id_user'])) {
                        # code...
                             $kriteria = TempBobotAlternatifKriterita::create($datas);
                    }else{
                        return redirect()->back()->with('success','Tidak Berhasil menambah data');

                    }

                } else {
                    # code...
                     return redirect()->back()->with('success','tidak berhasil menambah data');
                }
              
              }
        }
        

        return redirect()->back()->with('success','Berhasil menambah data');
        // return redirect()->route('pilih-menu.index')->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PilihanAlternatif  $pilihanAlternatif
     * @return \Illuminate\Http\Response
     */
    

    public function show(PenilaianService $penilaianService, $id)
    {
        $dtkriteria = Kriteria::all();
        $pilihanmakanan = PilihanAlternatif::where('id_user',$id)->get();
        if (!$penilaianService->valid()) {
            return redirect()->back()->with('success','Nilai Tidak valid reset/Input Kembali Daftar Pilih Menu');
        }
        $penilaianService->hitungWp();
        $penilaianService->setNiceView();
        return view ('backand.hasil.show',compact('pilihanmakanan','dtkriteria','penilaianService'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PilihanAlternatif  $pilihanAlternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(PilihanAlternatif $pilihanAlternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PilihanAlternatif  $pilihanAlternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PilihanAlternatif $pilihanAlternatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PilihanAlternatif  $pilihanAlternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(PilihanAlternatif $pilihanAlternatif)
    {
        //
    }

    public function reset (){
        PilihanAlternatif::truncate();
        TempBobotAlternatifKriterita::truncate();
        return redirect('pilih-menu')->with('success','Berhasil Dihapus Data Pilihan');
    }
}
