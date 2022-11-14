<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="classwork.css">
    </head>
    <body>
    
    <?php
        // Simple
        //exercise 01
        $name = 'Gangarig Nyamsuren';
        echo $name.'<br>';

        //exercise 02
        $age = 26;
        $job_title = 'waiter';
        echo "hi. my name is $name, and i am $age, and i work as a $job_title <br>";

        //exercise 03
        $players = array('Mark','John','Georg','Lisa');
        echo "The third player in the team is $players[2]. <br>";


        //Advanced exercise 
        $animation = array(
            "cartoon" => "Mickey Mouse",
            "anime" => array(
                            "animechar1"=>"Goku",
                            "animechar2"=>"Pokemon"
                            ),
            "game_characters"=> "Pokemon"
        );
        
        echo "
            <h2>animation details</h2>
            <ul><p>Cartoon</p><br>
                <li>$animation[cartoon]</li>
            </ul>
            <ul><p>Anime</p><br>
            <li>{$animation["anime"]["animechar1"]}</li>
            <li>{$animation["anime"]["animechar2"]}</li>
            </ul>
            <ul><p>Game characters</p><br>
            <li>$animation[game_characters]</li>
            </ul>

        ";

        ?>
        
    </body>
</html>