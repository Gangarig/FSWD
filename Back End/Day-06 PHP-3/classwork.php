<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
    
        //exercise 01
        for($i = 1 ;$i <= 50 ;$i++){
            echo "$i -- Gangarig Nyamsuren <br>";
        }
        $x = 0 ;
        while ($x < 50){
            $x++;
            echo "$x -- Gangarig Nyamsuren <br>";
        }   

        //exercise 02
        $data = array (1,2,3,4,5,6,7,8,9,10);
        foreach ($data as $value) {
            echo "$value <br>";
        }

        //exercise 03
        $numbers = array();
        for($var = 0; $var<10 ;$var++){
            $number=rand(1,1000);
            global $maximum;
            if($maximum<$number){
                $maximum=$number;
            }
            array_push($numbers,$number);
            echo "$numbers[$var]<br> ";
        }
        echo "Highest number is $maximum <br>";

        // exercise 04
        for ($x=1; $x <= 100;$x++ )
        {
            if(($x%3)==0 and ($x%5)==0 )
            {
                echo "Full-Stack <br>"; 
                continue;
            } 
            else if( ($x%3) == 0 )
            {
                echo "Back-End <br>";
                continue;
            } 
            else if( ($x%5) == 0)
            {
                echo "Front-End <br>";
                continue;
            } 
            echo "$x <br>";
        }
    ?>


    </body>
</html>