 <!--css tailwind-->
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<article>
  <div id="form" style="text-align:center">
    <form method="post" action="">
      <p>Masukkan Kata :</p>
      <input type="text" name="kata" id="kata" size="100" placeholder="....."
        value="<?php if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
      <br />
      <button type="submit" name="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-green-500">Submit</button>
    </form>
    <br />
    <?php 
    if(isset($_POST['kata'])){
      $teksAsli = $_POST['kata'];
      echo "<p>teks asli : " .$teksAsli. "</p>";
      $striming = striming($teksAsli);
      echo "<p>kata dasar : <b>" .$striming. "</b></p>";
      }
    ?>
  </div>
</article>