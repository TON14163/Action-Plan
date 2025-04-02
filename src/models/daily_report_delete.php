<?php 

    $deleteSql = "DELETE FROM tb_register_data WHERE id_work = '".$id_work."' ";
    $qdeleteSql = mysqli_query($conn,$deleteSql) or die ('Error in query');
    // echo $deleteSql;

?>