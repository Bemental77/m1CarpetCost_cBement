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
function monthlyRate ($totalCost){
    //monthly rate based on 12 month period
    $monthlyRate = 0;

    $monthlyRate = $totalCost / 12;

    return number_format($monthlyRate, 2);
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

        $totalCost = $quantityWidgets * $costPerWidget;

        if ($totalCost <= 0) {
            echo "Please make sure that you have entered a quantity and then resubmit";
        }

        if ($totalCost >= 50) {
            $totalCost = ($totalCost * $discountRate) * $taxRate;
        } else {
            $totalCost = $totalCost * $taxRate;
        }

        echo "You requested $quantityWidgets widget(s) at $20 each. Your total with tax, minus your $discountRate
 discount, comes to $totalCost. You may purchase the widget(s) in 12 monthly installments of $ monthlyRate";

    }
    totalCost(20,1.06, .75);
}


function formatCost ($totalCost){
    return number_format($totalCost, 2);
}


?>




</body>
</html>

        
