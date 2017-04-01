<?php
//opengeo%3Atable_00

$layers = array(
  'opengeo%3Atable_00' => '00歷史街區指認範圍_105',
'opengeo%3Atable_01' => '01第一階段府城歷史街區範圍_105',
'opengeo%3Atable_02' => '02舊城範圍',
'opengeo%3Atable_101' => '101區內老屋調查',
'opengeo%3Atable_102' => '102區外老屋調查',
'opengeo%3Atable_103' => '103古井',
'opengeo%3Atable_104' => '104現有珍貴老樹',
'opengeo%3Atable_105' => '105傳統產業調查',
'opengeo%3Atable_106' => '106歷史遺跡_僅供參考',
'opengeo%3Atable_107' => '107廟境',
'opengeo%3Atable_108' => '108日輕便鐵路',
'opengeo%3Atable_201' => '201重要古街道_105',
'opengeo%3Atable_202' => '202次要古街道_105',
'opengeo%3Atable_701' => '701國定古蹟',
'opengeo%3Atable_702n' => '702直轄市定古蹟',
'opengeo%3Atable_704n' => '704歷史建築',
'opengeo%3Atable_802new' => '802日水系',
'opengeo%3Atable_801new' => '801清水系',
'opengeo%3Atable_oldstore' => '臺南老店',
'opengeo%3Atable_residences' => '歷史名人故居',
'opengeo%3Atable_subsidy' => '受補助老屋_102-104',
);

$baseUrl = 'http://hpgis.rchss.sinica.edu.tw:8080/geoserver/ows?service=wfs&version=1.0.0&request=getFeature&outputFormat=application/json&typeName=';
$jsonPath = __DIR__ . '/json';
if(!file_exists($jsonPath)) {
  mkdir($jsonPath, 0777, true);
}
foreach($layers AS $layerKey => $layerName) {
  $targetFile = $jsonPath . '/' . $layerName . '.json';
  if(!file_exists($targetFile)) {
    file_put_contents($targetFile, file_get_contents($baseUrl . $layerKey));
  }
}
