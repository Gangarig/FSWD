<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <!-- exercise01 -->
    <!-- <form action="classwork.php" method="POST">
        First Name <input type="text" name="firstname"/>
        Last Name <input type="text" name="lastname"/>
        <input type="submit" name="submit"/>
    </form> -->
    
    <!-- exercise 06 -->
    <form action="" method="POST">
        First Name<input type="text" name="firstname">
        Last Name<input type="text" name="lastname">
        Age <input type="text" name="age">
    <input type="submit" name="submit">
    </form>
   
    <?php 

    
    //exercise 06
    if(isset($_POST['submit']))
    {
        if(($_POST['firstname']) || ($_POST['lastname']) || ($_POST['age']))
        {
        if(strlen($_POST["firstname"])>5){
            echo "<div style='color: green;'> First name - $_POST[firstname]</div>";
            echo "<div>Last name - $_POST[lastname]</div>";
            echo "<div>age - $_POST[age]</div>";
        } else {
            echo "<div> First name - $_POST[firstname]</div>";
            echo "<div>Last name - $_POST[lastname]</div>";
            echo "<div>age - $_POST[age]</div>";
        }
    }   
    }





    // exercise 01
    // if(isset($_POST['submit']))
    // {   
    //     if($_POST['firstname'] || $_POST['lastname'] )
    //     {
    //     echo "Welcome" .' '.$_POST['firstname'].' '. $_POST['lastname'].'.<br>';
    //     }
    // }



     // exercise 02
     function divide($num1,$num2)
    {
        return $num1/$num2.'<br>';
    }
    echo divide(20,10);

    //exercise 03
    function sum($math,$physic,$english){
        return $math+$physic+$english;
    }
    echo "Sum =".sum(5,4,3).'<br>';
    function average($math,$physic,$english){
        return ($math+$physic+$english)/3;
    }
    echo "Average =".average(5,4,3).'<br>'; 

    //exercise 04
    function area($width,$height)
    {   
        return $width*$height;
    }
    function volume($width,$height,$depth){
        return $width*$height*$depth;
    }
    echo "The area of the box is : " .area(10,20)."<br>";
    echo "The volume of the box is :". volume(10,20,10)."<br>";

    // exercise 05 
    
    function calculate($num){
        global $hours,$minutes;
       if($num>60){
        $hours = $num / 60;
        $hours = (int)$hours;
        $minutes = $num % 60; 
        echo $num . "minutes = $hours hour(s) and $minutes minute(s). <br>";
       }else {
       echo $num . "minute(s). <br>";
       }
    }
    calculate(310);
 
    //Advanced 
    // Converting function Fahrenheit to Celsius
    function convert($fahrenheit){
        $celsius = ($fahrenheit-32)/1.8;
        if($celsius >= 21)
            echo "Hot";
        else if($celsius >= 16)
            echo "Warm";
        else if($celsius >= 11)
            echo "Pleasant";
        else if($celsius >= 6)
            echo "Cold";
        else if($celsius >= 0)
            echo "Very Cold";
    }
    convert(100);

    ?>


    </body>     
</html>