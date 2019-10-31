<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sql = "select w.`titulo`, count(id) as noticias from web as w
                where w.`created_at` >= CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') as DATE)
                and w.`created_at` <= NOW()
                group by w.`titulo`;"
                ;

        $ConteoMes = DB::SELECT($sql);

        $sql = "select w.`titulo`, count(id) as noticias 
                from web as w
                group by w.`titulo`;"
                ;
        $ConteoTotal = DB::SELECT($sql);

        $sql = "select date_format(date(min(w.`created_at`)),'%d/%m/%Y') as fi, date_format(date(now()),'%d/%m/%Y') as ff from web as w;";
        $fechas = DB::SELECT($sql);

        return view('panel.principal',['ConteoMes' => $ConteoMes,
                                    'ConteoTotal' => $ConteoTotal,
                                    'fechas' => $fechas ]);
    }

    public function indicadoresGeneral(){
        $rs = DB::SELECT("SELECT w.`titulo`, COUNT(id) AS noticias 
                    FROM web AS w
                    GROUP BY w.`titulo`;");

        return json_encode($rs);
    }

    public function indicadoresGeneralFechas(Request $request){
        $fi = $request->fi;
        $ff = $request->ff;
        $palabra = "";

        $res = CallRaw('rpt_meses(CONCAT("&fi=",?,
                                    "&ff=",?,"&palabra="?
                            ))'
            ,[$fi,$ff,$palabra]);
        
        return $res;
    }

    public function indicadoresPorPalabra(Request $request){
        $palabra = $request->palabra;
        if(!is_null($palabra)){
            $rs = DB::SELECT("SELECT w.`titulo`, COUNT(w.id) AS noticias
                            FROM web AS w
                            WHERE FROM_BASE64(w.`content`) REGEXP '".$palabra."'
                            GROUP BY w.`titulo`;");
        }else{
            $rs = DB::SELECT("SELECT w.`titulo`, COUNT(id) AS noticias 
                    FROM web AS w
                    GROUP BY w.`titulo`;");
        }

        return json_encode($rs);
    }    
}
