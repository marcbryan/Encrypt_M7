<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
      input {
        display: block;
      }
      p {
        width: 25%;
        padding: 5px;
      }
      .success {
        background-color: lightgreen;
      }
      .fail {
        background-color: darksalmon;
      }
    </style>
  </head>
  <body>
    <h2>Login</h2>
    <form action="index.php" method="post">
      <input type="text" name="username">
      <input type="password" name="password">
      <input type="submit" name="submit" value="Iniciar sesión">
    </form>
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
          echo "<p class='success'>OK</p>";
        } else {
          echo "<p class='fail'>KO</p>";
        }
      }
     ?>
  </body>
</html>
