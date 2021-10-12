<?php 

    require "includes/header.php";
    require "includes/database.php";
    session_start();
    if(isset($_POST['submit'])){
        $image=$_POST['image_file'];
        $sql="INSERT INTO banners (image) VALUES ('$image')";
        $stmt=mysqli_stmt_init($con);
        if(empty($image))
        {
            $_SESSION['message']="Fields are blank";
            $_SESSION['type']="error";
            header("Location: dashboard.php?error=emptyfields");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $image);
            mysqli_stmt_store_result($stmt);
            $count = mysqli_stmt_num_rows($stmt);
            if ($count > 0) {
                $_SESSION['message'] = "Image already exists";
                $_SESSION['type'] = "error";
                header("Location: banner.php?error=imagealreadyexists");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "s", $image);
            mysqli_stmt_execute($stmt);
            $_SESSION['message'] = "Banner added";
            $_SESSION['type'] = "success";
            header("Location: banner.php?success=banneradded");
            $msg = "Banner added";
            exit();
        }
    }

?>
    <div class="manage-posts-banner">
            <div class="banner-manage">
                <ul>
                    <li><a href="createpost.php">Manage Posts</a></li>
                    <li><a href="manageuser.php">Manage Users</a></li>
                </ul>
            </div>

        <div class="file-wrapper">
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="msg <?php echo $_SESSION['type']; ?>">
                    <li><?php echo $_SESSION['message']; ?></li>
                    <?php
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                    ?>
                </div>
            <?php endif; ?>
            <h1>Manage Banners</h1>
            <div class="file-input">
                <form action="banner.php" method="post">
                    <p><input class="image-input" type="file" accept="image/*" name="image_file"></p>
                    <button class="banner-button" type="submit" name="submit">Add Banner</button>
                </form>
            </div>
        </div>
        <div class="main-content-banner">
            <?php
            $sql = "SELECT * FROM banners ORDER BY image ASC";
            $result = mysqli_query($con, $sql);
            $i = 0;
            if (mysqli_num_rows($result) > $i) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $input_image = "images/" . $row['image'];
                    $output_image = "images/resized/" . $row['image'];
                    $width = 380;
                    $height = 220;
                    $resource = imagecreatefromjpeg($input_image);
                    $scaled = imagescale($resource, $width, $height);
                    imagejpeg($scaled, $output_image);
            ?>
                    <div class="admin-display-wrapper">
                        <div class="admin-display">
                            <ul>
                                <li>
                                    <img src="<?php echo $output_image; ?>" alt="" class="r-image">
                                </li>
                                <li>
                                    <a href="deletebanner.php?del_id=<?php echo  $row['b_id']; ?>" onclick="return confirm('Are you sure you want to delete this?')" class="delete-banner">Delete</a>
                                </li>
                            </ul>


                        </div>
                    </div>

                <?php $i = $i + 1;
                }
            } else { ?>
                <tr>
                    <th colspan="2">No results to display</th>
                </tr>
            <?php } ?>
        </div>
    </div>
</body>

</html>