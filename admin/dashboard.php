<?php
include '../db.php';
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit; }

// Press Release Add
if(isset($_POST['add_press'])){
  $t=$_POST['title']; $d=$_POST['desc']; $dt=$_POST['date'];
  mysqli_query($conn, "INSERT INTO press_releases(title,description,release_date) VALUES('$t','$d','$dt')");
}

// Media Coverage Add
if(isset($_POST['add_media'])){
  $t=$_POST['title']; $u=$_POST['url'];
  mysqli_query($conn, "INSERT INTO media_coverage(title,url) VALUES('$t','$u')");
}
?>
<h2>Manage Media Page</h2>

<h3>1. Press Release Add Karo</h3>
<form method="POST">
Title: <input type="text" name="title" required><br>
Date: <input type="date" name="date" required><br>
Desc: <textarea name="desc"></textarea><br>
<button name="add_press">Add</button>
</form>
<hr>

<h3>2. Media Coverage Add Karo</h3>
<form method="POST">
Title: <input type="text" name="title" required><br>
URL: <input type="text" name="url" required><br>
<button name="add_media">Add</button>
</form>
<hr>

<?php
// Image Upload
if(isset($_POST['add_image'])){
  $desc = $_POST['img_desc'];
  $name = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  move_uploaded_file($tmp, "../uploads/".$name);
  mysqli_query($conn, "INSERT INTO image_gallery(image_path, description) VALUES('$name','$desc')");
}

// Video Add
if(isset($_POST['add_video'])){
  $url = $_POST['video_url'];
  $desc = $_POST['video_desc'];
  mysqli_query($conn, "INSERT INTO videos(video_url, description) VALUES('$url','$desc')");
}
?>

<h3>3. Image Gallery - Image Upload Karo</h3>
<form method="POST" enctype="multipart/form-data">
Image: <input type="file" name="image" required><br>
Description: <input type="text" name="img_desc"><br>
<button name="add_image">Upload Image</button>
</form>
<hr>

<h3>4. Video Add Karo</h3>
<form method="POST">
YouTube URL: <input type="text" name="video_url" placeholder="https://youtube.com/..." required><br>
Description: <input type="text" name="video_desc"><br>
<button name="add_video">Add Video</button>
</form>

<a href="logout.php">Logout</a>