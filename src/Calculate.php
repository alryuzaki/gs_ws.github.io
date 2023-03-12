<?php

class Calculate {
    public $valA;
    public $valB;

    // Function for calculate Person Year & Number of Villagers get killed
    public function witchKill(int $age, int $year):array
    {
        // Initial Variables
        $number = $sum = 0;
        $v1 = $v2 = 1;
        $number = $year - $age;

        // If Condition for 1st & 2nd year
        if ($number < 3)
        {
            return array($number, $number);
        }

        // Sum v1 and v2 for get value for next step
        $sum = $v1 + $v2;
        for ($i = 2; $i < $number; $i++)
        {
            $v3 = $v1 + $v2;
            $sum += $v3;
            $v1 = $v2;
            $v2 = $v3;
        }

        // Return an array number as person year, and sum as people killed
        return array($number, $sum);
    }

    // Function for calculate Average villagers get killed on year
    public function getAverage(int $valA, int $valB):float
    {
        return (float)($valA+$valB)/2;
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Geekseat Witch Saga</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/starter-template/">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    </head>
    <body>
    
    <div class="col-lg-8 mx-auto p-4 py-md-5">
        <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4">The Story: Geekseat Witch Saga: Return of The Coder!</span>
            </a>
        </header>

    <main>
    <form action="Calculate.php" method="post" id="searchMealForm">

    <div class="row">
    <label for="exampleFormControlInput1" class="form-label">Person A</label>
        <div class="col mb-3">
        <input type="number" size="35" placeholder="Age of death" id="vAgeA" name="vAgeA" class="form-control"/>
        </div>
        <div class="col mb-3">
        <input type="number" placeholder="Year of death" id="vYearA" name="vYearA" class="form-control">
        </div>
    </div>

    <div class="row">
    <label for="exampleFormControlInput1" class="form-label">Person B</label>
        <div class="col mb-3">
        
        <input type="number" size="35" placeholder="Age of death" id="vAgeB" name="vAgeB" class="form-control"/>
        </div>
        <div class="col mb-3">
        <input type="number" placeholder="Year of death" id="vYearB" name="vYearB" class="form-control">
        </div>
    </div>
 
    <div class="col mt-3 mb-2">
        <input class="btn btn-primary" type="submit" value="Stop the Witch!" id="stopWitch" name="stopWitch"/>
    </div>
    </form>
    <p class="fs-6 col-md-8">
    <?php
        if(isset($_POST['stopWitch'])) {
            // Define variables
            $vAgeA = $_POST['vAgeA'];
            $vYearA = $_POST['vYearA'];
            $vAgeB = $_POST['vAgeB'];
            $vYearB = $_POST['vYearB'];
            $valA = $valB = 0;
            $result = array();
        
            // Define Calculate Class
            $calc = new Calculate();
        
            // If Condition if number is valid or not
            if((($vYearA - $vAgeA) < 0) || (($vYearB - $vAgeB) < 0) || ($vAgeA < 0) || ($vAgeB < 0))
            {
                echo "Error! Please try a valid number";
                // return -1;
            } else {
                echo "Answer :</br>";

                // Call a function witchkill from Calculate Class
                $resultA = $calc->witchKill($vAgeA, $vYearA);
                $valA = $resultA[1];
        
                echo "Person A born on Year = ".$vYearA." - ".$vAgeA." = ".$resultA[0].", number of people killed on year ".$resultA[0]." is ".$resultA[1];
                echo "</br>";
        
                // Call a function witchkill from Calculate Class
                $resultB = $calc->witchKill($vAgeB, $vYearB);
                $valB = $resultB[1];
        
                echo "Person B born on Year = ".$vYearB." - ".$vAgeB." = ".$resultB[0].", number of people killed on year ".$resultB[0]." is ".$resultB[1];
                echo "</br>";
        
                // Call a function average from Calculate Class

                $average = $calc->getAverage($valA, $valB);
                echo "So the average is ( ".$valA." + ".$valB." )/2 = ".$average;
            }
        }
    ?>
    </p>
    <p class="fs-6 col-md-8">This program include unit testing & published using Github Pages.</p>

    </main>
    <footer class="pt-5 my-5 text-muted border-top">
        Aldi Faisal Muhammad &copy; 2023
    </footer>
</div>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      
  </body>
</html>