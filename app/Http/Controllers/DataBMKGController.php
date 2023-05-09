<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataBMKG;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DataBMKGController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $day_one = DB::table('databmkg')->whereBetween('id', [1, 4])->get();
        $day_two = DB::table('databmkg')->whereBetween('id', [5, 8])->get();
        $day_three = DB::table('databmkg')->whereBetween('id', [9, 12])->get();

        //dd(date('Y-m-d H:i:s', strtotime($first_date+1)));
        //dd($apibmkg);
        return view('prakiraancuaca', compact('day_one', 'day_two', 'day_three'));
    }

    public function getDataBMKG() {
        $kodeCuaca = array(
            0 => "Cerah",
            1 => "Cerah Berawan",
            2 => "Cerah Berawan",
            3 => "Berawan",
            4 => "Berawan Tebal",
            5 => "Udara Kabur",
            100 => "Cerah",
            101 => "Cerah Berawan",
            102 => "Cerah Berawan",
            103 => "Berawan",
            104 => "Berawan Tebal",
            10 => "Asap",
            45 => "Berkabut",
            60 => "Hujan Ringan",
            61 => "Hujan Sedang",
            63 => "Hujan Lebat",
            80 => "Hujan Lokal",
            95 => "Hujan Petir",
            97 => "Hujan Petir"
        );

        $forecast = "forecast";
        $area = "area";
        $url = "https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-NusaTenggaraBarat.xml";
        $xmlString = file_get_contents($url);
        $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlObject);
        $json = str_replace('"@attributes"','"attributes"',$json);
        $array = json_decode($json, true); 

        DB::table('databmkg')->truncate();
        
        $params = $array[$forecast][$area][2]['parameter'];
        if(is_array($params) && count($params) > 0) {
            foreach ($params as $param) {
                //Tambah data cuaca ke database
                if($param['attributes']['id'] == 'weather') {
                    $times = $param['timerange'];
                    foreach($times as $time) {
                        $jam = $time['attributes']['datetime'];
                        $y = substr($jam,0,4);
                        $m = substr($jam,4,2);
                        $d = substr($jam,6,2);
                        $h = substr($jam,8,2);
                        $i = substr($jam,10,2);
                        $value = (is_array($time['value'])) ? $time['value'][0]:$time['value'];

                        if(DB::table('databmkg')->where('date_time', "$y-$m-$d $h:$i:00")->doesntExist()) {
                            DB::table('databmkg')->insert(
                                [
                                    'date_time' => "$y-$m-$d $h:$i:00",
                                    'weather' => $kodeCuaca[$value],
                                    'humidity' => 0,
                                    'temperature' => 0,
                                    'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
                                    'updated_at' => \Carbon\Carbon::now()
                                ]
                            );
                        } else {
                            DB::table('databmkg')
                            ->where('date_time', "$y-$m-$d $h:$i:00")
                            ->update(['weather' => $kodeCuaca[$value]]);
                        }
                    }
                } 
                //Tambah data kelembaban
                else if($param['attributes']['id'] == 'hu') {
                    $times = $param['timerange'];
                    foreach($times as $time) {
                        $jam = $time['attributes']['datetime'];
                        $y = substr($jam,0,4);
                        $m = substr($jam,4,2);
                        $d = substr($jam,6,2);
                        $h = substr($jam,8,2);
                        $i = substr($jam,10,2);
                        $value = (is_array($time['value'])) ? $time['value'][0]:$time['value'];

                        if(DB::table('databmkg')->where('date_time', "$y-$m-$d $h:$i:00")->doesntExist()) {
                            DB::table('databmkg')->insert(
                                [
                                    'date_time' => "$y-$m-$d $h:$i:00",
                                    'weather' => "0",
                                    'humidity' => $value,
                                    'temperature' => 0,
                                    'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
                                    'updated_at' => \Carbon\Carbon::now()
                                ]
                            );
                        } else {
                            DB::table('databmkg')
                            ->where('date_time', "$y-$m-$d $h:$i:00")
                            ->update(['humidity' => $value]);
                        }
                    }
                }
                //Tambah data temperatur
                else if($param['attributes']['id'] == 't') {
                    $times = $param['timerange'];
                    foreach($times as $time) {
                        $jam = $time['attributes']['datetime'];
                        $y = substr($jam,0,4);
                        $m = substr($jam,4,2);
                        $d = substr($jam,6,2);
                        $h = substr($jam,8,2);
                        $i = substr($jam,10,2);
                        $value = (is_array($time['value'])) ? $time['value'][0]:$time['value'];

                        if(DB::table('databmkg')->where('date_time', "$y-$m-$d $h:$i:00")->doesntExist()) {
                            DB::table('databmkg')->insert(
                                [
                                    'date_time' => "$y-$m-$d $h:$i:00",
                                    'weather' => "0",
                                    'humidity' => 0,
                                    'temperature' => $value,
                                    'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
                                    'updated_at' => \Carbon\Carbon::now()
                                ]
                            );
                        } else {
                            DB::table('databmkg')
                            ->where('date_time', "$y-$m-$d $h:$i:00")
                            ->update(['temperature' => $value]);
                        }
                    }
                }
            }
        }
        return redirect('prakiraancuaca');
    }
}
