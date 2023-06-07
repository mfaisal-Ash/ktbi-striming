 <!--css tailwind-->
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<article>
  <div id="form" style="text-align:center">
    <form method="post" action="" className="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
      <div className="mb-4 flex flex-col gap-6">
      <div className="relative h-11 w-full min-w-[200px]">
      <p>Masukkan Kata :</p>
      <input type="text" name="kata" id="kata" size="100" class="flex-1 mr-2 p-2 border border-white-400 text-grey rounded" placeholder="contoh: menyanyikan"
        value="<?php if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
      <br />
      <button type="submit" name="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-green-500 middle none center rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-grey-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
      data-ripple-light="true">Mencari</button>
    </form>
    <br />

    <?php 
    $teksAsli = '';
    $striming = '';

    if(isset($_POST['kata'])){
      $teksAsli = $_POST['kata'];
      $striming = striming($teksAsli);
    ?> 

    <div class="w-50 max-w-screen-lg sm:w-80 bg-white rounded-lg shadow-md p-8">
      <h2 class="text-xl font-bold mb-4">Hasil Pencarian</h2>
      <div class="mb-4">
        <p class="font-semibold">Teks Asli:</p>
        <p><?php echo $teksAsli; ?></p>
      </div>
      <div>
        <p class="font-semibold">Kata Dasar:</p>
        <p><?php echo $striming; ?></p>
      </div>
    </div>

    <?php } ?>

  </div>
</article>