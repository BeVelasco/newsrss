<?php

require_once 'classes/Url.php';

header('Content-Type: text/html; charset=utf-8');

if (!ini_get('date.timezone')) {
	date_default_timezone_set('America/Mexico_City');
}



require_once 'Feed.php';

$conn = connect();
$fuentes = getPeriodicos($conn);

foreach ($fuentes as $value) {
	if($value['tipo'] == 1){
		htmlconsulta($conn, $value['url'], $value['idesc']);
	}
}
mysqli_close($conn);

/*------------------------------------------------------------------*/
function getPeriodicos($conn){
	$sql = 'SELECT * FROM fuentes WHERE estatus = 1 AND origen <> "F";';
	$result = $conn->query($sql);

	return $result;
}

function connect(){
	$servername = "74.208.166.96";
	$port = "5543";
	$username = "asys";
	$password = "1nt3gr4*2019";
	$database = "robotoArmenta";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database, $port);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully\n";
	return $conn;
}

function htmlconsulta($conn, $url, $fuente){
    //$link = "https://mrbisne.com/portal";

    $name = parse_url($url)['host'];
    $resp = file_get_contents("https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=$url&screenshot=true&key=AIzaSyAMnqKBY0YG8FIvTakSa7J43_dyOIsBQTA");
    $resp = json_decode($resp, true);
    $data = str_replace('_','/',$resp['lighthouseResult']['audits']['final-screenshot']['details']['data']);
    $data = str_replace('-','+',$data);

    // $img = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));

	echo $fuente." ******************************\n";
    almacena($fuente, $data, $url, $conn, 'Web');
    sleep(90);
}

function almacena($titulo, $content, $url, $conn, $tipo){
		$sql = "INSERT INTO diarios (titulo,content,url,hash, tipo)
				VALUES ('".$titulo."','".$content."','".$url."','".hash('md5',$content)."','".$tipo."')";
		if ($conn->query($sql) === TRUE) {
		    echo "Datos almacenados\n";
		} else {
		    echo 'Error Insertar: '.$conn->error;
		}

    echo "Registro Exitoso\n";
}

function url_get_contents($url, $useragent='cURL', $headers=false, $follow_redirects=true, $debug=false) {

    // initialise the CURL library
    $ch = curl_init();

    // specify the URL to be retrieved
    curl_setopt($ch, CURLOPT_URL,$url);

    // we want to get the contents of the URL and store it in a variable
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

    // specify the useragent: this is a required courtesy to site owners
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);

    // ignore SSL errors
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // return headers as requested
    if ($headers==true){
        curl_setopt($ch, CURLOPT_HEADER,1);
    }

    // only return headers
    if ($headers=='headers only') {
        curl_setopt($ch, CURLOPT_NOBODY ,1);
    }

    // follow redirects - note this is disabled by default in most PHP installs from 4.4.4 up
    if ($follow_redirects==true) {
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    }

    // if debugging, return an array with CURL's debug info and the URL contents
    if ($debug==true) {
        $result['contents']=curl_exec($ch);
        $result['info']=curl_getinfo($ch);
    }

    // otherwise just return the contents as a variable
    else $result=curl_exec($ch);

    // free resources
    curl_close($ch);

    // send back the data
    return $result;
}


?>
