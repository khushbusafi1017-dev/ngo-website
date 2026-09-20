<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container p-4">
<?php include 'db.php'; ?>
<h1>Media - NGO</h1>
<p>Welcome to our media page. Here you will find our press releases and coverage.</p>

<h2>Press Releases</h2>
<?php
$res = mysqli_query($conn, "SELECT * FROM press_releases ORDER BY release_date DESC");
while($row = mysqli_fetch_assoc($res)){
  echo "<b>".$row['title']."</b> (".$row['release_date'].")<br>".$row['description']."<hr>";
}
?>

<h2>Media Coverage</h2>
<?php
$res = mysqli_query($conn, "SELECT * FROM media_coverage");
while($row = mysqli_fetch_assoc($res)){
  echo $row['title']." - <a href='".$row['url']."' target='_blank'>Read More</a><br>";
}
?>

<h2>Image Gallery</h2>
<?php
$res = mysqli_query($conn, "SELECT * FROM image_gallery");
while($row = mysqli_fetch_assoc($res)){
  echo "<img src='uploads/".$row['image_path']."' width='200' style='margin:10px'>";
}
?>

<h2>Videos</h2>
<?php
$res = mysqli_query($conn, "SELECT * FROM videos");
while($row = mysqli_fetch_assoc($res)){
  $url = $row['video_url'];
  // watch?v= ko embed/ me badal do
  $url = str_replace("watch?v=", "embed/", $url);
  $url = str_replace("youtu.be/", "www.youtube.com/embed/", $url);
  
  echo "<p>".$row['description']."</p>";
  echo "<iframe width='300' height='200' src='".$url."' allowfullscreen></iframe><br><br>";
}
?>
<h3>Contact for Media</h3>
<p>Email: media@ngo.org</p>
</body>
</html>