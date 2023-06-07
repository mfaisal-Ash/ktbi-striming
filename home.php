 <!--css tailwind-->
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<article>
  <div id="form"  class="auto-screen flex flex-col items-center justify-center">
    <form method="post" action="" class="mt-8 mb-2 w-50 max-w-screen-lg sm:w-80">
      <div class="mb-8 flex flex-col gap-2">
        <div class="relative h-11 w-full min-w-[150px]">
      <p>Masukkan Kata :</p>
      <input type="text" name="kata" id="kata" size="100" class="flex-2 mr-4 p-3 border border-white-600 text-grey rounded" placeholder="contoh: menyanyikan"
        value="<?php if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
      <br />
      <button type="submit" name="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-green-500 middle none center rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-grey-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
      data-ripple-light="true">Mencari</button>
        </div>
    </div>
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