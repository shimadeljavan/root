<?php
function pali($word) {

    $word = str_replace(' ', '', $word);

    $length = 0;
    for ($i = 0; $word[$i]; $i++) {
        $length++;
    }

    $halfLength = $length / 2;
    for ($i = 0; $i < $halfLength; $i++) {
        if ($word[$i] !== $word[$length - $i - 1]) {
            return "not palindrome";
        }
    }
        return "palindrome";
    
}

$word = "never odd or even";
$result = pali($word);
echo $result;
?>

<?php
    $phaseToTest = "taco   ..cat.";
    $forwards = "";
    $backwards = "";
    for($i = 0; $i < strlen($phaseToTest); $i++) {
        if(!($phaseToTest[$i] == " " || $phaseToTest[$i] == ".")) {
            $forwards .= $phaseToTest[$i];
        }
    }

    for($i = strlen($phaseToTest)-1; $i >= 0; $i--) {
        if(!($phaseToTest[$i] == " " || $phaseToTest[$i] == ".")) {
            $backwards .= $phaseToTest[$i];
        }
    }

    if($forwards == $backwards) {
    }
        $backIndex = strlen($phaseToTest)-1;

    for($i = 0; $i < strlen($phaseToTest); $i++) {
        // while I have a space or a period, skip to the next index
        while($phaseToTest[$i] == " " || $phaseToTest[$i] == ".") {
            $i++;
        }
        $backIndex--;
    }

?>