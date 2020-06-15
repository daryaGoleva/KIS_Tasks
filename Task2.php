echo "<h2>ЗадачаРаботаНадОшибками</h2>";
$fp = fopen('input.txt', 'r');
$Text = fgets($fp);
FakeRegex($Text);
function FakeRegex($string)
{
    $NewUrl = "http";

    if ($string[4] == "s") {
        $NewUrl = $NewUrl . "s://";
        $StartDomain = 5;
    } else {
        $NewUrl = $NewUrl . "://";
        $StartDomain = 4;
    }

    $domenPosition = "";

    if (strpos($string, "com")) {
        $domenPosition = strpos($string, "com");
        $TLD = "com";
        $CountCharForTLD = 3;
    } else {
        $domenPosition = strpos($string, "ru");
        $TLD = "ru";
        $CountCharForTLD = 2;
    }

    for ($i =  $StartDomain; $i < $domenPosition; $i++) {
        $NewUrl = $NewUrl . $string[$i];
    }

    $NewUrl = $NewUrl . "." . $TLD . "/";

    for ($i = $domenPosition + $CountCharForTLD; $i < strlen($string); $i++) {
        $NewUrl = $NewUrl . $string[$i];
    }

    var_dump($NewUrl);
}
