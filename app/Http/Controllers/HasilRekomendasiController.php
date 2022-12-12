<?php

namespace App\Http\Controllers;

use App\Models\HasilRekomendasi;
use App\Models\BobotAlternatifKriteria;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\User;
use Auth;
class HasilRekomendasiController extends Controller
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
        //hitung 2.2.3.	Indeks Massa Tubuh (IMT) IMT =(Berat (kg))/(Tinggi (m))
        $tinggi_badan  =$user->tinggi_badan /100;
        $data['n_imt'] = $user->berat_badan_target / ($tinggi_badan*$tinggi_badan);
           if ($user->jenis_kelamin =='L') {
        $data['nkalori'] = round(88.362 + (13.397 *$user->berat_badan_target) + (4.799 *($user->tinggi_badan))-(5.677 * $user->usia),0);
        } else {
        $data['nkalori'] = round(447.593 + (9.247  *$user->berat_badan_target) + (3.098 *($user->tinggi_badan))-(4.33 * $user->usia),0);
        }

        $hasilRekomendasi = HasilRekomendasi::with('alternatif')->where('user_id', Auth::user()->id)->get();

        $totalkalori = HasilRekomendasi::with('alternatif')->where('user_id', Auth::user()->id)->sum('jumlah_kalori');
        return view ('backand.hasil.listrekomendasi',compact('data','user','hasilRekomendasi','totalkalori'));
 
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
        $dtalter = Alternatif::where('nama_alternatif', $request->nama_alternatif)->first();
        $nbobot = BobotAlternatifKriteria::where('kriteria_id', 1)->where('alternatif_id', $dtalter->id)->first();
        $datas['user_id'] =Auth::user()->id ;
        $datas['alternatif_id'] = $dtalter->id;
        $datas['jumlah_kalori'] = $nbobot->nilai ;
        $kriteria = HasilRekomendasi::create($datas);
        return redirect('hasil-rekomendasi')->with('success','Berhasil Disimpan Data Pilihan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilRekomendasi  $hasilRekomendasi
     * @return \Illuminate\Http\Response
     */
    public function show(HasilRekomendasi $hasilRekomendasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilRekomendasi  $hasilRekomendasi
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilRekomendasi $hasilRekomendasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilRekomendasi  $hasilRekomendasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilRekomendasi $hasilRekomendasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilRekomendasi  $hasilRekomendasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilRekomendasi $hasilRekomendasi)
    {
        //
        HasilRekomendasi::truncate()->where('user_id', Auth::user()->id);
        return redirect('hasil-rekomendasi')->with('success','Berhasil Dihapus Data hasil-rekomendasi');
    }
}
