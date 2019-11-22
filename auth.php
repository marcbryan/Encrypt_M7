<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Authentication</title>
  </head>
  <body>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["username"]) and isset($_POST["password"])) {
        $hostname = "localhost";
        $dbname = "M7";
        $username = "admin";
        $pw = "@dmIn123";
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $pw);

        $_username = $_POST["username"];
        $_password = hash("sha256", $_POST["password"]);
        $query = $pdo->prepare("SELECT * FROM usuarios WHERE username = '$_username' and password = '$_password'");
        $query -> execute();
        $row = $query -> fetch();
        if ($row !== false) {
          echo "<p>OK</p>";
        } else {
          echo "<p>KO</p>";
        }
      }
     ?>
  </body>
</html>
