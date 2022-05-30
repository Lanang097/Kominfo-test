<?php
require_once "conn.php";
class Mahasiswa
{

   public  function get_mhss()
   {
      global $mysqli;
      $query="SELECT * FROM barang";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 0,
                     'message' =>'jika success:0 = Berhasil Mengambil Data,
		                                jika success:1 = Gagal Mengambil data,.',
                     'payload' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   public function get_mhs($id)
   {
      global $mysqli;
      $query="SELECT * FROM barang";
      if($id != 0)
      {
         $query.=" WHERE id_barang= $id LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Mahasiswa Successfully.',
                     'payload' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);

   }

   public function insert_mhs()
      {
         global $mysqli;
         $arrcheckpost = array('id_barang' => '', 'nama_barang' => '', 'harga' => '', 'stok' => '', 'id_supplier'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){

               $result = mysqli_query($mysqli, "INSERT INTO barang SET
               id_barang = '$_POST[id_barang]',
               nama_barang = '$_POST[nama_barang]',
               harga = '$_POST[harga]',
               stok = '$_POST[stok]',
               id_supplier = '$_POST[id_supplier]'");

               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Mahasiswa Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Mahasiswa Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

   function update_mhs($id_barang)
      {
         global $mysqli;
         $arrcheckpost = array('id_barang' => '', 'nama_barang' => '', 'harga' => '', 'stok' => '', 'id_supplier'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){

              $result = mysqli_query($mysqli, "UPDATE barang SET
              id_barang = '$_POST[id_barang]',
              nama_barang= '$_POST[nama_barang]',
              harga = '$_POST[harga]',
              stok = '$_POST[stok]',
              id_supplier = '$_POST[id_supplier]'
              WHERE id='$id_barang'");

            if($result)
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Mahasiswa Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Mahasiswa Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 1,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

   function delete_mhs($id_barang)
   {
      global $mysqli;
      $query="DELETE FROM barang WHERE id_barang=".$id_barang;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Mahasiswa Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Mahasiswa Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}

 ?>
