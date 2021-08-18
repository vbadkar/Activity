<?php 
    require "includes/database.php";
    require "includes/header.php";
    $id=$_GET['id'];
    $sql = "SELECT * FROM posts WHERE p_id = $id";
    $result = mysqli_query($con, $sql);
    $post=mysqli_fetch_assoc($result);
    if(isset($_POST['submit']))
    {
        require "database.php";
        $pid=$_POST['p_id'];
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $category=$_POST['category'];
        $image=$_POST['image_file'];
        $sql="UPDATE posts SET title='$title',description='$desc' WHERE p_id = $id";
        $que=mysqli_query($con,$sql);
        $query=mysqli_fetch_assoc($que);
    }
?>
<title>Edit Post</title>
    <div class="edit-form">
        <form action="dashboard.php?dataupdated" method="post">
        <h1 class="form-title">Edit Post</h1> 
            <input class="text-input" type="text" name="title" placeholder="Title" autocomplete='off' value="<?php if(isset($post['title'])){echo $post['title'];}?>">
            <input class="text-input" type="textarea" name="desc" placeholder="Description" autocomplete='off' value="<?php   if(isset($post['description']))
               {
                   echo $post['description'];
               }?>">
            <select class="text-input" name="category">
                <option value="cat">Select a category</option>
                <option value="Food">Food</option>
                <option value="Sports">Sports</option>
                <option value="Music">Music</option>
                <option value="Gymnastics">Gymnastics</option>
                <option value="Travel">Travel</option>
            </select>
            <p><input class="image-input" type="file" accept="image/*" name="image_file" value="<?php echo $post['image'];?>"></p>
            <button class="edit-button" type="submit" name="submit">Update</button>
            <a href="dashboard.php">Back</a>
        </form>
    </div>
<?php
    require "includes/footer.php";
?>
