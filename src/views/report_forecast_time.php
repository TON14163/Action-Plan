<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานสรุปการปรับปรุงการประมานการขายตามช่วงเวลา</b>
</div>
    <p style="padding: 10px 20px;" class="font-custom-awl-14">
        <b>วันที่</b> <input type="date" name="" id="">
        <b>ถึง</b> <input type="date" name="" id="">
    </p>
        <div class="row font-custom-awl-14" style="padding: 0px 20px; font-weight: 600;">
            <div class="col-2">เขตการขาย</div>
            <div class="col-1">
                <input type="checkbox" name="" id=""> Total<br>
                <input type="checkbox" name="" id=""> SS1 <br>
                <input type="checkbox" name="" id=""> SS2 <br>
                <input type="checkbox" name="" id=""> SS3 <br>
                <input type="checkbox" name="" id=""> SS4
                
            </div>
            <div class="col-1">
                <br>
                <input type="checkbox" name="" id=""> S15 <br>
                <input type="checkbox" name="" id=""> S11 <br>
                <input type="checkbox" name="" id=""> S13 <br>
                <input type="checkbox" name="" id=""> S31 <br>
                <input type="checkbox" name="" id=""> MM1 
            </div>
            <div class="col-1">
                <br>
                <input type="checkbox" name="" id=""> S16 <br>
                <input type="checkbox" name="" id=""> S12 <br>
                <input type="checkbox" name="" id=""> S14 <br>
                <input type="checkbox" name="" id=""> S32 <br>
                <input type="checkbox" name="" id=""> MM2
            </div>
            <div class="col-1">
                <br>
                <input type="checkbox" name="" id=""> S21 <br>
                <input type="checkbox" name="" id=""> S17 
            </div>
            <div class="col-1">
                <br>
                <input type="checkbox" name="" id=""> S22 <br>
                <input type="checkbox" name="" id=""> S24  
            </div>
            <div class="col-4"></div>
        </div>

        <p style="margin-left: 18%;"><button class="btn-custom-awl" style="font-size: 14px;">Search</button> <font style="color: #ff8080; font-size: 12px;">*เลือกได้แค่ 1 ตัวเลือก</font></p>

<hr style="margin:20px 0px;">
<p class="font-custom-awl-14"><b>Total Hos</b></p>
<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl table-bordered border-secondary w-100 ">
        <thead>
            <tr>
                <th style="width:10%">เปอร์เซ็นต์</th>
                <th style="width:10%">ยอดขายใหม่ของเดือน</th>
                <th style="width:10%">ยอดขายจากประมาณการ</th>
                <th style="width:10%">100%</th>
                <th style="width:10%">90-99%</th>
                <th style="width:10%">80-89 %</th>
                <th style="width:10%">50-80%</th>
                <th style="width:10%">0-50%</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background-color: #FFFFFF;">
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
            </tr>
            <tr style="background-color: #FFFFFF;">
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
            </tr>
        </tbody>
    </table>
</div>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
