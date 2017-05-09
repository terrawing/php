<!DOCTYPE html>
<html lang="en-US">
    <head></head>
    <body>
        <h2>Login Form</h2>
<?php
    $servername = "localhost";
    $username = "sqlguy";
    $password = "qmhrKzjFdY2Yqe8Y";
    $dbname = "sql_injection_database";
    $stuff = [];
    $canDo = true;
    
    @mysql_connect($servername, $username, $password);
    @mysql_selectdb($dbname) or die(mysql_error());
    
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
    */
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(!empty($username) && !empty($password)) {
            if(!preg_match("/[a-z0-9_\'\"=\-\s]+$/i", $username)) {
                $canDo = false;
            }
            
            if(!preg_match("/[a-z0-9_\'\"=\-\s]+$/i", $password)) {
                $canDo = false;
            }
            
            if($canDo) {
                echo $username. '<br />' . $password . '<br />';
            
                $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $queryRun = @mysql_query($query);
            
                if(@mysql_numrows($queryRun) >= 1) {
                    while($resultRow = @mysql_fetch_array($queryRun)) {
                        array_push($stuff, $resultRow[0]);
                        array_push($stuff, $resultRow[1]);
                        array_push($stuff, $resultRow[2]);
                        array_push($stuff, $resultRow[3]);
                    }
                }
                else {
                    echo 'login fail <br />';
                }
                echo "This is the query string:" . $query . "<br />";
            }
            else {
                echo '<p style="color: red">Username or Password invalid. Please login again.</p>';
            }
        }
    }

    mysql_close();
    
    if(count($stuff) != 0) {
        var_dump($stuff);
        echo "<br />";
    }
?>
        <br /><br />
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            Username: <input type="text" name="username"><br /><br />
            Password: <input type="text" name="password"><br /><br />
            <input type="submit" value="submit">
        </form>
    </body>	   
</html>