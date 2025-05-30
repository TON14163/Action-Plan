<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค่าที่ต้องการเปลี่ยน</title>
</head>
<body style="font-size: 14px; min-width: 2000px;">
    <?php 
        require_once __DIR__ . '/config/database.php';
        $strSQL1 = "SELECT id_work,product_present FROM tb_register_data 
        WHERE ( product_present != '' AND product_present NOT LIKE '%[%' ) 
        AND product_present_update != '1' 
        ORDER BY id_work DESC Limit 1";
        $objQuery1 = mysqli_query($conn,$strSQL1);
        while($objResult1 = mysqli_fetch_array($objQuery1)){
            $product = trim($objResult1['product_present']);
            $itemlist = [];
            if ($product == 'เตียงผู้ป่วยไฟฟ้า') {
                $itemlist[] = ["itemlist" => $product . "::item1"];
            } else if ($product == 'เตียงกายภาพ') {
                $itemlist[] = ["itemlist" => $product . "::item2"];
            } else if ($product == 'ที่นอนโฟม') {
                $itemlist[] = ["itemlist" => $product . "::item3"];
            } else if ($product == 'เครื่องดูดเสมหะ') {
                $itemlist[] = ["itemlist" => $product . "::item4"];
            } else if ($product == 'เตียงตรวจ OPD') {
                $itemlist[] = ["itemlist" => $product . "::item5"];
            } else if ($product == 'เตียงเคลื่อนย้าย') {
                $itemlist[] = ["itemlist" => $product . "::item6"];
            } else if ($product == 'เครื่องวัดน้ำตาล') {
                $itemlist[] = ["itemlist" => $product . "::item7"];
            } else if ($product == 'อื่นๆ'  OR $product == 'อื่นๆ อื่นๆ' OR $product == ' อื่นๆ อื่นๆ' OR $product == ' อื่นๆ อื่นๆ อื่นๆ' OR $product == ' อื่นๆ อื่นๆ อื่นๆ อื่นๆ' OR $product == ' อื่นๆ อื่นๆ อื่นๆ อื่นๆ อื่นๆ อื่นๆ' OR $product == ' อื่นๆ อื่นๆ อื่นๆ อื่นๆ อื่นๆ อื่นๆ อื่นๆ อื่นๆ' OR $product == ' อื่นๆ' OR $product == 'อื่นๆ / สินค้ารวม') {
                $itemlist[] = ["itemlist" => "อื่นๆ / สินค้ารวม::item8"];
            }
            if(json_encode($itemlist, JSON_UNESCAPED_UNICODE) != '[]'){
                echo $objResult1['id_work'] . '->' . json_encode($itemlist, JSON_UNESCAPED_UNICODE) . '<hr>';
                $sqlUp = "UPDATE tb_register_data SET product_present = '".json_encode($itemlist, JSON_UNESCAPED_UNICODE)."' , product_present_update = 1  WHERE id_work = '".$objResult1['id_work']."' ";
                // mysqli_query($conn,$sqlUp);
            }
        }
        mysqli_close($conn);
    ?>
</body>
</html>

<!-- 
    [{"itemlist":"เตียงผู้ป่วยไฟฟ้า:2:item1"},{"itemlist":"เตียงตรวจ OPD:1:item5"},{"itemlist":"ที่นอนโฟม:2:item3"}]
-->