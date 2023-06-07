<!DOCTYPE html>
<html lang="en">

<?php
  require_once('stemming.php');
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ktbi-Striming</title>
  <link rel="stylesheet" href="style.css">
      <!--css tailwind-->
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

  <header class="header">
    <h1>Pencarian Kata Bahasa Indonesia</h1>
    <p>Menggunakan algoritma string matching PHP dan MySQL</p>
  </header>

  <nav class="navbar">
    <ul>
      <li class="utama"><a href="/"></a></li>
      <li class="utama"><a href="/"></a></li>
    </ul>
  </nav>

  <main class="main">

    <div class="content">
      <?php
        if (isset($_GET['/'])) {
          $pageload=$_GET['/'];
        }else{
          $pageload="/";
        }
        switch ($pageload) {
          case 'view':
            include "view.php";
            break;
          default:
            include "home.php";
            break;
        }
      ?>
    </div>
    
  </main>

  <footer class="footer">
    <p>Copyright &copy 2023</p>
  </footer>

</body>

</html>