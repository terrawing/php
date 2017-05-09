<?php function gameheader($title) { ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
        <head>
            <title><?php echo $title; ?></title>
            <style type="text/css">
                <?php css() ?>
            </style>
        </head>
        <body>
            <div><img src='http://zenit.senecac.on.ca/~int322_121b35/assignmentimages/gamecartlogo.png' alt='gamecart_logo_I_created_myself' /></div>
            <div id='navbar'>&nbsp;&nbsp;&nbsp;<a href='wwong20_a2_add.php'>Add Item</a> &nbsp;&nbsp;&nbsp;<a href='wwong20_a2_view.php'>View All</a> &nbsp;&nbsp;&nbsp;<a href="wwong20_a2_view.php?status=active">View Active</a> &nbsp;&nbsp;&nbsp;<a href="wwong20_a2_view.php?status=delete">View Delete</a></div>
<?php
    } //1
?>
<?php 
    function gamefooter() { 
?>
        <div class='tablealign'>
        <p>
            <a href="http://validator.w3.org/check?uri=referer">
            <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
            </a>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" />
            </a>
        </p>
        </div>
        </body>
    </html>
    
<?php
    } 
?>
<?php function css() { ?>
    body {
        background: #FFFFCC;
        margin: 0px;
        padding: 0px;
    }
    
    #navbar {
        height: 30px;
        width: 100%;
        border-top: 0px;
        border-bottom: 0px;
        background-color: #3399CC;
        margin: 0px;
        padding: 0px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
        line-height: 30px;
        white-space: nowrap;
    }
    
    a:link {
        color: #FFFFFF;
        text-decoration: none;
        font-weight: bold;   
    }
    
    a:visited {
        color: #FFFFFF;
        text-decoration: none;
        font-weight: bold;   
    }
    
    #containtable {
        display: table;
        margin: 10px
    }
    
    #row {
        display: table-row;
    }
    
    #left, #middle {
        display: table-cell;
        text-align: right;
    }
    
    #right {
        display: table-cell;
        text-align: left;
        padding: 10px;
    }
    
    span.space {
        margin: 10px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
        color: #FF0000;
    }
    
    a.dr:link {
        color: #FF0000;
        text-decoration: none;
        font-weight: bold;   
    }
    
    a.dr:visited {
        color: #FF0000;
        text-decoration: none;
        font-weight: bold;   
    }
    
    div.align {
        vertical-align: middle;
        height: 30px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
        color: #000000;
    }
    
    div.align2 {
        vertical-align: middle;
        height: 145px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
        color: #000000;
    }
    
    div.alignselect {
        vertical-align: middle;
        height: 31px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
        color: #000000;
    }
    
    div.tablealign {
        padding: 10px;
    }
    
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 2px solid #3399CC;
    }
    
    table {
        width: 100%;
    }
    
    th {
        background-color: #3399CC;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
        color: #FFFFFF;
    }
    
    td {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
        color: #000000;
    }
    
<?php
    }
?>
<?php 
    function form() { 
?>
    <?php if(empty($_GET[id])) { ?>
        <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
    <?php } ?>
    <?php if(!empty($_GET[id])) { ?>
        <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
    <?php } ?>
        <div id='containtable'>
            <div id='row'>
                <div id='left'>
                    <?php if(!empty($_GET[id])) { ?> <div class='align'>ID#:</div><?php } ?>
                    <?php if(!empty($_POST[id])) { ?> <div class='align'>ID#:</div><?php } ?>
                    <div class='align'>Item Name:</div>
                    <div class='align'>Manufacturer:</div>
                    <div class='align'>Model:</div>
                    <div class='align2'>Description:</div>
                    <div class='align'>Number on hand:</div>
                    <div class='align'>Reorder level:</div>
                    <div class='align'>Cost:</div>
                    <div class='align'>Price:</div>
                    <div class='align'>Sale item:</div>
                    <div class='align'>Discontinued item:</div>
                </div>                   
                <div id='right'>
                    <?php if(!empty($_GET[id])) {
                        $id = $_GET[id];
                        $username = 'int322_121b35';
                        $password = 'hdBL8952';
                        $query = "select * from inventory where id=$id";
                        $connect = mysql_connect('db-mysql.zenit',$username,$password) or die('Could not connect ' . mysql_error());
        
                        mysql_select_db($username) or die('Could not select database '. mysql_error());
                        $qline2 = mysql_query($query,$connect) or die('Could not get a query to test '. mysql_error());
        
                        while($dataedit = mysql_fetch_assoc($qline2)) {
                            $_POST[id] = $dataedit[id];
                            $_POST[itemname] = $dataedit[name];
                            $_POST[manuname] = $dataedit[manufac];
                            $_POST[model] = $dataedit[model];
                            $_POST[description] = $dataedit[descrip];
                            $_POST[noh] = $dataedit[onhand];
                            $_POST[rl] = $dataedit[reorder];
                            $_POST[cost] = $dataedit[cost];
                            $_POST[price] = $dataedit[price];
                            $_POST[selling] = $dataedit[sale];
                            $_POST[discon] = $dataedit[discont];
                        } //while 
                        insertform(0);
                        mysql_close($connect);
                    }                
                    
                    if(empty($_GET[id])) {     
                        insertform(1);
                    } ?>
                </div>
            </div>
        </div>
    </form>
<?php
    } 
?>
<?php
    function validation() {
    
        if (empty($_POST)) { //empty, not input
            gameheader("GameCart add form");            
            form();
            gamefooter();
        } //if
        
        else {
            $emp = array();
        
            if(!preg_match("/^[a-z ]+$/i", $_POST[itemname])) { //if it DOESN'T match because of the ! sign
                array_push($emp, "<span class='space'>The game item name is invalid - letters or spaces only</span><br />");
            }
        
            if(!preg_match("/^[a-z- ]+$/i", $_POST[manuname])) {
                array_push($emp, "<span class='space'>The game manufacture name is invalid - letters, dashes or spaces only</span><br />");
            }
                
            if(!preg_match("/^[a-z0-9- ]+$/i", $_POST[model])) {
                array_push($emp, "<span class='space'>The game model number is invalid - letters, numbers, dashes or spaces only</span><br />");
            }
        
            if(!preg_match("/^[a-z0-9,. ]+$/i", $_POST[description])) {
                array_push($emp, "<span class='space'>The description is invalid - letters, numbers, commas, periods or spaces only</span><br />");
            }
        
            if(!preg_match("/^[0-9]+$/", $_POST[noh])) {
                array_push($emp, "<span class='space'>The number on hand is invalid - numbers only</span><br />");
            }
        
            if(!preg_match("/^[0-9]+$/", $_POST[rl])) {
                array_push($emp, "<span class='space'>The reorder level is invalid - numbers only</span><br />");
            }
        
            if(!preg_match("/^[0-9]+\.([0-9][0-9])$/", $_POST[cost])) {
                array_push($emp, "<span class='space'>The cost is invalid - numbers only and must contain a period and 2 numbers after for the cents</span><br />");
            }
        
            if(!preg_match("/^[0-9]+\.([0-9][0-9])$/", $_POST[price])) {
                array_push($emp, "<span class='space'>The price is invalid - numbers only and must contain a period and 2 numbers after for the cents</span><br />");
            }
        
            if(empty($emp)) {
                //echo "<span class='space'>Everything is correct</span><br />";
                $username = 'int322_121b35';
                $password = 'hdBL8952';
                if($_POST[selling] == 'sale') { $mark = 'y'; } else { $mark ='n'; }
                if($_POST[discon] == 'discontinued') { $mark2 = 'y'; } else { $mark2 ='n'; }
                
                $query = "insert into inventory(name, manufac, model, descrip, onhand, reorder, cost, price, sale, discont, deleted) values('$_POST[itemname]', '$_POST[manuname]', '$_POST[model]', '$_POST[description]', '$_POST[noh]', '$_POST[rl]', '$_POST[cost]', '$_POST[price]', '$mark', '$mark2', 'n')";
                $query2 = "update inventory set name='$_POST[itemname]', manufac='$_POST[manuname]', model='$_POST[model]', descrip='$_POST[description]', onhand='$_POST[noh]', reorder='$_POST[rl]', cost='$_POST[cost]', price='$_POST[price]', sale='$mark', discont='$mark2' where id=$_POST[id]";
                $connect = mysql_connect('db-mysql.zenit',$username,$password) or die('Could not connect to ' . mysql_error());
            
                mysql_select_db($username) or die('Could not select database ' . mysql_error());
                if(empty($_POST[id])){
                    mysql_query($query,$connect) or die('Could not get a query to test query(insert...) ' . mysql_error());
                }
                if(!empty($_POST[id])) {
                    mysql_query($query2,$connect) or die('Could not get a query to test query2(update...) ' . mysql_error());
                }
                mysql_close($connect);
                header('Location: wwong20_a2_view.php');
            } //valid              
            else{   
                gameheader("GameCart add form");            
                echo "<br /><span class='space'>Please correct the following error(s):</span><br />";
                foreach ($emp as $text) { echo $text;}               
            }       
            form();
            gamefooter();
        } //else        
    }
?>
<?php
    function data(){
        $status = $_GET[status];
        $username = 'int322_121b35';
        $password = 'hdBL8952';
        $queryall = "select * from inventory";
        $queryall2 = "select * from inventory where deleted='n'";
        $queryall3 = "select * from inventory where deleted='y'";
        
        $connect = mysql_connect('db-mysql.zenit',$username,$password) or die('Could not connect to ' . mysql_error());
        
        mysql_select_db($username) or die('Could not select database ' . mysql_error());
        
        if(empty($_GET[status])) { //if GET gets nothing, use this query
            $qline = mysql_query($queryall,$connect) or die('Could not get a query to ' . mysql_error());
        }
        elseif($_GET[status] == "active") { //if GET gets active use this query
            $qline = mysql_query($queryall2,$connect) or die('Could not get a query to ' . mysql_error());
        }
        else { //if GET gets delete use this query
            $qline = mysql_query($queryall3,$connect) or die('Could not get a query to ' . mysql_error());
        }
?>
        <div class='tablealign'><br />
        <table>
            <tr>
                <th>Item code</th>
                <th>Item name</th>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Description</th>
                <th>Number on hand</th>
                <th>Reorder on hand</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Sale item</th>
                <th>Discontinued item</th>
                <th>Delete/Restore</th>
            </tr>
<?php
        while($data = mysql_fetch_assoc($qline)) {
            echo "<tr>
                    <td><a class='dr' href='wwong20_a2_add.php?id=$data[id]'>$data[id]</a></td>
                    <td>$data[name]</td>
                    <td>$data[manufac]</td>
                    <td>$data[model]</td>
                    <td>$data[descrip]</td>
                    <td>$data[onhand]</td>
                    <td>$data[reorder]</td>
                    <td>$data[cost]</td>
                    <td>$data[price]</td>
                    <td>$data[sale]</td>
                    <td>$data[discont]</td>";
                    if(empty($_GET[status])) {
                        if($data[deleted] == 'y') {
                            $case = 'delete';
                            echo "<td><a class='dr' href='wwong20_a2_delete.php?id=$data[id]&amp;status=$case'>restore</a></td>";
                        }
                        else {
                            $case = 'restore';
                            echo "<td><a class='dr' href='wwong20_a2_delete.php?id=$data[id]&amp;status=$case'>delete</a></td>";
                        }
                    }
                    else {
                        if($data[deleted] == 'y') {
                            $case = 'delete';
                            echo "<td><a class='dr' href='wwong20_a2_delete.php?id=$data[id]&amp;status=$case&amp;point=d'>restore</a></td>";
                            //it also pass the value d to the url
                        }
                        else {
                            $case = 'restore';
                            echo "<td><a class='dr' href='wwong20_a2_delete.php?id=$data[id]&amp;status=$case&amp;point=a'>delete</a></td>";
                            //it also pass the value a to the url
                        }
                    }
                echo "</tr>";
        }
        echo "</table></div>";
        mysql_close($connect);
?>
<?php
    }
?>
<?php
    function delete() {
        $id = $_GET[id];
        $status = $_GET['status'];
        if ($status == 'restore') {
            $state = 'y';
        }
        else {
            $state = 'n';
        }
        
        $username = 'int322_121b35';
        $password = 'hdBL8952';
        $connect = mysql_connect('db-mysql.zenit',$username,$password) or die('Could not connect to ' . mysql_error());
        mysql_select_db($username) or die('Could not select database ' . mysql_error());

        $queryupdate = "update inventory set deleted='$state' where id='$id'";
        mysql_query($queryupdate,$connect) or die('Could not get a query to ' . mysql_error());
        mysql_close($connect);
        
        if(empty($_GET[point])) { //if just viewing the record $_GET[point] hasn't been set to any values yet, run this header
            header('Location: wwong20_a2_view.php');
        }
        elseif($_GET[point] == 'a') { //if the point recieved from the link is a, run this header
            header('Location: wwong20_a2_view.php?status=active');
        }
        else { //if the point recieved from the link is d, run this header
            header('Location: wwong20_a2_view.php?status=delete');
        }
    }
?>
<?php
    function insertform($choice) { ?>
        <?php if(!empty($_POST[id])) { ?> <div class='align'><input type='text' name='id' value='<?php echo $_POST[id]; ?>' size='40' maxlength='50' readonly='readonly' /></div><?php } ?>
        <div class='align'><input type='text' name='itemname' value='<?php echo $_POST[itemname]; ?>' size='40' maxlength='50' /></div>
        <div class='align'><input type='text' name='manuname' value='<?php echo $_POST[manuname]; ?>' size='40' maxlength='50' /></div>
        <div class='align'><input type='text' name='model' value='<?php echo $_POST[model]; ?>' size='10' maxlength='10' /></div>
        <div class='align2'><textarea name='description' cols='60' rows='7'><?php echo $_POST[description]; ?></textarea></div>
        <div class='align'><input type='text' name='noh' value='<?php echo $_POST[noh]; ?>' size='4' maxlength='5' /></div>
        <div class='align'><input type='text' name='rl' value='<?php echo $_POST[rl]; ?>' size='4' maxlength='5' /></div>
        <div class='align'><input type='text' name='cost' value='<?php echo $_POST[cost]; ?>' size='10' maxlength='15' /></div>
        <div class='alignselect'><input type='text' name='price' value='<?php echo $_POST[price]; ?>' size='10' maxlength='15' /></div>
        <?php if($choice == 0) { ?>
            <div class='alignselect'><input type='checkbox' name='selling' value='sale' <?php if($_POST[selling] == 'y') echo 'checked = checked'; ?> /></div>
            <div class='align'><input type='checkbox' name='discon' value='discontinued' <?php if($_POST[discon] == 'y') echo 'checked = checked'; ?> /></div>
        <?php } ?>
        <?php if($choice == 1) { ?>
            <div class='alignselect'><input type='checkbox' name='selling' value='sale' <?php if($_POST[selling] == 'sale') echo 'checked = checked'; ?> /></div>
            <div class='align'><input type='checkbox' name='discon' value='discontinued' <?php if($_POST[discon] == 'discontinued') echo 'checked = checked'; ?> /></div>
        <?php } ?>
        <div class='align'><input type='submit' /></div>
<?php } ?>