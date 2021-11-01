<?php
    require_once "includes/header.php";
?>
<title>Add Category</title>
    <div class="register-form">
        <?php if(isset($_SESSION['message'])):?>
            <div class="msg <?php echo $_SESSION['type'];?>">
                <li><?php echo $_SESSION['message'];?></li>
                <?php 
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                ?>
            </div>
        <?php endif;?>
        <form action='includes/add-category-inc.php' method='post'>
            <h1 class="register-title">Add Category</h1>
            <input class="text-input" type='text' name='category' placeholder='Enter a category' autocomplete='off'>
            <input type='hidden' name='lang_code' value="en">
            <button class="register-button" type='submit' name='submit'>Add</button>
        </form>
    </div>
    <div class="category-list">
        <table>
            <tr>
                <th>Sr. No</th>
                <th>Category</th>
                <th>Operations</th>
            </tr>
            <?php 
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($con, $sql);
                $i = 0;
                if(mysqli_num_rows($result)>$i){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['cat_id'];?></td>
                <td><?php echo $row['cat_name'];?></td>
                <td>Edit</td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>
<?php
    require_once "includes/footer2.php";
?>