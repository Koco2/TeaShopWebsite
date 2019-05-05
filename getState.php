<?php
// Array with names

$a [] = "Alabama"; 
$a [] = "Alaska ";
$a [] = "Arizona ";
$a [] = "Arkansas ";
$a [] = "California"; 
$a [] = "Colorado ";
$a [] = "Connecticut ";
$a [] = "Delaware ";
$a [] = "Florida ";
$a [] = "Georgia ";
$a [] = "Hawaii ";
$a [] = "Idaho ";
$a [] = "Illinois Indiana ";
$a [] = "Iowa ";
$a [] = "Kansas"; 
$a [] = "Kentucky"; 
$a [] = "Louisiana"; 
$a [] = "Maine ";
$a [] = "Maryland"; 
$a [] = "Massachusetts"; 
$a [] = "Michigan ";
$a [] = "Minnesota ";
$a [] = "Mississippi"; 
$a [] = "Missouri ";
$a [] = "Montana Nebraska ";
$a [] = "Nevada ";
$a [] = "New Hampshire ";
$a [] = "New Jersey ";
$a [] = "New Mexico ";
$a [] = "New York ";
$a [] = "North Carolina ";
$a [] = "North Dakota ";
$a [] = "Ohio ";
$a [] = "Oklahoma ";
$a [] = "Oregon ";
$a [] = "Pennsylvania Rhode Island ";
$a [] = "South Carolina ";
$a [] = "South Dakota ";
$a [] = "Tennessee ";
$a [] = "Texas ";
$a [] = "Utah ";
$a [] = "Vermont"; 
$a [] = "Virginia" ;
$a [] = "Washington"; 
$a [] = "West Virginia"; 
$a [] = "Wisconsin ";
$a [] = "Wyoming";



// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint = $q;
                break;
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? $q : $hint;
?>