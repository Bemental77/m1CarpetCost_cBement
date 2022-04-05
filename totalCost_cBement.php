<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form that calls the totalCost.php program</title>
    <meta charset="utf-8">

    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
<?php

function sanitizeString($field) {
    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
}

function sanitizeFloat($field){
    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_NUMBER_FLOAT);
}


$submitPressed = sanitizeString('submit');
if(isset($submitPressed)) {

    function totalCost($costPerWidget, $taxRate, $discountRate)
    {
        //set variables
        $quantityWidgets = sanitizeFloat('quantity');
        $costPerWidget = 20.00;
        $taxRate = 1.06;
        $discountRate = .75;
        $totalCost = 0;
        $totalDiscount = 0;
        $monthlyRate = 0;


        //set up associatve array containing the font types as its keys
        $fontChoice = array("Trebuchet MS", "Jokerman", "Papyrus", "Comic Sans MS", "Tekton Pro", "Arial", "Courier New", "Verdana");

        //array for fgColor
        $fgColor = array("#ffb300", "rgb(176, 23, 31)", "rgb(75, 0, 130)", "rgb(72, 61, 139)", "rgb(132, 112, 255)", "rgb(69, 139, 0)", "rgb(162, 205, 90)");

        //array for bgColor
        $bgColor = array("rgb(75, 0, 130)", "rgb(176, 23, 31)", "rgb(72, 61, 139)", "rgb(132, 112, 255)", "rgb(69, 139, 0)", "rgb(162, 205, 90)", "#ffb300");


        $totalCost = $quantityWidgets * $costPerWidget;
        $totalDiscount = $totalCost * $discountRate;

        $monthlyRate = $totalCost / 12;

        $monthlyRate = round($monthlyRate, 2);
        $monthlyRate = number_format($monthlyRate, 2);
        $totalDiscount = number_format($totalDiscount, 2);
        $totalCost = number_format($totalCost, 2);

        if ($totalCost <= 0) {
            echo "Please make sure that you have entered a quantity and then resubmit";
        }

        if ($totalCost >= 50) {
            $totalCost = ($totalCost * $discountRate) * $taxRate;

            echo '<span style="font-size: 50px;">', '<body style="background-color:"$bgColor">', "You requested $quantityWidgets widget(s) at $20 each. Your total with tax, minus your $$totalDiscount
 discount, comes to $$totalCost. You may purchase the widget(s) in 12 monthly installments of $$monthlyRate";
        } else {
            $totalCost = $totalCost * $taxRate;
            echo "You requested $quantityWidgets widget(s) at $20 each. Your total with tax, comes to $$totalCost. You may purchase the widget(s) in 12 monthly installments of $$monthlyRate";
        }


    }
    totalCost(20,1.06, .75);
}


function formatCost ($totalCost){
    return number_format($totalCost, 2);
}


?>




</body>
</html>

        
