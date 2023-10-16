<?php 
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
$serverName = $_SERVER['SERVER_NAME'];
$registrationPageUrl = $serverName."/client-registration-form.php";
$currentURL = "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
if($currentURL == $registrationPageUrl) {
    if(isset($_POST['client-login']) && is_numeric($_POST['Phone']) && !empty($_POST['Password'])){ 
        $clientPhone = $_POST['Phone'];
        $clientPassword = $_POST['Password'];
        if (strlen($clientPhone) >7 && strlen($clientPhone) < 13){
            #if we need to create a user or login
            if (strlen($clientPassword) > 7){
                dataBaseConn();
                $page = "/?phone=$clientPhone";
                $loginResult = mysql_query("SELECT * from `st-clients` WHERE ClientPhone = '$clientPhone'");
                $row = mysql_fetch_assoc($loginResult); 
                if ($clientPhone == $row['ClientPhone'] ){
                	if ($clientPassword == $row['ClientPassword']){
                		$validationResult = 'Successful Login! The page will be reloaded in 3 seconds.';
                		header("Refresh: 3; url=$page");
                	}else{
                		$validationResult = 'Wrong password!';
            		}
                }else{
            		$strSQL = "INSERT INTO `st-clients` (ClientPhone, ClientPassword) 
            		VALUES('$clientPhone','$clientPassword')"; 
            		$validationResult = 'Successful Registration! The page will be reloaded in 3 seconds.';
            		header("Refresh: 3; url=$page");
            		}
                    dataBaseConnClose();
            }else{
                $validationResult = 'Your password is too easy';
            }
        }else{
            $validationResult = "Your phone number must be real";
        }
    }else{
        $validationResult = "Log in or Sign up";
    }
}
else{ 
    #if this is a new session for a new user - show nothing ->
    if($_GET['phone']) {
        $clientPhone = $_GET['phone'];
        $validationResult = "Your account $clientPhone";
    ###########################################################################
    //Data from DataBase for 1 month only
    ###########################################################################
        if (strlen($clientPhone) >7 && strlen($clientPhone) <13 ) {
        
        dataBaseConn();
        
        $dataResult = mysql_query("SELECT * from `st-clients-statistic` WHERE Phone = '$clientPhone' ORDER BY id DESC");
        while ($row = mysql_fetch_assoc($dataResult))
            {
            $id = $row['id'];
            $name = $row['Name'];
            $Password = $row['Password'];
            $Phone = $row['Phone'];
            $Email = $row['Email'];
            $Budget = $row['Budget'];
            $Interest = $row['Interest'];
            $Visitors = $row['Visitors'];
            $Views = $row['Views'];
            $Domain = $row['Domain'];
            $PeriodFrom = $row['PeriodFrom'];
            $PeriodUntil = $row['PeriodUntil'];
            ;}
            
    ###########################################################################
    $date = date("Y-m-d");
        // get info about visitors from database
    	$getStatsData = mysql_query("SELECT * FROM `st-visitors` ORDER BY `date` DESC LIMIT 6");
    	// make a list for table
    	//for($i=0; $i<5; $i++){
    	
    		while ($row = mysql_fetch_assoc($getStatsData))
    	    {
        		$displayStatsData .= '<tr>
        		<td>' . $row['date'] . '</td>
        		<td>' . $row['hosts'] . '</td>
        		<td>' . $row['views'] . '</td>
        		<td><details><summary>Details</summary>' . $row['domain'] . '</details></td>
        		</tr>';
    	//	}
    	}
        dataBaseConnClose();
        }else{
            $validationResult = 'Your phone number must be real';
        }
    }else{
        $validationResult = "Log in to check your stats";
    	$id = 0;
    	$name = 0;
    	$Password = 0;
    	$Phone = 0;
    	$Email = 0;
    	$Budget = 0;
    	$Interest = 0;
    	$Visitors = 0;
    	$Views = 0;
    	$Domain = 0;
    	$PeriodFrom = 0;
    	$PeriodUntil = 0;
    }
}


function dataBaseConn(){
    //global $var;  
    //if("Condition"){
    //    $var = "01-01-11";
    //}
	$stcntr_host = ""; // sql server
	$stcntr_user = ""; // user login
	$stcntr_password = ""; // password
	$stcntr_database = ""; // database name

	
	$db_stcntr = mysql_connect($stcntr_host, $stcntr_user, $stcntr_password) or die ("cant connect to data"); // Database SQL connection
	mysql_select_db($stcntr_database); // server side
	mysql_query('SET NAMES utf8');
	mysql_query('SET CHARACTER SET utf8' );
	mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"' );
}
function dataBaseConnClose(){
    mysql_close($db_stcntr);
}

function dataVisitors(){
    dataBaseConn();
    // Get visitors ip and date	
    $visitor_ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d");
    $domain = $_SERVER['SERVER_NAME'];
    $link = $_SERVER['REQUEST_URI'];
    // check in database today statistic   
    $statResult = mysql_query("SELECT * FROM `st-visitors` WHERE `date`='$date'") ;
    $row = mysql_fetch_assoc($statResult);
    // IF not visited today
    if (mysql_num_rows($statResult) == 0)
    {
        // add +1 one host and +1 hit
        //mysql_query("INSERT `st-visitors` SET `date`='$date',`hosts`=1,`views`=1,`domain`='$domain',`link`='$link',`ip_address`='$visitor_ip'");
    	mysql_query("INSERT `st-visitors` SET 
    	    `date`='$date',
    	    `hosts`=1,
    	    `views`=1,
    	    `domain`= '$domain',
    	    `link`= '$link',
    	    `ip_address`= '$visitor_ip'");
    }
    else
    {   
        $arrayVisitor_ip = explode(", ",$row['ip_address']);
        $arrayDomain = explode(", ",$row['domain']);
        $arrayLink = explode(", ",$row['link']);
        
        if (!in_array($domain, $arrayDomain)){
            $domain = $row['domain'].", ".$domain;
            mysql_query("UPDATE `st-visitors` SET `domain`='$domain' WHERE `date`='$date'");
            echo $domain;
        }
        if (!in_array($link, $arrayLink)){
            $link = $row['link'].", ".$link;
            mysql_query("UPDATE `st-visitors` SET `link`='$link' WHERE `date`='$date'");
        }
        // if this user already was here
        if (in_array($visitor_ip, $arrayVisitor_ip)){
            mysql_query("UPDATE `st-visitors` SET `views`=`views`+1 WHERE `date`='$date'");
        }
        else
        {
            $visitor_ip = $row['ip_address'].",".$visitor_ip;
            mysql_query("UPDATE `st-visitors` SET `hosts`=`hosts`+1,`views`=`views`+1, `ip_address`='$visitor_ip' WHERE `date`='$date'");
        }
    }
    dataBaseConnClose();
}
dataVisitors();
?>