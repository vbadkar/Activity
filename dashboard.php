<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="includes/style.css" rel="stylesheet" type="text/css" />
    <title>Dashboard</title>
</head>
<body>
<header>
        <nav>
                <h1><a href="homepage.php">Logo here</a></h1>
            <ul>
                <li><a href="createpost.php">Create</a></li>
                <li><a href="includes/editpost.php">Edit</a></li>
                <li><a href="includes/deletepost.php">Delete</a></li>
                <ul>
                    <li> Username 
                        <?php
                            //include_once "includes/login_validate.php";  
                            //echo $user; 
                        ?>
                    </li>
                    <li><a href="includes/logout.php">Logout</a></li>
                </ul>
            </ul>
        </nav>
    </header>
</body>
</html>