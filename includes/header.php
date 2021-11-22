<?php
    require_once "includes/database.php";
    require_once "includes/createpost_validate.php";
    $lang_code = $_COOKIE['lang_code'];
    $sql = "SELECT * FROM languages WHERE langCode = '$lang_code' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['dir'] == 'rtl'){
?>
<html lang="<?php echo $row['langCode']; ?>" dir="<?php echo $row['dir']; ?>">
<?php       }else{ ?>
<html lang="<?php echo $row['langCode']; ?>" dir="<?php echo $row['dir']; ?>">
<?php 
            }
        }
    }

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://test_vozga.com/">
    <link href="includes/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link href="select2-4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="select2-4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/7ed99e45ec.js" crossorigin="anonymous"></script>
</head>

<body style="transform:none">
    <div class="header-wrapper">
        <header>
            <div class='logo'>
                <h3>Vozga</h3>
            </div>
            <div class="search-form">
                <div class="form-toggle">
                    <form action="search.php" method="get">
                        <input class="search-text" type="text" name="search" placeholder="Search" autocomplete="off" autofocus><span class="hide"><i class="fas fa-times"></i></span>
                    </form>
                </div>
                <div class="icon">
                    <span class="show"><i class="fas fa-search" style="color:black; font-size: 14px;font-weight: 600;"></i></span>
                </div>
            </div>

            <img class='hamburger' src='images/hamburger.png' alt='hamburger'></img>
            <ul class='list'>
                <li>
                <?php
                        if(isset($_COOKIE['lang_code']) && $_COOKIE['lang_code']==='en'){
                            $selEN = 'selected';
                        }else{
                            $selHI = 'selected';
                        }
                    ?>
                    <div class="custom-select">
                        <select class= "lang" id="sel_user" onchange="getSelectedValue();">
                        <?php
                        $sql = "SELECT * FROM languages";
                        $result=mysqli_query($con,$sql);
                        $i=0;
                        if(mysqli_num_rows($result) > $i){
                            while($data=mysqli_fetch_assoc($result)){
                        ?>
                            <option value="<?php echo $data['langCode']; ?>" <?php echo $sel;?> ><?php echo $data['lang_name']; ?></option>
                        <?php 
                            }
                        }
                        ?>
                        </select>
                    </div>
                </li>
                </li>
                <li class="sub-list"><a class="links">Category<i class="fas fa-chevron-down" style="color:black; font-size: 14px; font-weight: 600; padding:5px;"></i></a>
                    <ul>
                    <?php 
                            $lang_code = $_COOKIE['lang_code'];
							$sql = "SELECT * FROM categories WHERE lang_code= '$lang_code' ";
							$result = mysqli_query($con, $sql);
							$i = 0;
							if(mysqli_num_rows($result) > $i){
								while($row = mysqli_fetch_assoc($result)){
						?>
                        <li class="catContent"><a href="category/<?php echo $row['cat_name'];?>"><?php echo $row['cat_name'];?></a></li>
						<?php 
								}
							}
						?>
                    </ul>
                </li>
                <?php 
                    if(isset($_COOKIE['cookieuserid'])){
                ?>
                <li><a class="links" href='includes/logout.php'>Logout</a></li>
                <?php
                    }else{
                ?>
                <li><a class="links" href='homepage'>Home</a></li>
                <li><a class="links" href='register'>Register</a></li>
                <li><a class="links" href='login'>Login</a></li>
                <?php
                    }
                ?>
            </ul>
        </header>
    </div>
    <script>
        const button = document.querySelector('.icon');
        const search = document.querySelector('.form-toggle');
        const navBar = document.querySelector('.list');
        const hideBtn = document.querySelector('.hide');
        button.onclick = function() {
            search.classList.remove('inactive');
            search.classList.toggle('active');
            navBar.classList.toggle('inactive');
            navBar.classList.remove('active');
        }
        hideBtn.onclick = function() {
            search.classList.remove('active');
            search.classList.toggle('inactive');
            navBar.classList.toggle('active');
            navBar.classList.remove('inactive');
        }
    </script>
    
    <script src='script.js'></script>
    <script src='select2.js'></script>
    <script src='langauge_switch.js'></script>      