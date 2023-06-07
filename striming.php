<?php
// Fungsi untuk mencocokkan kata dalam tabel dictionary
function checkKamus($kata)
{
  include "connection.php";
  error_reporting(0);
  $sql = mysqli_query($conn, "SELECT * FROM dictionary WHERE word = '" . $kata . "' LIMIT 1");
  $result = mysqli_num_rows($sql);

  if ($result == 1) {
    return true; // True jika ada
  } else {
    return false; // jika tidak ada FALSE
  }
}

// Fungsi untuk mencari akar kata menggunakan algoritma string matching
function striming($kata)
{
  include "connection.php";
  $kataAsal = $kata;

  $cekKata = checkKamus($kata);
  if ($cekKata == true) { // Cek Kamus
    return $kata; // Jika Ada maka kata tersebut adalah kata dasar
  } else { // Jika tidak ada dalam kamus maka dilakukan pencarian menggunakan Algoritma String Matching
    $result = mysqli_query($conn, "SELECT word FROM dictionary");
    $kataDasar = "";

    while ($row = mysqli_fetch_array($result)) {
      similar_text($kata, $row['word'], $percent);

      if ($percent > 80) { // Menggunakan threshold persentase 80%
        $kataDasar = $row['word'];
        break;
      }
    }

    if (!empty($kataDasar)) {
      return $kataDasar;
    } else {
      return $kataAsal;
    }
  }
}
?>
