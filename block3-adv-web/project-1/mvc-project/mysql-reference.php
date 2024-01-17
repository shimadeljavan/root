<!--Host
localhost:3306
Database name
shima94_Food_MVC
User name
foodShima
Password
****** -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $host = 'localhost:3306';
    $database = 'shima94_food';
    $username = 'shima_food';
    $password = '';

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_error) {
        throw new Exception('Could not connect to the database');
    }

    $result = $mysqli->query("SELECT * FROM dishes");

    while ($row = $result->fetch_assoc()) {
        echo $row['dishID'] . " " . $row['dishName'] . " " . $row['price'] . "<br>";
    }

    $mysqli->close();

    $success = true;
} catch (Exception $e) {
    $success = false;
    echo "Error: " . $e->getMessage();
} finally {
    echo $success ? "Success!" : "Failure!";
}
?>





<!-- https://shima94.web582.com/block3-adv-web/project-1/mvc-project/mysql-reference.php -->

<!-- https://eduvaniercollegeqc.sharepoint.com/sites/MEQ2-WebsiteDesignSpecialist/_layouts/15/stream.aspx?id=%2Fsites%2FMEQ2%2DWebsiteDesignSpecialist%2FShared%20Documents%2FBlock%203%20%2D%20Advanced%20Web%20Programming%2FRecordings%2FMeeting%20in%20%5FBlock%203%20%2D%20Advanced%20Web%20Programming%5F%2D20231116%5F135101%2DMeeting%20Recording%2Emp4&referrer=StreamWebApp%2EWeb&referrerScenario=AddressBarCopied%2Eview -->

<!-- https://shima94.web582.com/block3-adv-web/project-1/mvc-project/views/home.php -->