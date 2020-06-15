<?php
echo "<h2>ЗадачаТудаСюда</h2>";
$fp = fopen("input.txt", "r"); 
$dateTimeFormat = "d.m.Y_H:i:s"; 
if ($fp) 
{
while (!feof($fp))
{
$FlightTime = fgets($fp, 9999);
list($DepartureTime ,$DepartureTimeZone,$ArrivalTime,$ArrivalTimeZone) = explode(";",$FlightTime);

$FirstTimeDateTime = DateTime::createFromFormat($dateTimeFormat, $DepartureTime, new \DateTimeZone("UTC"));
$FirstDepartureTimeZone = -$DepartureTimeZone." hours";
$FirstTimeDateTime->modify($FistDepartureTimeZone);


$SecondTimeDate = DateTime::createFromFormat($dateTimeFormat, $ArrivalTime, new \DateTimeZone("UTC"));
$SecondArrivalTimeZone = -$ArrivalTimeZone." hours";
$SecondTimeDate->modify($SecondArrivalTimeZone);

debug_zval_dump($FirstTimeDateTime);
echo "<h2></h2>";
debug_zval_dump($SecondTimeDate);

echo "<h2>$DepartureTime R,$DepartureTimeZone O,$ArrivalTime M,$ArrivalTimeZone A</h2>";
echo abs($FirstTimeDateTime->getTimestamp() - $SecondTimeDate->getTimestamp());
}
}
else echo "Не удалось открыть файл :(";
fclose($fp);


?>