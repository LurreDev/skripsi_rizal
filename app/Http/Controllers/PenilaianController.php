<?php

namespace App\Http\Controllers;

use App\Services\PenilaianService;
use Illuminate\Http\Request;
use App\User;
class PenilaianController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('is_level',2)->get();
        return view('backand.penilaian.index',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PenilaianService $penilaianService,$id)
    {
        //

        //get id data pengguna
        $user = User::find($id);
        $tinggi_badan  =$user->tinggi_badan /100;
        $data['n_imt'] = $user->berat_badan / ($tinggi_badan*$tinggi_badan);
        if ($user->jenis_kelamin =='L') {
            $data['nkalori'] = round(88.362 + (13.397 *$user->berat_badan) + (4.799 *($user->tinggi_badan))-(5.677 * $user->usia),0);
            } else {
            $data['nkalori'] =round( 447.593 + (9.247  *$user->berat_badan) + (3.098 *($user->tinggi_badan))-(4.33 * $user->usia),0);
            }
            
    
// $penilaianService->hitungWp();
        // $penilaianService->setNiceView();
        // $caridataalternatif = Alternatif::where('')
        if (!$penilaianService->valid()) {
            return view('penilaian.tidak_valid');
        }
        $penilaianService->hitungWp();
        $penilaianService->setNiceView();

        return view ('backand.penilaian.show',compact('data','user','penilaianService'));
    }

    /**
     * 
     * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
