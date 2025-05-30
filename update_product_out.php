<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลที่เปลี่ยนแปลง</title>
</head>
<body style="font-size: 14px; min-width: 2000px;">
    <?php   
        require_once __DIR__ . '/config/database.php'; 
        $strSQL1 = "SELECT id_work,product_present FROM tb_register_data 
        WHERE ( product_present != '' AND product_present LIKE '%[%' ) 
        AND product_present_update = '1' 
        ORDER BY id_work DESC Limit 100";
        $objQuery1 = mysqli_query($conn,$strSQL1);
        while($objResult1 = mysqli_fetch_array($objQuery1)){
            echo $objResult1['id_work'].'->'.$objResult1['product_present'].'<hr>';
        }
        mysqli_close($conn);
    ?>
</body>
</html>