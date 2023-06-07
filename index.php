<!DOCTYPE html>
<html lang="en">

<?php
  require_once('striming.php');
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ktbi-Striming</title>
  <link rel="stylesheet" href="style.css">
      <!--css material tailwind, tailwind dan js-->
      <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"/>
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
      <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>
</head>

<body>
  <div class="container mx-auto flex flex-col items-center justify-center">
  <header class="header">
    <h1>Pencarian Kata Bahasa Indonesia</h1>
    <p>Menggunakan algoritma string matching PHP dan MySQL</p>
  

  <nav class="navbar">
    <ul>
      <li class="utama"><a href="/"></a></li>
    </ul>
    
  </nav>
  </header>
  <main class="main">

    <div class="content">
    <div class="mb-8 flex flex-col gap-2">
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
    </div>
    
  </main>

  <div class="footer ">
  <footer class="w-full bg-grey p-8">
    <p class="block text-center font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">Copyright &copy 2023</p>
  </footer>
  </div>
  </div>

</body>

</html>