<?php

// Function to check if a word exists in the dictionary table
function checkKamus($kata)
{
  include "connection.php";
  error_reporting(0);
  $sql = mysqli_query($conn, "SELECT * FROM dictionary WHERE word = '" . $kata . "' LIMIT 1");
  $result = mysqli_num_rows($sql);

  if ($result == 1) {
    return true; // True if found
  } else {
    return false; // False if not found
  }
}

// Function to remove inflection suffixes such as -ku, -mu, -kah, etc.
function Del_Inflection_Suffixes($kata)
{
  $kataAsal = $kata;

  if (preg_match('/([km]u|nya|[kl]ah|pun)\z/i', $kata)) { // Check Inflection Suffixes
    $__kata = preg_replace('/([km]u|nya|[kl]ah|pun)\z/i', '', $kata);

    return $__kata;
  }
  return $kataAsal;
}

// Check Prefix Disallowed Sufixes (Combination of Prefixes and Suffixes that are not allowed)
function Cek_Prefix_Disallowed_Sufixes($kata)
{

  if (preg_match('/^(be)[[:alpha:]]+/(i)\z/i', $kata)) { // be- and -i
    return true;
  }

  if (preg_match('/^(se)[[:alpha:]]+/(i|kan)\z/i', $kata)) { // se- and -i, -kan
    return true;
  }

  if (preg_match('/^(di)[[:alpha:]]+/(an)\z/i', $kata)) { // di- and -an
    return true;
  }

  if (preg_match('/^(me)[[:alpha:]]+/(an)\z/i', $kata)) { // me- and -an
    return true;
  }

  if (preg_match('/^(ke)[[:alpha:]]+/(i|kan)\z/i', $kata)) { // ke- and -i, -kan
    return true;
  }
  return false;
}

// Remove Derivation Suffixes ("-i", "-an" or "-kan")
function Del_Derivation_Suffixes($kata)
{
  $kataAsal = $kata;
  if (preg_match('/(i|an)\z/i', $kata)) { // Check Suffixes
    $__kata = preg_replace('/(i|an)\z/i', '', $kata);
    if (checkKamus($__kata)) { // Check Dictionary
      return $__kata;
    } else if (preg_match('/(kan)\z/i', $kata)) {
      $__kata = preg_replace('/(kan)\z/i', '', $kata);
      if (checkKamus($__kata)) {
        return $__kata;
      }
    }
    /*– If not found in the dictionary –*/
  }
  return $kataAsal;
}

// Remove Derivation Prefix ("di-", "ke-", "se-", "te-", "be-", "me-", or "pe-")
function Del_Derivation_Prefix($kata)
{
  $kataAsal = $kata;

  /* —— Determine Prefix Type ————*/
  if (preg_match('/^(di|[ks]e)/', $kata)) { // If di-, ke-, se-
    $__kata = preg_replace('/^(di|[ks]e)/', '', $kata);

    if (checkKamus($__kata)) {
      return $__kata;
    }

    $__kata__ = Del_Derivation_Suffixes($__kata);

    if (checkKamus($__kata__)) {
      return $__kata__;
    }

    if (preg_match('/^(diper)/', $kata)) { //diper-
      $__kata = preg_replace('/^(diper)/', '', $kata);
      $__kata__ = Del_Derivation_Suffixes($__kata);

      if (checkKamus($__kata__)) {
        return $__kata__;
      }
    }

    if (preg_match('/^(ke[bt]er)/', $kata)) {  //keber- and keter-
      $__kata = preg_replace('/^(ke[bt]er)/', '', $kata);
      $__kata__ = Del_Derivation_Suffixes($__kata);

      if (checkKamus($__kata__)) {
        return $__kata__;
      }
    }
  }

  if (preg_match('/^([bt]e)/', $kata)) { // If the prefix is "te-", "ter-", "be-", "ber-"

    $__kata = preg_replace('/^([bt]e)/', '', $kata);
    if (checkKamus($__kata)) {
      return $__kata; // If found, return the word
    }

    $__kata = preg_replace('/^([bt]e[lr])/', '', $kata);
    if (checkKamus($__kata)) {
      return $__kata; // If found, return the word
    }

    $__kata__ = Del_Derivation_Suffixes($__kata);
    if (checkKamus($__kata__)) {
      return $__kata__;
    }
  }

  if (preg_match('/^([mp]e)/', $kata)) {
    $__kata = preg_replace('/^([mp]e)/', '', $kata);
    if (checkKamus($__kata)) {
      return $__kata; // If found, return the word
    }
    $__kata__ = Del_Derivation_Suffixes($__kata);
    if (checkKamus($__kata__)) {
      return $__kata__;
    }

    if (preg_match('/^(memper)/', $kata)) {
      $__kata = preg_replace('/^(memper)/', '', $kata);
      if (checkKamus($kata)) {
        return $__kata;
      }
      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }
    }

    if (preg_match('/^([mp]eng)/', $kata)) {
      $__kata = preg_replace('/^([mp]eng)/', '', $kata);
      if (checkKamus($__kata)) {
        return $__kata; // If found, return the word
      }
      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }

      $__kata = preg_replace('/^([mp]eng)/', 'k', $kata);
      if (checkKamus($__kata)) {
        return $__kata; // If found, return the word
      }
      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }
    }

    if (preg_match('/^([mp]eny)/', $kata)) {
      $__kata = preg_replace('/^([mp]eny)/', 's', $kata);
      if (checkKamus($__kata)) {
        return $__kata; // If found, return the word
      }
      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }
    }

    if (preg_match('/^([mp]e[lr])/', $kata)) {
      $__kata = preg_replace('/^([mp]e[lr])/', '', $kata);
      if (checkKamus($__kata)) {
        return $__kata; // If found, return the word
      }
      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }
    }

    if (preg_match('/^([mp]en)/', $kata)) {
      $__kata = preg_replace('/^([mp]en)/', 't', $kata);
      if (checkKamus($__kata)) {
        return $__kata; // If found, return the word
      }
      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }

      $__kata = preg_replace('/^([mp]en)/', '', $kata);
      if (checkKamus($__kata)) {
        return $__kata; // If found, return the word
      }
      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }
    }

    if (preg_match('/^([mp]em)/', $kata)) {
      $__kata = preg_replace('/^([mp]em)/', '', $kata);
      if (checkKamus($__kata)) {
        return $__kata; // If found, return the word
      }
      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }

      $__kata = preg_replace('/^([mp]em)/', 'p', $kata);
      if (checkKamus($__kata)) {
        return $__kata; // If found, return the word
      }

      $__kata__ = Del_Derivation_Suffixes($__kata);
      if (checkKamus($__kata__)) {
        return $__kata__;
      }
    }
  }
  return $kataAsal;
}

// fungsi di bawah ini untuk pencarian kaata
function striming($kata)
{
  // Fungsi untuk mencari akar kata menggunakan algoritma String Matching
  $kataAsal = $kata;

  $checkKata = checkKamus($kata);
  if ($checkKata == true) { // Cek Kamus
    return $kata; // Jika Ada maka kata tersebut adalah kata dasar
  } else { 
    $kata = Del_Inflection_Suffixes($kata);
    if (checkKamus($kata)) {
      return $kata;
    }

    $kata = Del_Derivation_Suffixes($kata);
    if (checkKamus($kata)) {
      return $kata;
    }

    $kata = Del_Derivation_Prefix($kata);
    if (checkKamus($kata)) {
      return $kata;
    }
}
}

?>
