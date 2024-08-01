<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Urun;
use App\Models\Icecek;
use App\Models\Atistirmalik;
use App\Models\Sos;
use App\Models\Tatli;

class PageHomeController extends Controller
{
    public function anasayfa(){
        $pizzas = Pizza::where('status', '1')->get();
        $uruns = Urun::where('status', '1')->get();
        $iceceks = Icecek::where('status', '1')->get();
        $atistirmaliks = Atistirmalik::where('status', '1')->get();
        $soss = Sos::where('status', '1')->get();
        $tatlis = Tatli::where('status', '1')->get();
        return view('front-end.pages.index',compact('pizzas' , 'uruns' , 'iceceks' , 'atistirmaliks' , 'soss' , 'tatlis'));
    }

}
