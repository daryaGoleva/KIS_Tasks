<?php
echo "<h2>ЗадачаТудаСюда</h2>";
ОПРЕДЕЛИТЬ ( «ARRIVAL» , 1 );
ОПРЕДЕЛИТЬ ( «DEPARTURE» , 0 );
$fp = fopen("input.txt", "r"); 
$output = fopen ( "output.txt", 'w' );
$dateTimeFormat = "d.m.Y_H:i:s"; 

$ flightNumber = fgets ( $fp );
for ( $ i = 0 ; $ i < $ flightNumber ; $ i ++) {
    $ currentFlight = fgets ( $ fp );
    $ unixFlightTime = [];
    $ InfoAboutFlight = explode ( "" , $currentFlight );
   for ( $ j = 0 ; $ j < count ( $infoAboutFlight ); $j = $j + 2 ) {
        $ date = DateTime :: createFromFormat ( $format , $infoAboutFlight [ $ j ]. parseToRightForm ( $infoAboutFlight [ $j + 1 ]),
                                            new  DateTimeZone ( 'UTC' ));
        array_push ( $unixFlightTime , $date -> format ( "U" ));
    }
    fwrite ( $ output , $ unixFlightTime [ ARRIVAL ] - $ unixFlightTime [ DEPARTURE ]. "\ n" );
}

fclose ( $ fp );
fclose ( $ output );

function  parseToRightForm ( $timezone ) {
    if ( $timezone > = 0 ) {
        return  "+" . ( int ) $timezone ;
    }
    else
        return ( int ) $timezone ;
}

?>