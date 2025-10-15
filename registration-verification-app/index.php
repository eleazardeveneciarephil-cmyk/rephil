
<?php include('supabase.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Employee Registration</h2>
<form method="POST" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Full Name" required><br>
  <input type="text" name="code" placeholder="Employee Code" required><br>
  <input type="file" name="photo" accept="image/*" required><br>
  <button type="submit" name="register">Register</button>
</form>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $photo = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    $photo_url = $photo;
    $result = insertUser($name, $code, $photo_url);
    echo "<p>Registered Successfully!</p>";
}
?>
</body>
</html>
