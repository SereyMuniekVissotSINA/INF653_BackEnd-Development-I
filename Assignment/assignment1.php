<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
</head>
<body>
    <!-- Challenge 1: Create a PHP script that takes two numbers and performs addition, 
     subtraction, multiplication, division, and modulus operation. -->
     <?php 
        $num1 = 10;
        $num2 = 5;

        $addition = $num1 + $num2;
        $subtraction = $num1 - $num2;
        $multiplication = $num1 * $num2;
        $division = $num1 / $num2;
        $modulus = $num1 % $num2;

        echo "<h2>Arithmetic Operations</h2>";

        echo " Challenge 1: Create a PHP script that takes two numbers and performs addition, 
            subtraction, multiplication, division, and modulus operation.<br><br>";

        echo "Addition: " . $addition . "<br>";
        echo "Subtraction: " . $subtraction . "<br>";
        echo "Multiplication: " . $multiplication . "<br>";
        echo "Division: " . $division . "<br>";
        echo "Modulus: " . $modulus . "<br><br>";
     ?>

     <!--challenge 2: Write a PHP script that takes an integer and determines if it even or odd using 
     the modulus % operator-->

     <?php 

        echo "challenge 2: Write a PHP script that takes an integer and determines if it even or odd using 
            the modulus % operator <br><br>";
        $num = 7;

        if ($num % 2 == 0){
            echo $num . " is an even number.<br>";
        } else {
            echo $num . " is an odd number.<br>";
        }
     ?>

     <!--- Challenge 3: Write a PHP script that starts with a number and increments and decrements it using ++ 
     and -- operator --->

     <?php 

        echo "Challenge 3: Write a PHP script that starts with a number and increments and decrements it using ++ 
            and -- operator <br><br>";
        $num = 10;

        echo "Staring number is " . $num . "<br>";
        echo "After increment " . ++$num . "<br>";
        echo "After decrement " . --$num . "<br>";
     ?>

    <!-- Challenge 4: Write a PHP script that takes a student's marks and assigns a grade using the following conditions:
     90+ -> A
     80 -89 -> B
     70 - 79 -> C
     60 - 69 -> D
     Below 60 -> F -->

     <?php 
        echo "Challenge 4: Write a PHP script that takes a student's marks and assigns a grade using the following conditions:
        90+ -> A
        80 -89 -> B
        70 - 79 -> C
        60 - 69 -> D
        Below 60 -> F <br>";
        $num = 85;

        if ($num >= 90) {
            echo "You got an A! <br>";
        } else if ($num >= 80 && $num < 90) {
            echo "You got a B! <br>";
        } else if ($num >= 70 && $num < 80) {
            echo "You got a C! <br>";
        } else if ($num >= 60 && $num < 70) {
            echo "You got a D! <br>";
        } else {
            echo "You got an F! <br>";
        }
    ?>
    <!-- Challenge 5:  -->

    <?php 
        echo "Write a PHP script to check if a given year is a leap year or not";
        $year = 2024;

        if (($year % 400 == 0) || ($year % 4 == 0 && $year % 100 != 0)) {
            echo "$year is a Leap Year.";
        } else {
            echo "$year is NOT a Leap Year.";
        }
    ?>
</html>