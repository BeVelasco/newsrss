<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

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

    public function semaforizacion(){
        return view('panel.semaforizacion');
    }

    public function index()
    {
        $sql = "select concat('(',f.id,') ',w.`titulo`) as titulo, count(w.id) as noticias from web as w
                LEFT JOIN fuentes AS f ON f.`idesc` = w.titulo
                where w.`created_at` >= CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') as DATE)
                and w.`created_at` <= NOW()
                group by w.`titulo`;"
                ;

        $ConteoMes = DB::SELECT($sql);

        $sql = "select count(*)
                from fuentes as f
                where f.tipo = 0 ";

        $rss_fuentes = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 0
                and f.origen = 'L'";

        $rss_locales = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 0
                and f.origen = 'N'";

        $rss_nacionales = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 1 ";

        $html_fuentes = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 1
                and f.origen = 'L'";

        $html_locales = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 1
                and f.origen = 'N'";

        $html_nacionales = DB::SELECT($sql);

        $sql = "select concat('(',f.id,') ',w.`titulo`) as titulo, count(w.id) as noticias
                from web as w
                left join fuentes AS f ON f.`idesc` = w.titulo
                where f.origen = 'N'
                group by w.`titulo`
                order by f.id;"
                ;
        $ConteoTotal = DB::SELECT($sql);

        $sql = "select concat('(',f.id,') ',w.`titulo`) as titulo, count(w.id) as noticias
                from web as w
                left join fuentes AS f ON f.`idesc` = w.titulo
                where f.origen = 'I'
                group by w.`titulo`
                order by f.id;"
                ;
        $ConteoTotalInternacional = DB::SELECT($sql);

        $sql = "SELECT w.`titulo`, COUNT(w.id) AS noticias
                FROM web AS w
                LEFT JOIN `fuentes` AS f ON f.idesc = w.titulo
                WHERE f.`origen` = 'L'
                GROUP BY w.`titulo`;"
                ;
        $ConteoTotalLocales = DB::SELECT($sql);

        $sql = "SELECT concat(f.id,' ',w.`titulo`) as titulo, COUNT(w.id) AS noticias
                FROM web AS w
                LEFT JOIN `fuentes` AS f ON f.idesc = w.titulo
                WHERE f.`origen` = 'N'
                GROUP BY w.`titulo`;"
                ;
        $ConteoTotalNacionales = DB::SELECT($sql);

        $sql = "select count(*) as num
                from web as w
                left join fuentes as f on f.idesc = w.titulo
                where f.tipo = 1;"; //html
        $num_html = DB::SELECT($sql);

        $sql = "select count(*) as num
                from web as w
                left join fuentes as f on f.idesc = w.titulo
                where f.tipo = 0;"; //rss
        $num_rss = DB::SELECT($sql);

        $sql = "SELECT COUNT(*) AS num
                FROM web AS w
                LEFT JOIN fuentes AS f ON f.idesc = w.titulo
                WHERE f.`origen` = 'T';"; //Twitter
        $twitter = DB::SELECT($sql);

        $sql = "SELECT COUNT(*) AS num
                FROM web AS w
                LEFT JOIN fuentes AS f ON f.idesc = w.titulo
                WHERE f.`origen` = 'F';"; //Facebook
        $facebook = DB::SELECT($sql);

        $sql = "SELECT COUNT(*) AS num
                FROM fuentes AS f
                WHERE f.`origen` = 'F';"; //Facebook
        $facebook_grupos = DB::SELECT($sql);

        $sql = "select date_format(date(min(w.`created_at`)),'%d/%m/%Y') as fi, date_format(date(now()),'%d/%m/%Y') as ff from web as w;";
        $fechas = DB::SELECT($sql);

        return view('panel.principal',['ConteoMes'          => $ConteoMes,
                                    'ConteoTotal'           => $ConteoTotal,
                                    'ConteoTotalNacionales' => $ConteoTotalNacionales,
                                    'ConteoTotalLocales'    => $ConteoTotalLocales,
                                    'fechas'                => $fechas,
                                    'num_rss'               => $num_rss,
                                    'rss_locales'           => $rss_locales,
                                    'rss_nacionales'        => $rss_nacionales,
                                    'num_html'              => $num_html,
                                    'html_locales'          => $html_locales,
                                    'html_nacionales'       => $html_nacionales,
                                    'twitter'               => $twitter,
                                    'facebook'              => $facebook,
                                    'facebook_grupos'       => $facebook_grupos,
                                    'ConteoTotalInternacional' => $ConteoTotalInternacional,
                                    ]);
    }

    public function estadisticas()
    {
        $sql = "select w.`titulo`, count(id) as noticias from web as w
                where w.`created_at` >= CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') as DATE)
                and w.`created_at` <= NOW()
                group by w.`titulo`;"
                ;

        $ConteoMes = DB::SELECT($sql);

        $sql = "select count(*)
                from fuentes as f
                where f.tipo = 0 ";

        $rss_fuentes = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 0
                and f.origen = 'L'";

        $rss_locales = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 0
                and f.origen = 'N'";

        $rss_nacionales = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 1 ";

        $html_fuentes = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 1
                and f.origen = 'L'";

        $html_locales = DB::SELECT($sql);

        $sql = "select count(*) as num
                from fuentes as f
                where f.tipo = 1
                and f.origen = 'N'";

        $html_nacionales = DB::SELECT($sql);

        $sql = "select w.`titulo`, count(id) as noticias
                from web as w
                group by w.`titulo`;"
                ;
        $ConteoTotal = DB::SELECT($sql);

        $sql = "SELECT concat('(',f.id,') ',w.`titulo`) as titulo, COUNT(w.id) AS noticias
                FROM web AS w
                LEFT JOIN `fuentes` AS f ON f.idesc = w.titulo
                WHERE f.`origen` = 'L'
                GROUP BY w.`titulo`;"
                ;
        $ConteoTotalLocales = DB::SELECT($sql);

        $sql = "SELECT concat('(',f.id,') ',w.`titulo`) as titulo, COUNT(w.id) AS noticias
                FROM web AS w
                LEFT JOIN `fuentes` AS f ON f.idesc = w.titulo
                WHERE f.`origen` = 'N'
                GROUP BY w.`titulo`;"
                ;
        $ConteoTotalNacionales = DB::SELECT($sql);

        $sql = "select count(*) as num
                from web as w
                left join fuentes as f on f.idesc = w.titulo
                where f.tipo = 1;"; //html
        $num_html = DB::SELECT($sql);

        $sql = "select count(*) as num
                from web as w
                left join fuentes as f on f.idesc = w.titulo
                where f.tipo = 0;"; //rss
        $num_rss = DB::SELECT($sql);

        $sql = "SELECT COUNT(*) AS num
                FROM web AS w
                LEFT JOIN fuentes AS f ON f.idesc = w.titulo
                WHERE f.`origen` = 'T';"; //Twitter
        $twitter = DB::SELECT($sql);

        $sql = "SELECT COUNT(*) AS num
                FROM web AS w
                LEFT JOIN fuentes AS f ON f.idesc = w.titulo
                WHERE f.`origen` = 'F';"; //Facebook
        $facebook = DB::SELECT($sql);

        $sql = "SELECT COUNT(*) AS num
                FROM fuentes AS f
                WHERE f.`origen` = 'F';"; //Facebook
        $facebook_grupos = DB::SELECT($sql);

        $sql = "select date_format(date(min(w.`created_at`)),'%d/%m/%Y') as fi, date_format(date(now()),'%d/%m/%Y') as ff from web as w;";
        $fechas = DB::SELECT($sql);

        return view('panel.estadisticas',['ConteoMes'          => $ConteoMes,
                                    'ConteoTotal'           => $ConteoTotal,
                                    'ConteoTotalNacionales' => $ConteoTotalNacionales,
                                    'ConteoTotalLocales'    => $ConteoTotalLocales,
                                    'fechas'                => $fechas,
                                    'num_rss'               => $num_rss,
                                    'rss_locales'           => $rss_locales,
                                    'rss_nacionales'        => $rss_nacionales,
                                    'num_html'              => $num_html,
                                    'html_locales'          => $html_locales,
                                    'html_nacionales'       => $html_nacionales,
                                    'twitter'               => $twitter,
                                    'facebook'              => $facebook,
                                    'facebook_grupos'       => $facebook_grupos,
                                    ]);
    }

    public function monitor()
    {
        return view('panel.monitor');
    }

    public function indicadoresMedios(){
        $rs = DB::SELECT("SELECT CASE WHEN f.origen = 'F' THEN 'GRUPOS'
                            WHEN f.origen = 'L' THEN 'LOCALES'
                            ELSE 'NACIONALES'
                            END
                            AS titulo ,COUNT(*) AS noticias
                            FROM fuentes AS f
                            WHERE f.origen <> 'T'
                            AND f.tipo = 1
                            GROUP BY f.`origen`
                            ORDER BY f.origen DESC;");

        return json_encode($rs);
    }

    public function indicadoresLocales(){
        $rs = DB::SELECT("SELECT f.id AS titulo, COUNT(w.id) AS noticias
                            FROM web AS w
                            LEFT JOIN fuentes AS f ON w.`titulo` = f.`idesc`
                            WHERE f.`origen` = 'L'
                            GROUP BY w.`titulo`;");

        return json_encode($rs);
    }

    public function indicadoresNacionales(){
        $rs = DB::SELECT("SELECT f.id AS titulo, COUNT(w.id) AS noticias
                            FROM web AS w
                            LEFT JOIN fuentes AS f ON w.`titulo` = f.`idesc`
                            WHERE f.`origen` = 'N'
                            GROUP BY w.`titulo`;");

        return json_encode($rs);
    }

    public function indicadoresGeneral(){
        $rs = DB::SELECT("SELECT f.id AS titulo, COUNT(w.id) AS noticias
                    FROM web AS w
                    LEFT JOIN fuentes AS f ON f.`idesc` = w.titulo
                    GROUP BY w.`titulo`;");

        return json_encode($rs);
    }

    public function indicadoresGeneralFechas(Request $request){
        $fi = $request->fi;
        $ff = $request->ff;
        $palabra = "";

        // $res = CallRaw('rpt_meses(CONCAT("&fi=",?,
        //                             "&ff=",?,"&palabra="?
        //                     ))'
        //     ,[$fi,$ff,$palabra]);

        $sql = "select date_format(date(min(w.`created_at`)),'%d/%m/%Y') as fi, date_format(date(now()),'%d/%m/%Y') as ff from web as w;";
        $res = DB::SELECT($sql);

        return $res;
    }

    public function indicadoresPorPalabra(Request $request){
        $fi = $request->fi;
        $ff = $request->ff;

        $msqlfi = explode("/", $fi);
        $msqlff = explode("/", $ff);

        $mysqlfi = $msqlfi[2].'-'.$msqlfi[1].'-'.$msqlfi[0];
        $mysqlff = $msqlff[2].'-'.$msqlff[1].'-'.$msqlff[0];

        $palabra = $request->palabra;
        if(!is_null($palabra)){
            $sql = "SELECT w.`titulo`, COUNT(w.id) AS noticias
                    FROM web AS w
                    WHERE FROM_BASE64(w.`content`) REGEXP '".$palabra."'
                    AND DATE(w.`created_at`) BETWEEN '".$mysqlfi."' AND '".$mysqlff."'
                    GROUP BY w.`titulo`;";

            $rs = DB::SELECT($sql);
        }else{
            $sql = "SELECT w.`titulo`, COUNT(id) AS noticias
                    FROM web AS w
                    WHERE DATE(w.`created_at`) BETWEEN '".$mysqlfi."' AND '".$mysqlff."'
                    GROUP BY w.`titulo`;";

            $rs = DB::SELECT($sql);
        }

        return json_encode($rs);
    }

    public function configuracion(Request $request){
        $palabras = DB::table('palabra_buscar')->paginate(5);
        $fuentes = DB::table('fuentes')->paginate(5);
        return view('panel.configuracion',['fuentes' => $fuentes,
                                            'palabras' => $palabras ]);
    }
}
