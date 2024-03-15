<?php

function add($a,$b){
    return $a+$b;
}
function sub($a,$b){
    if($a>$b){
    return $a-$b;
    }
    else{
        return $b-$a;
    }
}
function div($a,$b){
    if ($b == 0){
        return "Division should be valid value";
    }
    else{
        return $a/$b;
    }
    
}
function mul($a,$b){
    return $a*$b;
}
$number1 = (int)readline('enter the 1st num =');
$number2 = (int)readline('enter the 2nd num =');

$add = add($number1,$number2);
$sub = sub($number1,$number2);
$div = div($number1, $number2);
$mul = mul($number1,$number2);

print "addition is=" . $add."\n";
print "subtraction is =" . $sub."\n";
print "division is = " . $div . "\n";
print "multiplication value is =" .$mul. "\n";





?>
