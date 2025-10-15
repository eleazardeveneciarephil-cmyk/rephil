
<?php include('supabase.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Verify Attendance</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Verify Employee</h2>
<form method="POST">
  <input type="text" name="code" placeholder="Enter Employee Code" required><br>
  <button type="submit" name="verify">Verify</button>
</form>

<?php
if (isset($_POST['verify'])) {
    $code = $_POST['code'];
    $user = verifyUser($code);
    if (!empty($user)) {
        echo "<h3>Verified!</h3>";
        echo "<p>Name: ".$user[0]['name']."</p>";
        echo "<img src='".$user[0]['photo_url']."' width='150'>";
    } else {
        echo "<p style='color:red;'>Code not found!</p>";
    }
}
?>
</body>
</html>
