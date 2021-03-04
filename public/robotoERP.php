<?php
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
	}else{
		rssconsulta($conn, $value['url'], $value['idesc']);
	}
}
mysqli_close($conn);

/*------------------------------------------------------------------*/
function getPeriodicos($conn){
	$sql = 'SELECT * FROM fuentes WHERE estatus = 1';
	$result = $conn->query($sql);

	return $result;
}
/*------------------------------------------------------------------*/
function getpalabrasclave($conn){
	$sql = 'SELECT * FROM palabra_buscar';
	$result = $conn->query($sql);

	return $result;
    }

/*------------------------------------------------------------------*/
function htmlconsulta($conn, $url, $fuente){
	//$url = 'https://www.am.com.mx/guanajuato/san-miguel-de-allende-t331';
	$data = url_get_contents($url);
	$data = mb_convert_encoding($data, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
	//echo $data;
	echo $fuente." ******************************\n";
	preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $data, $match);

	$regex = '/\b.jpg|.png|.css|.pdf|.gif|.js|tag|youtube|facebook|twitter|instagram|scorecardresearch|xhtml|rss|drupal|buscar\b/i';
	//var_dump($match[0]);

	foreach ($match[0] as $value) {
		$count = preg_match_all($regex, $value);
		if($count == 0){
			//echo('URL ----> '.$value); echo "\xA";
			preg_match_all('#\b(?:https?://)?(?:(?i:[a-z]+\.)+)[^\s,]+\b#', $value, $match1);
			foreach ($match1[0] as $value1) {
				$data = url_get_contents($value1);
                //echo $data;
				//$data = mb_convert_encoding($data, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
				if(preg_match('/\b(eduardo rivera|eduardo rivera pérez)\b/i', $data)){
					echo "Para guardar --->".$fuente."\n";
					almacena($fuente, base64_encode($data), $value1, $conn, 'Web');
				}
			}
			//var_dump($match1[0]);

		}
	}
	//echo 'Title: ', $rss->title;echo "\n";
	//echo 'Description: ', $rss->description; echo "\n";
	//echo 'Link: ', $url; echo "\n";
	/*echo "******************************\n";*/

	/*if(preg_match('/\bsan miguel de allende\b/i', $data)){
		//almacena($fuente, base64_encode($data), $url, $conn);
	}*/
}

function rssconsulta($conn, $url, $fuente){
	//$url = 'https://www.elsoldesanjuandelrio.com.mx/rss.xml';
	$rss = Feed::loadRss($url);

	echo $fuente." ******************************\n";
	echo "\n";echo "\n";echo "\n";echo "\n";echo "\n";
	echo 'Title: ', $rss->title;echo "\n";
	echo 'Description: ', $rss->description; echo "\n";
	echo 'Link: ', $rss->link; echo "\n";
	echo "******************************\n";

	foreach ($rss->item as $item) {
		if(preg_match('/\b(eduardo rivera|eduardo rivera pérez)\b/i', $item->description)) {
			echo 'Title: ', $item->title; echo "\n";
			echo 'Link: ', $item->link; echo "\n";
			echo 'Timestamp: ', $item->timestamp;echo "\n";
			/*echo 'Description ', $item->description; echo "\n";*/
			/*echo 'HTML encoded content: ', $item->{'content:encoded'}; echo "\n";*/
			$data = $item->description;
			almacena($fuente, base64_encode($data), $item->link, $conn, 'RSS');
		}
	}
}

function connect(){
	$servername = "74.208.166.96";
	$port = "5543";
	$username = "asys";
	$password = "1nt3gr4*2019";
	$database = "robotoERP";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database, $port);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully\n";
	return $conn;
}

function almacena($titulo, $content, $url, $conn, $tipo){
	$sql = "SELECT * FROM web as w WHERE w.titulo = '".$titulo."' AND w.url = '".$url."'";

	$result = $conn->query($sql);

	if(mysqli_num_rows($result) == 0){
		$sql = "INSERT INTO web (titulo,content,url,hash, tipo)
				VALUES ('".$titulo."','".$content."','".$url."','".hash('md5',$content)."','".$tipo."')";
		if ($conn->query($sql) === TRUE) {
		    echo "Datos almacenados\n";
		} else {
		    echo 'Error Insertar: '.$conn->error;
		}
	} else {
		echo "Ya registrado\n";
	}
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
