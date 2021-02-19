<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\diarios;
use Illuminate\Support\Carbon;
use App\Fuentes;
use App\Palabra;
use App\User;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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

    public function alertas(){
        return view('panel.alertas');
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

    public function periodicos(){
        return view('panel.periodicos');
    }

    public function monitor()
    {
        return view('panel.monitor');
    }

    public function getPeriodicos(Request $request){
        $fuentes = Fuentes::where('tipo', 1)->get();
        return $fuentes;
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

        $rs=[];
        $rs1=[];

        $palabra = $request->palabra;
        if(!is_null($palabra)){
            $arr = explode(' ',$palabra);
            $busqueda = "";
            //WHERE FROM_BASE64(w.`content`) REGEXP '".$palabra."'
            if(count($arr)==1){
                $busqueda = $arr[0];
            }else{
                $p = true;
                for($z=0;$z<count($arr); $z++){
                    if($p){
                        $busqueda = $arr[$z];
                        $p = false;
                    }else{
                        $busqueda = $busqueda.'.*'.$arr[$z];
                    }
                }
            }

            //dd($busqueda);

            $sql = "SELECT w.`titulo`, COUNT(w.id) AS noticias, w.`content` as contenido
                    FROM web AS w
                    WHERE FROM_BASE64(w.`content`) rlike '".$busqueda."'
                    AND DATE(w.`created_at`) BETWEEN '".$mysqlfi."' AND '".$mysqlff."'
                    GROUP BY w.`titulo`;";

            $rs = DB::SELECT($sql);

            $sql1 = "SELECT w.id, w.`titulo`, w.`created_at` AS f, w.`url` AS url, w.`content` AS contenido
                    FROM web AS w
                    WHERE FROM_BASE64(w.`content`) rlike '".$busqueda."'
                    AND DATE(w.`created_at`) BETWEEN '".$mysqlfi."' AND '".$mysqlff."'
                    ORDER BY w.`titulo`";
            $rs1 = DB::SELECT($sql1);

        }else{
            $sql = "SELECT w.`titulo`, COUNT(id) AS noticias
                    FROM web AS w
                    WHERE DATE(w.`created_at`) BETWEEN '".$mysqlfi."' AND '".$mysqlff."'
                    GROUP BY w.`titulo`;";

            $rs = DB::SELECT($sql);
        }

        return response() -> json([
                "code" => 200,
                'rs' => $rs,
                'rs1' => $rs1
                ]);
    }

    public function configuracion(Request $request){
        // $palabras = DB::table('palabra_buscar')->paginate(5);
        // $fuentes = DB::table('fuentes')->paginate(5);
        return view('panel.configuracion');
    }

    public function getFuentes(Request $request){
        $fuentes = DB::table('fuentes')->get();

        return $fuentes;
    }

    public function getPalabras(Request $request){
        $palabras = DB::table('palabra_buscar')->get();

        return $palabras;
    }

    public function getFuentesId(Request $request){
        $id = $request->id;
        $fuente = Fuentes::find($id);

        return $fuente;
    }

    public function getPalabraId(Request $request){
        $id = $request->id;
        $fuente = Palabra::find($id);

        return $fuente;
    }

    public function setUser(Request $request){
        $name       = $request->name;
        $username   = $request->username;
        $email      = $request->email;
        $pass       = $request->pass;
        $estatus    = $request->estatus;

        $objusrn = new User();

        $objusrn->name      = $name;
        $objusrn->username  = $username;
        $objusrn->email     = $email;
        $objusrn->password  = bcrypt($pass);
        $objusrn->estatus   = $estatus;

        $objusrn->save();

        return response()->json([
            'success'   => true
            ], 200);
    }

    public function setFuente(Request $request){
        $idesc      = $request->idesc;
        $url        = $request->url;
        $tipo       = $request->tipo;
        $origen     = $request->origen;
        $estatus    = $request->estatus;

        $obj = new Fuentes();

        $obj->idesc     = $idesc;
        $obj->url       = $url;
        $obj->tipo      = $tipo;
        $obj->origen    = $origen;
        $obj->estatus   = $estatus;

        $obj->save();

        return response()->json([
            'success'   => true
            ], 200);
    }

    public function updFuente(Request $request){
        $id         = $request->id;
        $idesc      = $request->idesc;
        $url        = $request->url;
        $tipo       = $request->tipo;
        $origen     = $request->origen;
        $estatus    = $request->estatus;

        $objfuente = Fuentes::find($id);

        $objfuente->idesc   = $idesc;
        $objfuente->url     = $url;
        $objfuente->tipo    = $tipo;
        $objfuente->origen  = $origen;
        $objfuente->estatus = $estatus;

        $objfuente->save();

        return response()->json([
            'success'   => true
            ], 200);
    }

    public function updPalabra(Request $request){
        $id         = $request->id;
        $palabra      = $request->palabra;

        $objPalabra = Palabra::find($id);

        $objPalabra->palabra   = $palabra;

        $objPalabra->save();

        return response()->json([
            'success'   => true
            ], 200);
    }

    public function updUser(Request $request){
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $pass = $request->pass;
        $estatus = $request->estatus;

        $objUser = User::find($id);

        $objUser->name = $name;
        $objUser->username = $name;
        $objUser->email = $email;
        $objUser->estatus = $estatus;

        if($pass){
            $passN = bcrypt($pass);

            $objUser->password = $passN;
            $objUser->save();
        }else{
            $objUser->save();
        }

        return response()->json([
            'success'   => true
            ], 200);

    }

    public function getContentHtml(Request $request){
        $id = $request->id;

        $sql = "SELECT w.`content` AS contenido
                FROM web AS w
                WHERE w.id=:id;";
        $rs = DB::SELECT($sql, ['id' => $id]);

        return response() -> json([
            "code" => 200,
            'rs' => $rs
            ]);
    }

    public function getContentHtmlP(Request $request){
        $id = $request->id;

        $sql = "SELECT d.`content` AS contenido
                FROM diarios AS d
                WHERE d.id=:id;";
        $rs = DB::SELECT($sql, ['id' => $id]);

        return response() -> json([
            "code" => 200,
            'rs' => $rs
            ]);
    }

    public function getContentHtmlPeriodicos(Request $request){
        $sql = "SELECT * FROM diarios AS d
                WHERE DATE_FORMAT(d.created_at ,'%Y-%m-%d') = CAST(DATE_FORMAT(NOW() ,'%Y-%m-%d') AS DATE)";

        $rs = DB::SELECT($sql);

        return response() -> json([
            "code" => 200,
            'rs' => $rs
            ]);
    }

    public function pdfDiarios(){
        $objPeriodicos = diarios::whereDate('created_at', Carbon::today())->get();
        $data = ['Periodicos' => $objPeriodicos];

        $contxt = stream_context_create([
            'ssl' => [
            'verify_peer' => FALSE,
            'verify_peer_name' => FALSE,
            'allow_self_signed'=> TRUE
            ]
            ]);
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);

        $pdf = PDF::loadView('pdfReporteDiario', $data);

        // $filename = 'diariosHoy '.Carbon::now().'.pdf';
        // $pdf->save($filename);

        //return response()->download(public_path().'/'.$filename);
        return $pdf->stream();
        //return view('pdfReporteDiario', $data);
    }

    public function getMedios(){
        $sqlmedios = "SELECT origen, COUNT(origen) AS num FROM `fuentes` AS f
                        WHERE f.estatus = 1
                        GROUP BY f.origen;";

        $rs = DB::SELECT($sqlmedios);

        return $rs;
    }

    public function getNoticiasMes(){
        $sqlMes = "SELECT *
                    FROM web AS w
                    WHERE w.`created_at` >= DATE_ADD(CURDATE(), INTERVAL -2 DAY)
                    AND w.`titulo` IN (SELECT f.idesc
                    FROM fuentes AS f)
                    ORDER BY w.`created_at` DESC;";

        $rs = DB::select($sqlMes);

        return $rs;
    }


    public function getTipo(){
        $sqlTipo = "SELECT tipo, COUNT(tipo) AS num FROM `fuentes` AS f
                    WHERE f.`estatus` = 1
                    GROUP BY f.`tipo`";

        $rs = DB::select($sqlTipo);

        return $rs;
    }

    public function getUsuarios(){
        $rs = DB::table('users')->get();

        return $rs;
    }

    public function getUserId(Request $request){
        $id = $request->id;
        $objuser = User::where('id',$id)->get();

        return $objuser[0];
    }

    public function graficos(Request $request){
        return view('panel.grafico');
    }

}
