<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ข้อมูลลูกค้า</b>
</div>
<section style="padding: 0px 20px;" class="font-custom-awl-14">
    
        <div style="display:flex; justify-content: space-between; ">
            <div>
                <form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
                        <b>ค้นหา</b> 
                        <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['cuss_earch']) ? htmlspecialchars($_GET['cuss_earch']) : ''; ?>">
                        <button class="btn-custom-awl">Search</button>
                    </form>
            </div>

            <div>
                    <span data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></span>
                    <!-- Modal start -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header" style="background-color: #F1E1FF;">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ลงทะเบียนข้อมูลลูกค้า</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body row">

                            <div class="py-1 col-3">
                                <div class="row">
                                    <label for="inputPassword" class="col-4 col-form-label">รหัสลูกค้า</label>
                                    <div class="col-8">
                                        <input type="text" style="width: 100%;" class="form-search-custom-awl" name="id_hospital" id="id_hospital">
                                    </div>
                                </div>
                            </div>
                            <div class="py-1 col-9"></div>

                            <div class="py-1 col-3">
                                <div class="row">
                                    <label for="inputPassword" class="col-4 col-form-label">คำนำหน้า</label>
                                    <div class="col-8">
                                        <input type="text" style="width: 100%;" class="form-search-custom-awl" name="title_name" id="title_name">
                                    </div>
                                </div>
                            </div>

                            <div class="py-1 col-3">
                                <div class="row">
                                    <label for="inputPassword" class="col-4 col-form-label">ชื่อลูกค้า</label>
                                    <div class="col-8">
                                        <input type="text" style="width: 100%;" class="form-search-custom-awl" name="customer_name" id="customer_name">
                                    </div>
                                </div>
                            </div>

                            <div class="py-1 col-3">
                                <div class="row">
                                    <label for="inputPassword" class="col-4 col-form-label"><small>เบอร์โทรศัพท์</small></label>
                                    <div class="col-8">
                                        <input type="text" style="width: 100%;" class="form-search-custom-awl" name="customer_tel" id="customer_tel">
                                    </div>
                                </div>
                            </div>
                            <div class="py-1 col-3">
                                <div class="row">
                                    <label for="inputPassword" class="col-4 col-form-label">FAX</label>
                                    <div class="col-8">
                                        <input type="text" style="width: 100%;" class="form-search-custom-awl" name="fax" id="fax">
                                    </div>
                                </div>
                            </div>

                                <div class="py-1 col-12">
                                <div class="row">
                                    <label for="inputPassword" class="col-1 col-form-label">ที่อยู่</label>
                                    <div class="col-11">
                                        <input type="text" style="width: 100%;" class="form-search-custom-awl" name="address_name" id="address_name">
                                    </div>
                                </div>
                                </div>

                                <div class="py-1 col-3">
                                <div class="row">
                                    <label for="inputPassword" class="col-4 col-form-label">จังหวัด</label>
                                    <div class="col-8">
                                        <input type="text" style="width: 100%;" class="form-search-custom-awl" name="province" id="province">
                                    </div>
                                </div>
                                </div>

                                <div class="py-1 col-3">
                                    <div class="row">
                                        <label for="inputPassword" class="col-4 col-form-label"><small>รหัสไปรษณีย์</small></label>
                                        <div class="col-8">
                                            <input type="text" style="width: 100%;" class="form-search-custom-awl" name="zip_code" id="zip_code">
                                        </div>
                                    </div>
                                </div>
                                <div class="py-1 col-6"></div>

                                <div class="py-1 col-3">
                                <div class="row">
                                    <label for="inputPassword" class="col-4 col-form-label">Credit</label>
                                    <div class="col-8">
                                        <input type="text" style="width: 100%;" class="form-search-custom-awl" name="customer_credit" id="customer_credit">
                                    </div>
                                </div>
                                </div>

                                <div class="py-1 col-3">
                                    <div class="row">
                                        <label for="inputPassword" class="col-4 col-form-label"><small>เขตการขาย</small></label>
                                        <div class="col-8">
                                            <input type="text" style="width: 100%;" class="form-search-custom-awl" name="sale_area" id="sale_area">
                                        </div>
                                    </div>
                                </div>
                                <div class="py-1 col-6"></div>

                            </div>
                            <div class="modal-footer">
                                <span type="button" data-bs-dismiss="modal">Close</span>
                                <span type="button" >บันทึก</span>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal end -->
            </div>
        </div>
    
</section>

<hr style="margin: 20px 0px;">

<div class="table-responsive font-custom-awl-14 px-2">
    <table id="unitTable"  class="table-thead-custom-awl table-bordered border-secondary">
        <thead>
            <tr>
                <th data-orderable="false" style="width: 11%;">รหัสลูกค้า</th>
                <th data-orderable="false" style="width: 11%;">คำนำหน้า</th>
                <th data-orderable="false" style="width: 11%;">ชื่อลูกค้า</th>
                <th data-orderable="false" style="width: 11%;">เขตการขาย</th>
                <th data-orderable="false" style="width: 18%;">ที่อยู่</th>
                <th data-orderable="false" style="width: 11%;">จังหวัด</th>
                <th data-orderable="false" style="width: 11%;">เบอร์โทรศัพท์</th>
                <th data-orderable="false" style="width: 11%;">เครดิต</th>
                <th data-orderable="false" style="width: 5%;">Edit</th>
            </tr>
        </thead>
    </table>
<div hidden>
    <script>
        $(document).ready(function() {
            var cuss_Earch = "<?php echo !empty($_GET['cuss_earch']) ? htmlspecialchars($_GET['cuss_earch']) : ''; ?>";
            
            $('#unitTable').DataTable({
                "lengthChange": false,
                "searching": false, 
                "processing": true, // แสดง "Processing..." ขณะโหลด
                "serverSide": true, // เปิดใช้งาน Server-Side Processing
                "ajax": {
                    "url": `<?=$usercustomer1_api;?>`, // เข้าถึงจาก env
                    "type": "POST", // ใช้ POST เพื่อส่งพารามิเตอร์
                    "data": function(d) {
                        d.cuss_earch = cuss_Earch; // ส่ง ค้นหาไปยัง API
                    },
                    "dataSrc": "data" // ชี้ไปที่ key "data" ใน JSON
                },
                "columns": [
                    { "data": "id_hospital" },   // คอลัมน์แรกแสดง id
                    { "data": "title_name" },
                    { "data": "customer_name" },
                    { "data": "sale_area" },
                    { "data": "address_name" },
                    { "data": "province" },
                    { "data": "customer_tel" },
                    { "data": "customer_credit" },
                    { "data": "edit" }
                ],
                "language": {
                    "info": "พบทั้งหมด _TOTAL_ รายการ : จำนวน _PAGES_ หน้า : _PAGE_",
                    "infoFiltered": "" // ลบส่วน filtered from ออก
                }
            });
        });

    </script>
</div>
</div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
