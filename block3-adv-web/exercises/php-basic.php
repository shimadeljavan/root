<style>
    .odd {
        color: red;
    }
</style>
<?php
$myArray = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

for ($i = 0 ; $i < count($myArray); $i++) {
    $class = ($i+1)%2 ? "odd" : "even";
    echo "<p class='$class'> index:$i contains $myArray[$i]</p>";
}


?>

