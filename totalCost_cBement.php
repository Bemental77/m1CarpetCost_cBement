<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Total Cost!</title>
		
		<link href="css/styles.css" rel="stylesheet">
    </head>
    <body><?php

    function sanitizeString($field) {
        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    }

    function sanitizeFloat($field){
        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    
function totalCost($costPerWidget, $taxRate, $discountRate){
  //set variables
  $quantityWidgets = sanitizeFloat('quantity');
  $costPerWidget = 20.00;
  $taxRate = 1.06;
  $discountRate = .75;
  $totalCost = 0;

  $totalCost = $quantityWidgets * $costPerWidget

    if($totalCost <= 0){
      echo "Please make sure that you have entered a quantity and then resubmit";
    }

    if($totalCost >= 50){
      $totalCost = ($totalCost * $discountRate) * $taxRate;
    } else {
      $totalCost = $totalCost * $taxRate;
    }

}

function monthlyRate ($totalCost){
  //monthly rate based on 12 month period
  $monthlyRate = 0;

  $monthlyRate = $totalCost / 12;

  return number_format($monthlyRate, 2);
}

function formatCost ($totalCost){
  return number_format($totalCost, 2);
}

echo "You requested $quantityWidgets widget(s) at $20 each. Your total with tax, minus your $discountRate
 discount, comes to $totalCost. You may purchase the widget(s) in 12 monthly installments of $monthlyRate"
    
        
    ?> 
  </body>
</html>
        
