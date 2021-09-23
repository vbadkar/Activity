<?php
require "includes/database.php";
$sql = "SELECT * FROM login";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
session_start();
?>
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
        <div class="logo">
            <h1>Blog<span>$</span></h1>
        </div>
        <ul>
            <li><a href="dashboard.php">Back</a></li>
            <li><a href="includes/logout.php">Logout</a></li>
        </ul>
    </header>
    <div class="manage-posts">
        <div class="admin-manage">
            <ul>
                <li><a href="createpost.php">Manage Posts</a></li>
                <li><a href="banner.php">Manage Banners</a></li>
            </ul>
        </div>
        <div class="main-content">
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="msg <?php echo $_SESSION['type']; ?>">
                    <li><?php echo $_SESSION['message']; ?></li>
                    <?php
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                    ?>
                </div>
            <?php endif; ?>
            <table class="content-table">
                <thead>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $pid = $row['id'];
                    $sql = "SELECT * FROM login";
                    $result = mysqli_query($con, $sql);
                    $i = 0;
                    if (mysqli_num_rows($result) > $i) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><a href="deleteuser.php?del_id=<?php echo  $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this?')">Delete</a></td>
                            </tr>
                        <?php
                            $i = $i + 1;
                        }
                    } else {
                        ?>
                        <tr>
                            <th colspan="2">No results to display</th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>