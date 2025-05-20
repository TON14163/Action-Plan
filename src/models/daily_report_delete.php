<?php 
$deleteSqlList1 = "DELETE FROM tb_storyrival WHERE refid_work = '".$id_work."' ";
$qdeleteSqlList1 = mysqli_query($conn,$deleteSqlList1);

$deleteSqlList2 = "DELETE FROM tb_product_delivery WHERE ref_idwork = '".$id_work."' ";
$qdeleteSqlList2 = mysqli_query($conn,$deleteSqlList2);

$deleteSqlList3 = "DELETE FROM tb_present_booth WHERE ref_idwork = '".$id_work."' ";
$qdeleteSqlList3 = mysqli_query($conn,$deleteSqlList3);

$deleteSqlList4 = "DELETE FROM tb_register_data WHERE id_work = '".$id_work."' ";
$qdeleteSqlList4 = mysqli_query($conn,$deleteSqlList4);

$deleteSqlList5 = "DELETE FROM tb_regist_realtime WHERE id_work = '".$id_work."' ";
$qdeleteSqlList5 = mysqli_query($conn,$deleteSqlList5);
?>