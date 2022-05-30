<?php
require_once "Restapi.php";
$mhs = new Mahasiswa();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id_barang"]))
         {
            $id=intval($_GET["id_barang"]);
            $mhs->get_barang($id);

         }
         else
         {
            $mhs->get_barangs();
         }
         break;
         case 'GET':
               if(!empty($_GET["id_pembeli"]))
               {
                  $id=intval($_GET["id_pembeli"]);
                  $mhs->get_pembeli($id);
               }
               else
               {
                  $mhs->get_pembelis();
               }
               break;

   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $mhs->update_barang($id);
         }
         else
         {
            $mhs->insert_barang();
         }
         break;
   case 'DELETE':
          $id=intval($_GET["id"]);
            $mhs->delete_barang($id);
            break;
   default:
      // Invalid_barang Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
}




?>
