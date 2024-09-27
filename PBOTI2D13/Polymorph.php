<!DOCTYPE html>
<html>

<head>
   <title>PBO2-TI2D230202085</title>
</head>

<body>

   <h1>Polymorph</h1>

   <form method="post">

      <!-- Label untuk angka pertama -->
      <label>Angka Pertama :</label>
      <input type="number" name="fint"><br><br>

      <!-- Label untuk angka kedua -->
      <label>Angka Terakhir :</label>
      <input type="number" name="lint"><br><br>

      <!-- Tombol submit -->
      <input type="submit" name="submit" value="Submit">
   </form>

   <?php
   // Kondisi apabila tombol submit di jalankan
   if (isset($_POST['submit'])) {

      // Abstract class Hitung
      abstract class Hitung {
         protected $a;
         protected $b;
         
         // Pemberian nilai awal terhadap properti a dan b
         public function __construct($a, $b) {
            $this->a = $a;
            $this->b = $b;
         }

         abstract public function hitung();
      }

      // Subclass Penjumlahan
      class Penjumlahan extends Hitung {
         
         // overriding method pada subclass
         public function hitung() {
            return $this->a + $this->b;
         }
      }

      // Subclass Pengurangan
      class Pengurangan extends Hitung {
         
         // overriding method pada subclass
         public function hitung() {
            return $this->a - $this->b;
         }
      }

      // Subclass Perkalian
      class Perkalian extends Hitung {

         // overriding method pada subclass
         public function hitung() {
            return $this->a * $this->b;
         }
      }

      // Subclass Pembagian
      class Pembagian extends Hitung {

         // overriding method pada subclass
         public function hitung() {
            if ($this->b != 0) {
               return $this->a / $this->b;
            } else {
               return "Tidak terdefinisi";
            }
         }
      }

      // Ambil input dari form
      $fint = $_POST['fint'];
      $lint = $_POST['lint'];

      // Instansiasi kelas
      $operasi = [
         new Penjumlahan($fint, $lint),
         new Pengurangan($fint, $lint),
         new Perkalian($fint, $lint),
         new Pembagian($fint, $lint)
      ];

      // Menampilkan output
      foreach ($operasi as $op) {
         echo "Operasi : " . get_class($op) . "=>(".$fint." ".$lint.")<br>";
         echo "Hasil : " . $op->hitung() . "<br>";
      }
   }
   ?>

</body>

</html>