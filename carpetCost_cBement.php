<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Billy Bob's Carpet Warehouse</title>
		
		<link href="css/styles.css" rel="stylesheet">
    </head>
    <body><?php

    function sanitizeString($field) {
        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    }

    function sanitizeFloat($field){
        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    function squareArea($roomLength, $roomWidth){
        return $roomLength * $roomWidth;
    }

    function calculateCost($sqArea, $selectedCarpets, $prices){

        $total = 0;

        echo "\n\t\t<ul>\n";

        //for each carpet choice in $selectedCarpets, we want to determine
        //the cost for carpeting the user's room and display the esitmate for each 
        //chosen carpet type in a bulleted list
        foreach ($selectedCarpets as $carpetType){

            //determine the cost for this type of carpeting
            $cost = $prices[$carpetType] * $sqArea;


            //add this cost to the grand total
            $total += $cost;

            echo "\t\t\t<li>At $", number_format($prices[$carpetType], 2), " per square foor of $carpetType
             carpeting, your cost will be $", number_format($cost, 2), "</li>\n";
        }

        echo "\n\t\t<ul>\n";

        echo "\t\t<br>For a grand total of: $", number_format($total, 2), "\n";


    }

    // NOTE: regarding HTML source code readability!
    // Place each opening delimiter immediately following 
    // the HTML tag it should go after. Add a single space
    // immediately after the ending delimiter and place
    // the next HTML tag below on its own line indented to the 
    // proper level.
    //phpinfo();

    $submitPressed = sanitizeString('submit');
    if(isset($submitPressed)){

        //set up associatve array containing the carpet types as its keys
        //and price per square foot as its values
        $carpetPrices = array("Berber" => 5.99, "Shag" => 3.25, "Astroturf" => 9.25, "Plush" => 1.50,
        "Commercial" => 2.00, "Loop Pile" => 2.50, "Rug" => 4.00);

        echo "\n\t\t<h3>Welcome to Billy Bob's Carpet Warehouse ", sanitizeString('fName'), " ", sanitizeString('lName'),
        "!</h3>\n";

        //Determine the square footage of the room to be carpeted.
        $roomLength = sanitizeFloat('length');
        $roomWidth = sanitizeFloat('width');
        $roomArea = squareArea($roomLength, $roomWidth);
        $footLengthString = "feet";
        $footWidthString = "feet";
        $footAreaString = "feet";

        if($roomLength <= 1){
            $footLengthString = "foot";
        }

        if($roomWidth <= 1){
            $footWidthString = "foot";
        }

        if($roomArea <= 1){
            $footAreaString = "foot";
        }

        echo "For a room of $roomLength $footLengthString by $roomWidth $footWidthString, we have a 
        square footage value of $roomArea square $footAreaString<br><br>";

        //determine the cost of carpeting the user's room for each chosen carpet type
        //Display the info for each chosen carpeting as a bulleted list item
        calculateCost($roomArea, $_POST['carpetChoices'], $carpetPrices);



    }
        
    ?> 
        
        <h2>Welcome to Billy Bob's Carpet Warehouse</h2>
        
        <form action="" method="post">

            <label for="fName">First Name:</label>
            <input type="text" name="fName" id="fName" value="">
             <br><br>

            <label for="lName">Last Name:</label>
            <input type="text" name="lName" id="lName">
             <br><br>

            <label for="length">Enter length of room (in feet):</label>
            <input type="text" name="length" id="length">
             <br><br>

            <label for="width">Enter width of room (in feet):</label>
            <input type="text" name="width" id="width">
             <br><br>

            <label for="carpetChoices">Carpet choices:</label>
	    <br>
            <select name="carpetChoices[]" id="carpetChoices" multiple size="5">

                <option value="Berber" selected="yes">Berber</option>
                <option value="Shag">Shag</option>
                <option value="Astroturf">Astroturf</option>
                <option value="Plush">Plush</option>
                <option value="Commercial">Commercial</option>
                <option value="Loop Pile">Loop Pile</option>
                <option value="Rug">Rug</option>

           </select>
           <br><br>

           <input type="submit" name="submit" value="Calculate Area">
          
        </form>
    </body>
</html>