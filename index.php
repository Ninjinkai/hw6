<html>
<head>
    <title>Fuel Efficiency</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/jumbotron.css">
</head>
<body>
    <div class="container">
        <div class="col-md-5 col-md-offset-3">
             <form class="form-horizontal" action="index.php" method="POST">
                <div class="form-group">
                    <label for="temperature">Temperature</label>
                    <input type="text" id="temperature" name="temperature" class="form-control" required autofocus>
                </div>

                <div class="form-group"> 
                    <div class="checkbox-inline">
                        <label for="fahrenheit">Fahrenheit to Celsius</label>
                        <input type="radio" name="conversion" id="fahrenheit" value="fahrenheit">
                     </div>

                     <div class="checkbox-inline">
                        <label for="celsius">Celsius to Fahrenheit</label>
                        <input type="radio" name="conversion" id="celsius" value="celsius">
                     </div>
                 </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        
<?php
function sanitizeString($str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return $str;
}

function toFahrenheit($celsius)
{
    return ((1.8 * $celsius) + 32); 
}

function toCelsius($fahrenheit)
{
    return(($fahrenheit - 32) / 1.8); 
}

if(isset($_POST['temperature']))
{
    // sanitize temperature
    $temperature = sanitizeString($_POST['temperature']);
    
    $output = "Error!";
    
    // business logic
    if(isset($_POST['conversion']) && $_POST['conversion'] === 'fahrenheit')
    {
        $output = $temperature . " F == " . toCelsius($temperature) . " C";
    }
    else if(isset($_POST['conversion']) && $_POST['conversion'] === 'celsius')
    {
        $output = $temperature . " C == " . toFahrenheit($temperature) . " F";       
    }
    
    // print temperature
    echo $output;
}
?>   
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>
</html>
