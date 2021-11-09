<?php 
    require_once "includes/header.php"; 
    
?>
    <title>Languages</title>
    <div class="language-content">
        <div class="language-table">
            <table>
                <thead>
                    <th>Sr. No.</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Operations</th>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM languages";
                        $res = mysqli_query($con, $query);
                        if(mysqli_num_rows($res) > 0){
                            while($row = mysqli_fetch_assoc($res)){  
                                $id = $_GET['id'];
                                $sql = "SELECT lang_code, dup_id, p_id FROM posts WHERE p_id = '$id' ";
                                $result = mysqli_query($con, $sql);
                                
                                if(mysqli_num_rows($result) > 0){
                                    while($data = mysqli_fetch_assoc($result)){  
                                    
                    ?>
                    <?php
                        if($row['langCode'] == $data['lang_code'] && $data['p_id'] == $data['dup_id']){
                    ?>
                    <tr>
                        <td><?php echo $row['lang_id']; ?></td>
                        <td><?php echo $row['lang_name']; ?></td>
                        <td><?php echo $data['lang_code']; ?></td>
                        <td>Edit</td>
                    </tr>
                    <?php
                            }else{
                        ?>
                        <tr>
                        <td><?php echo $row['lang_id']; ?></td>
                        <td><?php echo $row['lang_name']; ?></td>
                        <td><?php echo $data['lang_code']; ?></td>
                        <td>Add</td>
                    </tr>

                        <?php
                            }
                            
                        ?>
                    <?php
                                    }
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require_once "includes/footer1.php"; ?>