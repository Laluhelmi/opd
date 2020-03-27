<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Struktural;

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
        $sekda      = Struktural::where('nama_jabatan', 'LIKE','Sekretaris Daerah'."%")->get()->count('id');
        $asisten    = Struktural::where('nama_jabatan', 'LIKE','Asisten'."%")->get()->count('id');
        $staf_ahli  = Struktural::where('nama_jabatan', 'LIKE','Staf Ahli'."%")->get()->count('id');
        $kabag      = Struktural::where('nama_jabatan', 'LIKE','Kepala Bagian'."%")->get()->count('id');
        $kadis      = Struktural::where('nama_jabatan', 'LIKE','Kepala Dinas'."%")->get()->count('id');
        $kaban      = Struktural::where('nama_jabatan', 'LIKE','Kepala Badan'."%")->get()->count('id');
        $kabid      = Struktural::where('nama_jabatan', 'LIKE','Kepala Bidang'."%")->get()->count('id');
        $kasi       = Struktural::where('nama_jabatan', 'LIKE','Kepala Seksi'."%")->get()->count('id');

        return view('home', compact('sekda','asisten','staf_ahli','kabag','kadis','kaban','kabid','kasi'));
    }


}
