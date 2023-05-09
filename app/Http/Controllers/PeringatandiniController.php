<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peringatandini;

class PeringatandiniController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function jenisBencana($id) {
        $kodeCuaca = array(
            0 => "",
            1 => "Angin Kencang",
            2 => "Banjir",
            3 => "Cuaca Ekstrim",
            4 => "Gelombang Tinggi",
            5 => "Kekeringan",
            6 => "Longsor",
            7 => "Tsunami"
        );
        return $kodeCuaca[$id];
    }
    
    public function index() {
        $peringatan_dini = Peringatandini::all();

        foreach($peringatan_dini as $peringatan) {
            $peringatan->ancaman = self::jenisBencana($peringatan->id);
        }

        return view('peringatandini.index', compact('peringatan_dini'));
    }

    //Angin Kencanag
    public function anginkencang() {
        $anginkencang = Peringatandini::where('id', 1)->first();
        return view('peringatandini.anginkencang.index', compact('anginkencang'));
    }

    //Banjir
    public function banjir() {
        $banjir = Peringatandini::where('id', 2)->first();
        return view('peringatandini.banjir.index', compact('banjir'));
    }

    //Cuaca Ekstrim
    public function cuacaekstrim() {
        $cuacaesktrim = Peringatandini::where('id', 3)->first();
        return view('peringatandini.cuacaekstrim.index', compact('cuacaekstrim'));
    }

    //Gelombang Tinggi
    public function gelombangtinggi() {
        $gelombangtinggi = Peringatandini::where('id', 4)->first();
        return view('peringatandini.gelombangtinggi.index', compact('gelombangtinggi'));
    }

    //Kekeringan
    public function kekeringan() {
        $kekeringan = Peringatandini::where('id', 5)->first();
        return view('peringatandini.kekeringan.index', compact('kekeringan'));
    }

    //Longsor
    public function longsor() {
        $longsor = Peringatandini::where('id', 6)->first();
        return view('peringatandini.longsor.index', compact('longsor'));
    }

    //Tsunami
    public function tsunami() {
        $tsunami = Peringatandini::where('id', 7)->first();
        return view('peringatandini.tsunami.index', compact('tsunami'));
    }

    public function update(Request $request) {
        $peringatan_dini = Peringatandini::find($request->id);
        $peringatan_dini->update($request->all());
        return redirect()->action('PeringatandiniController@index');
    }    
}
