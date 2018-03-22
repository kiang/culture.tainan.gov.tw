<?php
/*
geo server doc - http://docs.geoserver.org/latest/en/user/services/wfs/index.html
layer list - http://hpgis.rchss.sinica.edu.tw:8080/geoserver/ows?service=wfs&version=1.0.0&request=GetCapabilities
*/

$jsonPath = __DIR__ . '/json';
if(!file_exists($jsonPath)) {
  mkdir($jsonPath, 0777, true);
}

$meta = json_decode(file_get_contents('http://hpgis.rchss.sinica.edu.tw:8080/geoexplorer/maps/1'), true);
$baseUrl = 'http://hpgis.rchss.sinica.edu.tw:8080/geoserver/ows?service=wfs&version=1.0.0&request=getFeature&outputFormat=application/json&typeName=';
$pairs = array(
  '(' => '_',
  ')' => '_',
);
foreach($meta['map']['layers'] AS $layer) {
  if($layer['source'] === 'local') {
    $targetFile = $jsonPath . '/' . strtr($layer['title'], $pairs) . '.json';
    file_put_contents($targetFile, file_get_contents($baseUrl . urlencode($layer['name'])));
  }
}
