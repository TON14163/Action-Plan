<div class="accordion-item rounded-0 border border-0" style="margin: 20px 0px;">
    <p class="accordion-header">
        <span class="collapsed rounded-0 border border-0" style="background-color: #FAFAFA;">
            <input type="checkbox" name="listmain4" id="listmain4" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4" value="1"> &nbsp; <label for="listmain4">&nbsp;&nbsp;ข้อมูลคู่แข่ง</label>
        </span>
    </p>
    <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse">
        <div class="accordion-body">
            <?php echo $show->InfoList4Table($id_work);?>
            <div class="table-responsive p-2">
                <table class="table-thead-custom-awl table-bordered border-secondary" style="width: 100%;">
                    <tr>
                        <th style="width: 18%;">ประเภทสินค้า</th>
                        <th style="width: 15%;">บริษัท</th>
                        <th style="width: 12%;">ประเทศ</th>
                        <th style="width: 15%;">ยี่ห้อ</th>
                        <th style="width: 15%;">รุ่น</th>
                        <th style="width: 10%;">ราคา/หน่วย</th>
                        <th style="width: 10%;">จำนวนซื้อ</th>
                        <th style="width: 10%;">เงื่อนไขพิเศษ</th>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">
                            <select class="form-search-custom-awl" style="width: 100%;" name="h_product_rival[]" id="h_product_rival1">
                                <option value="">Search</option>
                                <?php echo $show->showProrival(); ?>
                            </select>
                        </td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="company_rival[]" id="company_rival1" placeholder="Please fill out"></td>
                        <td style="padding: 8px;">
                            <select class="form-search-custom-awl" style="width: 100%;" name="rival_country[]" id="rival_country1" onclick="Country()">
                                <option value="">Search</option>
                            </select>
                        </td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_brand[]" id="rival_brand1" placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_model[]" id="rival_model1" placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="number" name="price_to_unit[]" id="price_to_unit1"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="number" name="unit[]" id="unit1"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="promotion[]" id="promotion1"></td>
                    </tr>
                </table>
            </div>
            <script>
                // โหลดรายชื่อประเทศครั้งเดียวและเก็บไว้
                let countryOptions = '';

                function loadCountryOptions() {
                    fetch(`<?php echo $COUNTRY_API;?>`)
                        .then(response => response.json())
                        .then(dataCountry => {
                            countryOptions = '<option value="">Search</option>';
                            dataCountry.forEach(itemCountry => {
                                const value = itemCountry.id || itemCountry.value || itemCountry.name || '';
                                const label = itemCountry.name || itemCountry.label || itemCountry.value || '';
                                countryOptions += `<option value="${value}">${label}</option>`;
                            });
                            // ใส่ options ให้กับทุก select.rival-country
                            updateAllCountrySelects();
                        })
                        .catch(error => {
                            console.error('Error fetching country data:', error);
                        });
                }

                function updateAllCountrySelects() {
                    document.querySelectorAll('select[name="rival_country[]"]').forEach(select => {
                        const currentValue = select.value;
                        select.innerHTML = countryOptions;
                        select.value = currentValue; // restore value if possible
                    });
                }

                // เรียกใช้เมื่อโหลดหน้า
                document.addEventListener('DOMContentLoaded', loadCountryOptions);

                // เรียกใช้หลังจากเพิ่มแถวใหม่
                function refreshCountrySelects() {
                    updateAllCountrySelects();
                }
            </script>

            <p class="p-2">
                หมายเหตุ
                <textarea class="textarea-form-control" style="width:100%;" name="description[]" id="description1" rows="3"></textarea>
            </p>
                <span>
                    <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addMultiList()" data-bs-toggle="tooltip" data-bs-title="สามารถเพิ่มพร้อมกันได้หลายรายการ">
                        <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มข้อมูลคู่แข่ง
                    </span>
                </span>
                <br>

            <div style="display: flex; justify-content: space-between; margin-top: -10px;">
                <div>
                    <div style="margin-bottom: 5px;">
                        <label for="list4file1">แนบไฟล์</label>
                        <input style="width: 300px;" type="file" name="list4file[1][]" id="list4file1" data-bs-toggle="tooltip" data-bs-title="นามสกุลที่อนุญาต 'svg', 'pdf', 'jpg', 'png'">
                        <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addFileRow4(1)">
                            <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์
                        </span>
                    </div>
                    <div id="file4RowsContainer1"></div>
                </div>
                
            </div>
            <?php if($show->showStoryrival($id_work,'id_story') == ''){?>
                <input type="hidden" name="no_auto[]" id="no_auto1" value="1">
            <?php } else { ?>
                <input type="hidden" name="no_auto[]" id="no_auto1" value="<?php echo $show->showStoryrivalNo_auto($id_work,'no_auto');?>">
            <?php } ?>

            <div id="multi4list"></div>

            <!-- เพิ่มแนบไฟล์ Start -->
            <script>
                function addFileRow4(multiNum) {
                    const container = document.getElementById(`file4RowsContainer${multiNum}`);
                    if (!container) {
                        console.error(`Container file4RowsContainer${multiNum} not found`);
                        return;
                    }
                    const rowCount = container.children.length + 1; // นับจำนวนแถวที่มีอยู่แล้ว
                    const newRow = document.createElement('div');
                    newRow.className = 'file-row';
                    newRow.style.marginBottom = '5px'; // เพิ่มระยะห่าง
                    newRow.innerHTML = `
                        <label for="list4file${multiNum}_${rowCount}">แนบไฟล์</label>
                        <input style="width: 300px; margin: 5px 0px;" type="file" name="list4file[${multiNum}][]" id="list4file${multiNum}_${rowCount}">
                        <span class="badge rounded-pill" style="background-color: #FF0004; color:#FFFFFF; padding: 5px 10px; cursor: pointer;" onclick="removeFileRow(this)"> - ลบแนบไฟล์ </span>
                    `;
                    container.appendChild(newRow);
                }

                function removeFileRow(element) {
                    const fileRow = element.closest('.file-row');
                    if (fileRow) {
                        fileRow.remove();
                    } else {
                        console.error('File row not found');
                    }
                }
            </script>
            <!-- เพิ่มแนบไฟล์ END -->

            <!-- เพิ่มข้อมูลคู่แข่ง Start -->
            <?php if($show->showStoryrival($id_work,'id_story') == ''){?>
                <?php echo "<script> let noAutoRowCount = 1 ; </script>";?>
            <?php } else { ?>
                <?php echo "<script> let noAutoRowCount = '".$show->showStoryrivalNo_auto($id_work,'no_auto')."'; </script>";?>
            <?php } ?>
            <script>
                function addMultiList() {
                    const container = document.getElementById('multi4list');
                    const rowCount = container.children.length + Number(noAutoRowCount)+1;
                    const newRow = document.createElement('div');
                    newRow.className = 'multi4list-group';
                    newRow.innerHTML = `
                        <hr style="border: 1px dashed #000;">
                        <div class="table-responsive p-2">
                            <table class="table-thead-custom-awl table-bordered border-secondary" style="width: 100%;">
                                <tr>
                                    <th style="width: 25%;">ประเภทสินค้า</th>
                                    <th style="width: 15%;">บริษัท</th>
                                    <th style="width: 15%;">ยี่ห้อ</th>
                                    <th style="width: 15%;">รุ่น</th>
                                    <th style="width: 10%;">ราคา/หน่วย</th>
                                    <th style="width: 10%;">จำนวนซื้อ</th>
                                    <th style="width: 10%;">เงื่อนไขพิเศษ</th>
                                </tr>
                                <tr>
                                    <td style="padding: 8px;">
                                        <select class="form-search-custom-awl" style="width: 100%;" name="h_product_rival[]" id="h_product_rival${rowCount}">
                                            <option value="">Search</option>
                                            <?php 
                                                $sql = "SELECT id,prorival_name FROM tb_prorival ";
                                                $qsql = mysqli_query($conn,$sql);
                                                while($vsql = mysqli_fetch_array($qsql)){
                                                    echo '<option value="'.$vsql['id'].'">'.$vsql['prorival_name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="company_rival[]" id="company_rival${rowCount}" placeholder="Please fill out"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_brand[]" id="rival_brand${rowCount}" placeholder="Please fill out"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_model[]" id="rival_model${rowCount}" placeholder="Please fill out"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="number" name="price_to_unit[]" id="price_to_unit${rowCount}"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="number" name="unit[]" id="unit${rowCount}"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="promotion[]" id="promotion${rowCount}"></td>
                                </tr>
                            </table>
                        </div>
                        <p class="p-2"> หมายเหตุ <textarea class="textarea-form-control" style="width:100%;" name="description[]" id="description${rowCount}" rows="3"></textarea> </p>
                        <div style="display: flex; justify-content: space-between; margin-top: -10px;">
                            <div>
                                <div style="margin-bottom: 5px;">
                                    <label for="list4file${rowCount}">แนบไฟล์</label>
                                    <input style="width: 300px;" type="file" name="list4file[${rowCount}][]" id="list4file${rowCount}" data-bs-toggle="tooltip" data-bs-title="นามสกุลที่อนุญาต svg,pdf,jpg,png">
                                    <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addFileRow4(${rowCount})">
                                        <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์
                                    </span>
                                </div>
                                <div id="file4RowsContainer${rowCount}"></div>
                            </div>
                            <span>
                                <span class="badge rounded-pill multi-delete" style="background-color: #FF0004; color:#FFFFFF; padding: 5px 10px; cursor: pointer;" onclick="myDeleteFunction4(this)"> - ลบข้อมูลคู่แข่ง</span>
                            </span>
                        </div>
                <input type="hidden" name="no_auto[]" id="no_auto${rowCount}" value="${rowCount}">
                        
                    `;
                    container.appendChild(newRow);
                }

                function myDeleteFunction4(element) {
                    if (element.classList.contains('multi-delete')) {
                        const multiListGroup = element.closest('.multi4list-group');
                        if (multiListGroup) {
                            multiListGroup.remove();
                        } else {
                            console.error('Multi list group not found');
                        }
                    } else {
                        const fileRow = element.closest('.file-row') || element.parentElement;
                        if (fileRow) {
                            fileRow.remove();
                        } else {
                            console.error('File row not found');
                        }
                    }
                }
            </script>
        </div>
    </div>
</div>