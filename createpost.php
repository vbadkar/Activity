<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<title>Create Post</title>
    <div class="create_post">
        <form action="includes/createpost_validate.php" method="post">
            <input type="text" name="title" placeholder="Title">
            <input type="text" name="desc" placeholder="Description">
            <select name="category">
                <option value="cat">Select a category</option>
                <option value="Food">Food</option>
                <option value="Sports">Sports</option>
                <option value="Music">Music</option>
                <option value="Gymnastics">Gymnastics</option>
                <option value="Travel">Travel</option>
            </select>
            <input type="file" accept="image/*" name="image_file">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
