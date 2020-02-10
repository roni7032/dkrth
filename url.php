<?php include_once('define.php'); ?>
<?php
function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}
function base_url(){
	$url=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'].
						str_replace(basename($_SERVER['SCRIPT_NAME']),"",
						$_SERVER['SCRIPT_NAME']);
						
	$path_arr = explode("\\", ABSPATH);
	$last_path_arr=end($path_arr);
	$basename=str_replace("/","",$last_path_arr);
	
	$url_arr_1 = explode("/", $_SERVER['REQUEST_URI']);
	
	for($i=0;$i<count($url_arr_1);$i++){
		$url_arr_2[]=$url_arr_1[$i];
		
		if($url_arr_1[$i]==$basename) $i=count($url_arr_1)+10;
	}
	$url_arr=implode("/",$url_arr_2);
	
	$url=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'].$url_arr;
	return $url;
}
function abs_url() {
    $path = $_SERVER['SERVER_NAME'] . '/' . $_SERVER['REQUEST_URI'];    

    $path_arr = explode("/", $path);

    $new_arr = array();

    for($i = 0; $i < count($path_arr); ++$i) {

        if(trim($path_arr[$i]) != "") {

            $new_arr[] = $path_arr[$i];

        }
    }

    $element = array_pop ( $new_arr);

    $abs_path = implode("/", $new_arr);

    if(substr($abs_path, 0, 4) != "http") {

        $abs_path = "http://" . $abs_path;
    } 

    return $abs_path;
}

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}