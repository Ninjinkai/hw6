<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- About the page -->
    <meta name="description" content="COP3813 homework 6 php conversion app">
    <meta name="author" content="Nick Petty">
    <link rel="icon" href="icons/favicon.ico">
    <title>Fuel Economy</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/jumbotron.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Navigation bar. -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://lamp.cse.fau.edu/~npetty2014/index.html">Nick Petty's Web Portfolio</a>
            </div>
        </div>
    </nav>

    <!-- Jumbotron for the page description. -->
    <div class="jumbotron">
        <div class="container">
            <h1>Fuel Economy Converter</h1>
            <p>Miles per gallon?  Rods to the hogshead?</p>
        </div>
    </div>

    <!-- Main functional app and information. -->
    <div class="container">
        <div class="col-md-6">
            <p>
                Fuel economy refers to the ratio of distance travelled per amount of fuel consumed by a vehicle,
                measured in miles per gallon (MPG) in the USA.  This app converts MPG into the archaic rods per
                hogshead (RPH) unit of measurement.  For more information, find fuel economy ratings from the 
                <a href="https://www.fueleconomy.gov/">US Department of Energy</a>,
                and learn about <a href="https://en.wikipedia.org/wiki/Rod_(unit)">rods</a> and 
                <a href="https://en.wikipedia.org/wiki/Hogshead">hogsheads</a> from Wikipedia.
            </p>
        </div>

        <div class="col-md-6">
             <form class="form-horizontal" action="index.php" method="POST">
                <div class="form-group">
                    <label for="fueleff">Distance per unit volume</label>
                    <input type="text" id="fueleff" name="fueleff" class="form-control" required autofocus>
                </div>

                <div class="form-group"> 
                    <div class="checkbox-inline">
                        <label for="mpg2rph">MPG to RPH</label>
                        <input type="radio" name="conversion" id="mpg2rph" value="mpg2rph">
                     </div>

                     <div class="checkbox-inline">
                        <label for="rph2mpg">RPH to MPG</label>
                        <input type="radio" name="conversion" id="rph2mpg" value="rph2mpg" checked>
                     </div>
                 </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
<!--  PHP code. -->
<?php

//Prevent malicious input.
function sanitizeString($str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return $str;
}

//Convert rods per hoshead to miles per gallon.
function toMPG($rph2mpg)
{
    return ($rph2mpg / 25280);
}

//Convert miles per gallon to rods per hogshead.
function toRPH($mpg2rph)
{
    return($mpg2rph * 25280); 
}

if(isset($_POST['fueleff']))
{
    // sanitize fueleff
    $fueleff = sanitizeString($_POST['fueleff']);
    
    $output = "Error!";
    
    // business logic
    if(isset($_POST['conversion']) && $_POST['conversion'] === 'mpg2rph')
    {
        $output = "Your car gets " . toRPH($fueleff) . " rods to the hogshead and that's the way you likes it!";
    }
    else if(isset($_POST['conversion']) && $_POST['conversion'] === 'rph2mpg')
    {
        $output = "Your car gets " . toMPG($fueleff) . " miles to the gallon and that's the way you likes it!";       
    }
    
    // print fueleff
    echo $output;
}
?>   
        </div>
    </div>

    <!-- Explain page inspiration. -->
    <div class="container">
        <h2>What to the what?</h2>
        <div class="col-md-6">
            <img src="images/grampa.jpg" alt="Grampa Simpson" id="grampa">
        </div>
        <div class="col-md-6">
            <p>
                In the Simpson's episdoe <a href="http://www.imdb.com/title/tt0701045/">A Star is Burns</a>, Grampa
                Simpson declares the metric system a "tool of the devil" and states, "My car gets forty rods to the
                hogshead and that's the way I likes it!"  Does he drive a gas guzzler or is his car highly economical? 
            </p>
        </div>
    </div>

    <!-- Errata. -->
    <div class="container">
        <hr>

        <footer>
            <p>&copy; Nick Petty 2015</p>
            <p>Built using elements from <a href="http://getbootstrap.com">Bootstrap</a>.</p>
            <p>Favicon provided by <a href="http://www.favicon-generator.org/">Favicon & App Icon Generator</a>.</p>
        </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
