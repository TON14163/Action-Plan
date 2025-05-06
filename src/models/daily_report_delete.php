<?php 

    $deleteSql = "DELETE FROM tb_register_data WHERE id_work = '".$id_work."' ";
    $qdeleteSql = mysqli_query($conn,$deleteSql) or die ('Error in query');

    $deleteSqlList = "DELETE FROM tb_storyrival WHERE refid_work = '".$id_work."' ";
    $qdeleteSqlList = mysqli_query($conn,$deleteSqlList);

    $deleteSqlList = "DELETE FROM tb_product_delivery WHERE ref_idwork = '".$id_work."' ";
    $qdeleteSqlList = mysqli_query($conn,$deleteSqlList);

    $deleteSqlList = "DELETE FROM tb_present_booth WHERE ref_idwork = '".$id_work."' ";
    $qdeleteSqlList = mysqli_query($conn,$deleteSqlList);

?>