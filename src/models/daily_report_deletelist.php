<?php
$deleteSqlList = "DELETE FROM tb_storyrival WHERE id_story = '".$id_story."' ";
$qdeleteSqlList = mysqli_query($conn,$deleteSqlList);
?>