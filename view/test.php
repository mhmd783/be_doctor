<?php
// echo date('Y-m-d');
// echo date('H:i');
function convertStringToTwoStrings($input) {
    $characters = str_split($input);
    $i=0;
    for($i=0;$i<count($characters);$i++){
        if($characters[$i]==' '){
            break;
        }
    }  // Convert the string into an array of characters
    $part1 = implode(array_slice($characters, 0, $i));  // Join the first half of the characters
    $part2 = implode(array_slice($characters,$i));  // Join the second half of the characters
    
    return [$part1, $part2];  // Return an array of the two strings
}

$inputString = "Hello World";
[$string1, $string2] = convertStringToTwoStrings($inputString);

echo "Part 1: " . $string1 . "\n";
echo "Part 2: " . $string2 . "\n";

?>