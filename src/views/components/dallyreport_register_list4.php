<div class="accordion-item rounded-0 border border-0" style="margin: 20px 0px;">
    <p class="accordion-header">
        <span class="collapsed rounded-0 border border-0" style="background-color: #FAFAFA;" >
        <input type="checkbox" name="listmain4" id="listmain4" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4" value="1"> &nbsp; &nbsp; <label for="listmain4">ข้อมูลคู่เเข่ง</label>
        </span>
    </p>
    <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
        <div class="accordion-body">
            <!--  -->
            <div class="table-responsive p-2">
                <table class="table-thead-custom-awl table-bordered border-secondary" style="width: 100%;">
                    <tr>
                        <th style="width: 15%;">ประเภทสินค้า</th>
                        <th style="width: 15%;">บริษัท</th>
                        <th style="width: 15%;">ยี่ห้อ</th>
                        <th style="width: 15%;">รุ่น</th>
                        <th style="width: 10%;">ราคา/หน่วย</th>
                        <th style="width: 10%;">จำนวนซื้อ</th>
                        <th style="width: 10%;">เงื่อนไขพิเศษ</th>
                        <th style="width: 10%;">วันที่เปิดซอง</th>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">
                            <select class="form-search-custom-awl" name="h_product_rival[]" id="h_product_rival">
                                <option value="">Search</option>
                                <?php echo $show->showProrival();?>
                            </select>
                        </td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="product_rival[]" id="product_rival" placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="company_rival[]" id="company_rival" placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_brand[]" id="rival_brand" placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_model[]" id="rival_model"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="unit[]" id="unit"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="promotion[]" id="promotion"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="date" name="date_open[]" id="date_open"></td>
                    </tr>
                </table>
            </div>

            <p class="p-2">
            หมายเหตุ
            <textarea class="textarea-form-control" style="width:100%;" name="description[]" id="description"  rows="3"></textarea>
            </p>

            <div style="display: flex; justify-content: space-between; margin-top: -10px;">
                <div>
                    <div style="margin-bottom: 5px;">
                        <label for="list4file1">แนบไฟล์</label> 
                        <input style="width: 300px;" type="file" name="list4file[]" id="list4file1">
                        <span class="badge rounded-pill" style="background-color: #ff4444; color:#FFFFFF; padding: 5px 10px; margin-left: 5px; cursor: pointer;" onclick="myDeleteFunction(this)">ลบ</span>
                        <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addFileRow4(1)">
                            <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์
                        </span>
                    </div>
                    <div id="file4RowsContainer1"></div>
                </div>
                <span>
                    <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px;" 
                    onclick="addMultiList()"
                    ><img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มข้อมูลคู่เเข่ง</span>
                </span>
            </div>


<div id="multi4list"></div>


<!-- เพิ่มแนบไฟล์ Start -->
<script>
    function addFileRow4(multiNum) {
        const container = document.getElementById(`file4RowsContainer${multiNum}`);
        const rowCount = container.children.length + 2; // Start from 2 since the first row is already present
        const newRow = document.createElement('div');
        newRow.className = 'file-row'; // เพิ่ม class เพื่อให้ง่ายต่อการจัดการ
        newRow.innerHTML = `
            <label for="list4file${multiNum}_${rowCount}">แนบไฟล์</label> 
            <input style="width: 300px; margin: 5px 0px;" type="file" name="list4file[]" id="list4file${multiNum}_${rowCount}">
            <span class="badge rounded-pill" style="background-color: #ff4444; color:#FFFFFF; padding: 5px 10px; margin-left: 5px; cursor: pointer;" onclick="myDeleteFunction(this)">ลบ</span>
        `;
        container.appendChild(newRow);
    }
</script>
<!-- เพิ่มแนบไฟล์ END -->

<!-- เพิ่มข้อมูลคู่แข่ง Start -->

<script>
function addMultiList() {
    const container = document.getElementById('multi4list');
    const rowCount = container.children.length + 2;
    const newRow = document.createElement('div');
    newRow.className = 'multi4list-group';
    newRow.innerHTML = `
        <hr style="border: 1px dashed #000;">
        <div class="table-responsive p-2">
            <table class="table-thead-custom-awl table-bordered border-secondary" style="width: 100%;">
                <tr>
                    <th style="width: 15%;">ประเภทสินค้า</th>
                    <th style="width: 15%;">บริษัท</th>
                    <th style="width: 15%;">ยี่ห้อ</th>
                    <th style="width: 15%;">รุ่น</th>
                    <th style="width: 10%;">ราคา/หน่วย</th>
                    <th style="width: 10%;">จำนวนซื้อ</th>
                    <th style="width: 10%;">เงื่อนไขพิเศษ</th>
                    <th style="width: 10%;">วันที่เปิดซอง</th>
                </tr>
                <tr>
                    <td style="padding: 8px;">
                        <select class="form-search-custom-awl" name="h_product_rival" id="h_product_rival">
                            <option value="">Search</option>
                            <?php 
                                $sql = "SELECT id,prorival_name FROM tb_prorival ";
                                $qsql = mysqli_query($conn,$sql);
                                $prorival_name = [];
                                while($vsql = mysqli_fetch_array($qsql)){
                                    echo '<option value="'.$vsql['id'].'">'.$vsql['prorival_name'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id="" placeholder="Please fill out"></td>
                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id="" placeholder="Please fill out"></td>
                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id="" placeholder="Please fill out"></td>
                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""></td>
                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""></td>
                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""></td>
                    <td style="padding: 8px;"><input style="width: 100%;" type="date" name="" id=""></td>
                </tr>
            </table>
        </div>
        <p class="p-2"> หมายเหตุ <textarea class="textarea-form-control" style="width:100%;" name="" id="" rows="3"></textarea> </p>
        <div style="display: flex; justify-content: space-between; margin-top: -10px;">
            <div>
                <div style="margin-bottom: 5px;">
                    <label for="list4file${rowCount}">แนบไฟล์</label> 
                    <input style="width: 300px;" type="file" name="list4file[]" id="list4file${rowCount}">
                    <span class="badge rounded-pill" style="background-color: #ff4444; color:#FFFFFF; padding: 5px 10px; margin-left: 5px; cursor: pointer;" onclick="myDeleteFunction(this)">ลบ</span>
                    <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addFileRow4(${rowCount})">
                        <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์
                    </span>
                </div>
                <div id="file4RowsContainer${rowCount}"></div>
            </div>
            <span>
                <span class="badge rounded-pill multi-delete" style="background-color: #ff4444; color:#FFFFFF; padding: 5px 10px; cursor: pointer;" onclick="myDeleteFunction(this)"> - ลบข้อมูลคู่แข่ง</span>
            </span>
        </div>
    `;
    container.appendChild(newRow);
}


    function myDeleteFunction(element) {
    if (element.classList.contains('multi-delete')) {
        // ลบข้อมูลคู่แข่งทั้งชุด
        const multiListGroup = element.closest('.multi4list-group');
        if (multiListGroup) {
            multiListGroup.remove();
        }
    } else {
        // ลบไฟล์แนบแต่ละไฟล์
        const fileRow = element.closest('.file-row') || element.parentElement;
        if (fileRow) {
            fileRow.remove();
        }
    }
}

</script>
<!-- เพิ่มข้อมูลคู่แข่ง END -->

        </div>
    </div>
</div>