<?php /*  
session_start();
if($_SESSION["valid"] != "true"){
header("Location: http://statistics.services.hosting-israel.co.il/login.php"); 
exit;
}*/
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Statistics Control </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type="text/css" href='../includes/css/style.css'>
  </head>
<noindex>
<body>
<div class="form-create-bd">
    <form action="" method="POST" style="" enctype=multipart/form-data>
            <input type="text"      name="Name"          placeholder="Name"/>
            <input type="text"      name="Password"      placeholder="Password"/>
            <input type="text"      name="Phone"         placeholder="Phone"/>
            <input type="text"      name="Email"         placeholder="email"/>
            <input type="text"      name="Budget"        placeholder="Budget"/>
            <input type="text"      name="Interest"         placeholder="Interest"/>
            <input type="text"      name="Visitors"      placeholder="Visitors"/>
            <input type="text"      name="Views"         placeholder="Views"/>
            <input type="text"      name="Domain"          placeholder="Domain"/>
            <input type="text"      name="PeriodFrom"    placeholder="2017-01-01"/>
            <input type="text"      name="PeriodUntil"   placeholder="2020-12-01"/>
	        <input type="submit"    name="addBD" value="Save" />
    </form>
</div>

    <!--remove from DB--> 
    <div id="del-form">
        <form action="" method="get">
            <input name="delete" type="text" size="10" placeholder="Articles">
            <input type="submit" id="delBtn" value="УДАЛИТЬ">
        </form>
        <span style="padding: 5px; display: block; background: #FFDDDD;">Для удаления впишите номер статьи (например 193).</span>
    </div>
<?php   
header('Content-type: text/html; charset=utf-8');

$sec = 3;
$page = "http://statistics.services.hosting-israel.co.il/core/admin-addBD.php";
 
$mysql_host = ""; // sql host
$mysql_user = ""; // user
$mysql_password = ""; // pass
$mysql_database = ""; // db name
 
$db_ad = mysql_connect($mysql_host, $mysql_user, $mysql_password); // conn SQL
mysql_select_db($mysql_database); // conn to DB
mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER SET utf8' );
mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"' );

if (isset($_POST['addBD'])){
    $Name =  trim($_POST['Name']);
    $Password =  trim($_POST['Password']);
    $Phone =  trim($_POST['Phone']);
    $Email =  trim($_POST['Email']);
    $Budget =  trim($_POST['Budget']);
    $Interest =  trim($_POST['Interest']);
    $Visitors =  trim($_POST['Visitors']);
    $Views =  trim($_POST['Views']);
    $Domain =  trim($_POST['Domain']);
    $PeriodFrom =  trim($_POST['PeriodFrom']);
    $PeriodUntil =  trim($_POST['PeriodUntil']);
    
    $strSQL = "INSERT INTO `st-clients-statistic` (Name, Password, Phone, Email, Budget, Interest, Visitors, Views, Domain, PeriodFrom, PeriodUntil) 
               VALUES('$Name', '$Password', '$Phone', '$Email', '$Budget', '$Interest', '$Visitors', '$Views', '$Domain', '$PeriodFrom', '$PeriodUntil')"; 
    
    	mysql_query($strSQL); 
    	header("Refresh: $sec; url=$page");
}
if($ID=$_GET['delete']){
    $strSQL = "DELETE FROM `st-clients-statistic` WHERE id = '$ID'";
    	mysql_query($strSQL);
    	header("Refresh: $sec; url=$page");
}
/* Show me all post from base */
$result = mysql_query("SELECT * from `st-clients-statistic` ORDER BY id DESC");
 while ($row = mysql_fetch_assoc($result))
{
echo 
"<div class=\"info-left-position\">
    <div class=\"info-blocks left-position\">
        <span class=\"textInfo\"> <b>id:</b> "                  .$row['id']."<br></span>
        <span class=\"textInfo\"> <b>Name:</b>"                 .$row['Name']."<br></span>
        <span class=\"textInfo\"> <b>Password:</b>"             .$row['Password']."<br></span>
        <span class=\"textInfo\"> <b>Phone:</b>"                .$row['Phone']."<br></span>
        <span class=\"textInfo\"> <b>Email:</b>"                .$row['Email']."<br></span>
        <span class=\"textInfo\"> <b>Budget: </b>"              .$row['Budget']."<br></span>
        <span class=\"textInfo\"> <b>Interest:</b>"             .$row['Interest']."<br></span>
        <span class=\"textInfo\"> <b>Visitors: </b>"            .$row['Visitors']."<br></span>
        <span class=\"textInfo\"> <b>Views:</b>"                .$row['Views']."<br></span>
        <span class=\"textInfo\"> <b>Domain:</b>"               .$row['Domain']."<br></span>
        <span class=\"textInfo\"> <b>PeriodFrom:</b>"           .$row['PeriodFrom']."<br></span>
        <span class=\"textInfo\"> <b>PeriodUntil:</b>"          .$row['PeriodUntil']."<br></span>
    </div>
</div>";
}
$result2 = mysql_query("SELECT * FROM `st-visitors` ORDER BY `date` DESC");
 while ($row2 = mysql_fetch_assoc($result2))
{
echo 
"<div class=\"info-right-position\">
    <div class=\"info-blocks right-position\">
        <span class=\"textInfo\"> <b>id:</b> "                  .$row2['id']."<br></span>
        <span class=\"textInfo\"> <b>Date:</b>"                 .$row2['date']."<br></span>
        <span class=\"textInfo\"> <b>Hosts:</b>"             .$row2['hosts']."<br></span>
        <span class=\"textInfo\"> <b>Views:</b>"                .$row2['views']."<br></span>
        <span class=\"textInfo\"> <b>Domain:</b>"                .$row2['domain']."<br></span>
        <span class=\"textInfo\"> <b>Link: </b>"              .$row2['link']."<br></span>
        <span class=\"textInfo\"> <b>Ip:</b>"             .$row2['ip_address']."<br></span>
    </div>
</div>";
}
mysql_close($db_ad);
?>
</noindex>
</body>
</html>