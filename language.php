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
                                $code = $row['langCode'];
                                $lang_code = array($row['langCode']);
                                $sql = "SELECT lang_code, p_id, dup_id FROM posts WHERE dup_id = '$id' AND lang_code = '$code'";
                                $result = mysqli_query($con, $sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                        $langCode = array($data['lang_code']);
                                    }
                                }
                                    
                    ?>
                    <?php
                        for($i = 0; $i < sizeof($lang_code); $i++){
                            if($row['langCode'] == $langCode[$i]){
                    ?>
                    <tr>
                        <td><?php echo $row['lang_id']; ?></td>
                        <td><?php echo $row['lang_name']; ?></td>
                        <td><?php echo $row['langCode']; ?></td>
                        <td><a href="translate.php?id=<?php echo $id; ?>&&langCode=<?php echo $row['langCode']; ?>">Edit</a></td>
                    </tr>
                    <?php
                            }else{
                        ?>
                        <tr>
                        <td><?php echo $row['lang_id']; ?></td>
                        <td><?php echo $row['lang_name']; ?></td>
                        <td><?php echo $row['langCode']; ?></td>
                        <td><a href="translate.php?id=<?php echo $id; ?>&&langCode=<?php echo $row['langCode']; ?>">Add</a></td>
                    </tr>

                        <?php
                            }
                        }
                            
                        ?>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require_once "includes/footer1.php"; ?>