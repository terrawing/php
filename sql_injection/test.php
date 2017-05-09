<?php
    $servername = "localhost";
    $username = "sqlguy";
    $password = "qmhrKzjFdY2Yqe8Y";
    $dbname = "sql_injection_database";
    $stuff = '';
    
    @mysql_connect($servername, $username, $password);
    @mysql_selectdb($dbname) or die(mysql_error());
    
    if(isset($_GET['id'])) {
        $query = mysql_query("SELECT id FROM users WHERE id = " . $_GET['id']) or die(mysql_error());
        while($resultRow = mysql_fetch_array($query)) {
            $stuff = $resultRow[0];
        }
    }
    
    mysql_close();
    
    /*
    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "error: " . $e->getMessage();
    }
    
    if(!$dbh) {
        echo "No connect";
    }
    //prepare sql statements
    
    if(isset($_GET['id'])) {
            $statement = $dbh->prepare("SELECT id FROM users WHERE id = 3'");  
            //$statement->execute(array("id" => $_GET['id']));
            $statement->execute();
            
            while($resultRow = $statement->fetch(PDO::FETCH_NUM)) {
                $stuff = $resultRow[0];
            }
        
    }
    
    $dbh = null;
    */
?>
<!DOCTYPE html>
<html lang="en-US">
    <head></head>
    <body>
        This is some shit here.
        <a href="test.php?id=1">William</a>
        <a href="test.php?id=2">Bill</a>
        <?php
        
            if($stuff) {
                echo "This is stuff: " . $stuff;
            }
        
        ?>
        
    </body>	   
</html>