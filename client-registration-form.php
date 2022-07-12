<html>
    <head>
        <meta charset="UTF-8">
        <title> Stats: Registration For Clients </title>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" content="width=device-width, scale=1">
        <style>
            body{
                background: #505163;
            }
            .container{
                text-align:center;
                width: 500px;
                margin: 0px auto;
            }
            .container h4,h3,p{
                background:#FFDDDD;
                text-align:center;
                padding:6px;
            }
            .form-registration-client{
                width:200px;
                margin:0px auto;
            }
            .form-registration-client input,button{
                width: 200px;
                border: 2px solid #212025;
                background: #313038;
                padding: 20px 18px;
                margin: 5px;
                color: #fff;
                cursor:pointer;
                text-align: center;
            }
        </style>
    </head>
<body>
<noindex>
    <?php include('core/users-registration.php'); ?>
    <!-- $validationResult - can be different depend on the state of registration -->
    <div class="container"> <h4><?php echo $validationResult; ?></h4>
        <h3>Phone: 8-12 numbers; Password: 8 and more characters;</h3>
        <p><a href="/">Homepage</a></p>
        <form class="form-registration-client" role="form" action="" method="post">
            <input type="text" class="form-control" name="Phone" placeholder="phone">
            <input type="password" class="form-control" name="Password" placeholder="password">
            <button id="btn" type="submit" name="client-login">Log In</button>
        </form>
    </div>
</noindex>
</body>
</html>