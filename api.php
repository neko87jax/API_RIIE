<?php
/**
*Created by raflidev
*riie ongoing update
**/
function grabbing($url){
    $data = curl_init();
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_URL, $url);
    $output = curl_exec($data);
    curl_close($data);
    return $output;
}
$ambilhtml = grabbing('https://www.riie.net/');
$eJudul = explode('<div class="thumb">',$ambilhtml);


for($x=1;$x<25;$x++){
//mengambil judul
$getJudul = explode('title="',$eJudul[$x]);

$closeJudul = explode('"></a>',$getJudul[1]);


// mengambil link untuk di grabbing
$getLink = explode('<a href="',$getJudul[1]);
$closeLink = explode('"',$getLink[1]);

// mengambil gambar 
$getImage = explode('src="',$getJudul[2]);
$closeImage = explode('" class="',$getImage[1]);

$data = [
    "judul" => "$closeJudul[0]",
    "image" => "$closeImage[0]",
    "link" => "$closeLink[0]",
];

$array[] = $data;
}
$api = json_encode($array);
$dataApi = json_decode($api, true);


?>
