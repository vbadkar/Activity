<?php
    require_once "includes/header.php";
    require "includes/database.php";
?>
<div class="displayLanguage">
    <table>
        <tr>
            <th>Sr. NO</th>
            <th>Language</th>
            <th>Code</th>
            <th>Operations</th>
        </tr>
        <?php 
            $sql = "SELECT * FROM languages";
            $result = mysqli_query($con, $sql);
            $i=0;
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){?>
                <tr>
            <td><?php echo $row['lang_id'];?></td>
            <td><?php echo $row['lang_name'];?></td>
            <td><?php echo $row['lang_code'];?></td>
            <td>Edit</td>
        </tr>
        <?php   }
            }
        ?>
    </table>
</div>
<?php
    require_once "includes/footer1.php";
?>