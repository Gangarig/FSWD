<!DOCTYPE html>
<html>
   <head>
       <title>Slept Years Pass Data</title>
   </head>
   <body>
       <h1> Slept Years Pass Data</h1>
       <?php
       //Define the Class
       class SleptYearsPassData {
           public function calcSleptYears($hoursSleptperNight, $myAge) {
               $sleptYears = ($myAge *  $hoursSleptperNight)/ 24;
               return $sleptYears;
           }

        }
       //Execute Code Using the Class
       $mySleptYears = new SleptYearsPassData();
       $rtnVal = $mySleptYears->calcSleptYears(7, 30);
       print "You have slept $rtnVal years of your life away!";
       ?>
       <h1>FruitConstructor</h1>

        <?php
        class FruitConstructor
        {
        public $apples;
        public $oranges;
        public $bananas;

        function __construct($apple_arg, $orange_arg, $banana_arg)
        {

            $this->apples   = $apple_arg;
            $this->oranges  = $orange_arg;
            $this->bananas  = $banana_arg;
        }

            public function addFruit ()
        {
            $totalFruit = $this->apples + $this->oranges + $this  ->bananas;
                return $totalFruit;
        }
        }
        $myFruit = new FruitConstructor(3, 7, 5);
        $rtnVal = $myFruit->addFruit();
        print  "You have $rtnVal pieces of fruit <hr>";
        ?>


        <?php
        class Employee {
            public $salary = "3500";
        }

        class Driver  extends Employee {
        public $name = "John";
        public $position = "driver";
        public  function showDetails() {
                return 
            'My name is '  . $this->name .

                ' and my position in the company is ' . $this ->position . ', my monthly salary is ' . $this->salary . ' Euros <hr>' ;
        }
        }
        $driverObj = new Driver();
        $result = $driverObj->showDetails();
        echo $result;
        ?>
        <?php

        // The parent class has its properties and methods
        class Car {

        //A private property or method can be used only by the parent.
        private $model;

        // Public methods and properties can be used
        // by both the parent and the child classes.
        public function setModel($model)
        {
            $this->model = $model;

            }

        public function getModel ()
        {
                return $this->model;
        }
        }


        // The child class can use the code it
        // inherited from the parent class,
        // and it can also have its own code
        class SportsCar extends  Car {

        private $style = 'fast and furious' ;

        public function driveItWithStyle()
        {
            return 'Drive a ' . $this->getModel() . ' <i>'  . $this->style . '</i>';
        }
        }


        //create an instance from the child class
        $sportsCar1 = new SportsCar();

        // Use a method that the child class inherited from the parent class
        $sportsCar1->setModel('Ferrari');

        // Use a method that was added to the child class
        echo $sportsCar1->driveItWithStyle();
        ?>
   </body>
</html>