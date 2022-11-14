
<!DOCTYPE html>
<html lang="en">
           <head>
               <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title></title>
   </head>
   <body>
                <p>POST METHOD</p>
       <form action="prework.php" method ="POST">
        Name: <input type="text"  name="name" />
        Age: <input type ="text" name="age" />
           <input  type="submit" name="submit"  />
       </form>
       <?php
       if( isset($_POST['submit']))
       {
                   if( $_POST["name"] || $_POST["age"] )
                   {
                       echo "Welcome ". $_POST[ 'name']. "<br />";
                       echo "You are " . $_POST['age']. " years old.<br>";
           }
       }

       function capFirstString($str)
       {
                   $cap = ucfirst($str);
                   echo  $cap;
       }
       capFirstString("hello world <br>");
       function addFunction($num1, $num2)
       {
                   $sum = $num1 + $num2.'<br>';
                   return  $sum;
       }
       $return_value = addFunction(10, 20);
       echo "Returned value from the function: $return_value";
       function formatted_dump($content)
        {
                echo '<pre>';
                var_dump($content);
                echo '</pre>';
        }
        $name = 'John';
        $surname = 'Doe';
        function fullName(){
                $fullName = $GLOBALS['name'] . ' ' . $GLOBALS['surname'];
                return $fullName;
        }
        formatted_dump($GLOBALS);

        $today = date("D");
        switch ($today) {
                    case "Mon":
                        echo "Today is Monday <br>";
                        break;
                    case "Tue":
                        echo "Today is Tuesday <br>";
                        break;
                    case "Wed":
                        echo "Today is Wednesday <br>";
                        break;
                    case "Thu":
                        echo "Today is Thursday <br>";
                        break;
                    case "Fri":
                        echo "Today is Friday <br>";
                        break;
                    case "Sat":
                        echo "Today is Saturday <br>";
                        break;
                    case "Sun":
                        echo "Today is Sunday <br>";
                        break;
                    default:
                        echo "If you seeing this message, something went wrong <br> :)";}
            $session = "John";
            $user = ($session == "Jon")? $session : "not logged in";
            echo $user.'<br>';
            function confirm(){
                    echo "affirmative";
            }
            function deny(){
                    echo "negative";
            }
            //is 10 bigger than 5?
            (10 > 11) ? confirm() : deny();

            $varOne = 4>3;
            $varTwo = 4<3;

            $varThree = null;
            echo ($varOne ?: "The condition was false or null") ."<br>";
            //returns 1 (true)
            echo ($varTwo ?: "The condition was false or null") ."<br>";
            // returns "The condition was false or null"
            echo ($varThree ?: "The condition was false or null") ."<br>";
            // returns "The condition was false or null"
            // Throws an error because the condition doesn't exist and shows the second result. Uncomment to see:
            //echo ($varFour ?: "The condition was false or null") ."<br>";
            //To check if the condition exists use @ or isset().
            echo (@$varFour ?: "The condition doesn't exist") ."<br>";
            //same as:
            //echo (isset($varFour) ?: "The condition doesn't exist");

            $var1 = 42;
            $var2 = null;
            echo ($var1 ?? "The condition doesn't exist or is null") ."<br>";
            //returns 42 (value of $var1)
            echo ($var2 ?? "The condition doesn't exist or is null") ."<br>";
            // returns "The condition doesn't exist or is null"
            echo ($var3 ?? "The condition doesn't exist or is null") ."<br>";
            // returns "The condition doesn't exist or is null"
               ?>
   </body>
        </html>