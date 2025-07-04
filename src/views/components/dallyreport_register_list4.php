<div class="accordion-item rounded-0 border border-0" style="margin: 20px 0px;">
    <p class="accordion-header" id="feature13">
        <span class="collapsed rounded-0 border border-0" style="background-color: #FAFAFA;">
            <input type="checkbox" name="listmain4" id="listmain4" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4" value="1"> &nbsp; <label for="listmain4">&nbsp;&nbsp;ข้อมูลคู่แข่ง</label>
        </span>
    </p>
    <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse">
        <div class="accordion-body">
            <?php 
        // echo $show->InfoList4Table($id_work); // ข้อมูลส่วนนี้เป็นส่วนที่บันทึกไปก่อนหน้าแล้ว
        // ข้อมูลส่วนนี้เป็นส่วนที่บันทึกไปก่อนหน้าแล้ว START 
        $sql = "SELECT * FROM tb_storyrival WHERE refid_work = '".$id_work."' ORDER BY no_auto ASC ";
        $qsql = mysqli_query($conn,$sql);
        $nsql = mysqli_num_rows($qsql);

        if($nsql > 0){
            $numM = 1;
            while($vsql = mysqli_fetch_array($qsql)){?>
            <table class='table-thead-custom-awl table-bordered border-secondary' style='width: 100%;'>
                <tr>
                        <th style='width: 18%;'>ประเภทสินค้า</th>
                        <th style='width: 15%;'>บริษัท</th>
                        <th style='width: 12%;'>ประเทศ</th>
                        <th style='width: 15%;'>ยี่ห้อ</th>
                        <th style='width: 15%;'>รุ่น</th>
                        <th style='width: 10%;'>ราคา/หน่วย</th>
                        <th style='width: 10%;'>จำนวนซื้อ</th>
                        <th style='width: 10%;'>เงื่อนไขพิเศษ</th>
                </tr>
                <tr>
                    <td style='padding: 8px;'>
                        <select class='form-search-custom-awl' style='width: 100%;' name='h_product_rival[]' id='h_product_rival<?php echo $numM;?>'>
                        <option value="<?php echo $vsql['h_product_rival'];?>"><?php echo $vsql['product_rival'];?></option>
                            <option value=''>Search</option>
                            <?php
                            $sql2 = "SELECT id,prorival_name FROM tb_prorival ";
                            $qsql2 = mysqli_query($conn,$sql2);
                            while($vsql2 = mysqli_fetch_array($qsql2)){
                                ?><option value="<?php echo $vsql2['id'];?>"><?php echo $vsql2['prorival_name'];?></option><?php
                            } ?>
                        </select>
                    </td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='text' name='company_rival[]' id='company_rival<?php echo $numM;?>' placeholder='Please fill out' value="<?php echo $vsql['company_rival'];?>"></td>
                    <td style='padding: 8px;'>
                        <div style='width: 100%; position: relative;'>
                            <input type='text' name='rival_country[]' id='rival_country<?php echo $numM;?>' placeholder='Please fill out' oninput="CountryView('rival_country<?php echo $numM;?>','CountryViewDemo<?php echo $numM;?>','CountryClose<?php echo $numM;?>')" value='<?php echo $vsql['rival_country'];?>' autocomplete="off">
                            <div id='CountryClose<?php echo $numM;?>' onclick="CountryClose('CountryViewDemo<?php echo $numM;?>','CountryClose<?php echo $numM;?>')" style='position: absolute; background-color: #FCFCFC; z-index: 999; right:0; top:173px; display:none; color:#ff8080; cursor: pointer;'>
                                <span class='badge rounded-pill text-bg-danger'>x</span>
                            </div>
                            <div id='CountryViewDemo<?php echo $numM;?>' style='width: 100%; background-color: #FCFCFC; overflow:scroll; overflow-x:hidden; height: 150px; position: absolute; z-index: 998; text-align: left; padding:8px; display:none; font-size: 12px;' class='shadow-sm'></div>
                        </div>
                    </td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='text' name='rival_brand[]' id='rival_brand<?php echo $numM;?>' placeholder='Please fill out' value="<?php echo $vsql['rival_brand'];?>"></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='text' name='rival_model[]' id='rival_model<?php echo $numM;?>' placeholder='Please fill out' value="<?php echo $vsql['rival_model'];?>"></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='number' name='price_to_unit[]' id='price_to_unit<?php echo $numM;?>' value="<?php echo $vsql['price_to_unit'];?>"></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='number' name='unit[]' id='unit<?php echo $numM;?>' value="<?php echo $vsql['unit'];?>"></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='text' name='promotion[]' id='promotion<?php echo $numM;?>' value="<?php echo $vsql['promotion'];?>"></td>
                </tr>
            </table>
            <p class='p-2'>
                หมายเหตุ
                <textarea class='textarea-form-control' style='width:100%;' name='description[]' id='description<?php echo $numM;?>' rows='3'><?php echo $vsql['description'];?></textarea>
            </p>
            <input hidden='text' name='no_auto[]' id='no_auto"<?php echo $vsql['no_auto'];?>"' value="<?php echo $vsql['no_auto'];?>">
            <input type='hidden' name='id_story[]' id='id_story"<?php echo $vsql['id_story'];?>"' value="<?php echo $vsql['id_story'];?>">
            <div style='display: flex; justify-content: space-between; align-items: center;'>
            <span>
            <span class='badge rounded-pill' style='background-color: #525252; color:#FFFFFF; padding-left: 10px; cursor: pointer;' data-bs-toggle="tooltip" data-bs-title="หากต้องการเพิ่มไฟล์แนบอีก กรุณาลบข้อมูลคู่แข่งนี้แล้วเพิ่มใหม่อีกครั้ง">ไฟล์ที่แนบ</span>
            <?php 
            $images = json_decode($vsql['file_nap1'], true);
            foreach ($images as $image) { ?>
            <a class='list2file1_allfile1Styel' href='uploads/<?php echo $image['file'];?>' target='_blank' rel='noopener noreferrer'><?php echo $image['file'];?></a>&nbsp;
            <?php } ?>
            </span>
            <span>
                <span class='badge rounded-pill multi-delete' style='background-color: #FF0004; color:#FFFFFF; padding: 5px 10px; cursor: pointer;' onclick='deleteList4("<?php echo $id_work;?>","<?php echo $vsql["id_story"];?>")' > - ลบข้อมูลคู่แข่ง</span>
            </span>
            </div>
            <hr style='border: 1px dashed #000;'>
                <?php $numM++;
            }
        } 
        // ข้อมูลส่วนนี้เป็นส่วนที่บันทึกไปก่อนหน้าแล้ว END

            if($nsql == 0){ ?>
            <!-- if($show->InfoList4Table($id_work) == ''){ ?> -->
            <!-- ส่วนเพิ่มใหม่แสดงตั้งต้น START -->
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
                            <select class="form-search-custom-awl" style="width: 100%;" name="h_product_rival[]" id="h_product_rival0">
                                <option value="">Search</option>
                                <?php echo $show->showProrival(); ?>
                            </select>
                        </td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="company_rival[]" id="company_rival0" placeholder="Please fill out"></td>
                        <td style="padding: 8px;">
                        <div style="width: 100%; position: relative;">
                            <input type="text" name="rival_country[]" id="rival_country0" placeholder="Please fill out" oninput="CountryView('rival_country0','CountryViewDemo0','CountryClose0')" value="" autocomplete="off">
                            <div id="CountryClose0" onclick="CountryClose('CountryViewDemo0','CountryClose0')" style="position: absolute; background-color: #FCFCFC; z-index: 999; right:0; top:173px; display:none; color:#ff8080; cursor: pointer;">
                                <span class="badge rounded-pill text-bg-danger">x</span>
                            </div>
                            <div id="CountryViewDemo0" style="width: 100%; background-color: #FCFCFC; overflow:scroll; overflow-x:hidden; height: 150px; position: absolute; z-index: 998; text-align: left; padding:8px; display:none; font-size: 12px;" class="shadow-sm"></div>
                        </div>
                        </td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_brand[]" id="rival_brand0" placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_model[]" id="rival_model0" placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="number" name="price_to_unit[]" id="price_to_unit0"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="number" name="unit[]" id="unit0"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="promotion[]" id="promotion0"></td>
                    </tr>
                </table>

            <p class="p-2">
                หมายเหตุ
                <textarea class="textarea-form-control" style="width:100%;" name="description[]" id="description0" rows="3"></textarea>
            </p>

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

            <?php } ?>
            <?php // } <!-- ส่วนเพิ่มใหม่แสดงตั้งต้น END --> ?>

            <span>
                <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addMultiList()" data-bs-toggle="tooltip" data-bs-title="สามารถเพิ่มพร้อมกันได้หลายรายการ">
                    <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มข้อมูลคู่แข่ง
                </span>
            </span>
            <br>

            



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
                        <span class="badge rounded-pill" style="background-color: #FF0004; color:#FFFFFF; padding: 5px 10px; cursor: pointer;" onclick="removeFileRow(this)"> <img src="assets/images/icon_system/streamline-block--basic-ui-delete-2.svg" style="width:12px; height:12px; color:#FFFFFF;"> ลบแนบไฟล์ </span>
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
                <?php echo "<script> let noAutoRowCount = 1 ; let noAutoRowCountFile = 1 ; </script>";?>
            <?php } else { ?>
                <?php echo "<script> let noAutoRowCount = '".$show->showStoryrivalNo_auto($id_work,'no_auto')."'; let noAutoRowCountFile = 0 ; </script>";?>
            <?php } ?>
            <script>
                function addMultiList() {
                    const container = document.getElementById('multi4list');
                    const rowCount = container.children.length + Number(noAutoRowCount) + Number(noAutoRowCountFile);
                    const newRow = document.createElement('div');
                    newRow.className = 'multi4list-group';
                    newRow.innerHTML = `
                        <hr style="border: 1px dashed #000;">
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
                                    <td style="padding: 8px;">
                                        <div style="width: 100%; position: relative;">
                                            <input type="text" name="rival_country[]" id="rival_country${rowCount}" placeholder="Please fill out" oninput="CountryView('rival_country${rowCount}','CountryViewDemo${rowCount}','CountryClose${rowCount}')" value="" autocomplete="off">
                                            <div id="CountryClose${rowCount}" onclick="CountryClose('CountryViewDemo${rowCount}','CountryClose${rowCount}')" style="position: absolute; background-color: #FCFCFC; z-index: 999; right:0; top:173px; display:none; color:#ff8080; cursor: pointer;">
                                                <span class="badge rounded-pill text-bg-danger">x</span>
                                            </div>
                                            <div id="CountryViewDemo${rowCount}" style="width: 100%; background-color: #FCFCFC; overflow:scroll; overflow-x:hidden; height: 150px; position: absolute; z-index: 998; text-align: left; padding:8px; display:none; font-size: 12px;" class="shadow-sm"></div>
                                        </div>
                                    </td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_brand[]" id="rival_brand${rowCount}" placeholder="Please fill out"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="rival_model[]" id="rival_model${rowCount}" placeholder="Please fill out"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="number" name="price_to_unit[]" id="price_to_unit${rowCount}"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="number" name="unit[]" id="unit${rowCount}"></td>
                                    <td style="padding: 8px;"><input style="width: 100%;" type="text" name="promotion[]" id="promotion${rowCount}"></td>
                                </tr>
                            </table>
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
                                <span class="badge rounded-pill multi-delete" style="background-color: #FF0004; color:#FFFFFF; padding: 5px 10px; cursor: pointer;" onclick="myDeleteFunction4(this)"> <img src="assets/images/icon_system/streamline-block--basic-ui-delete-2.svg" style="width:12px; height:12px; color:#FFFFFF;"> ลบข้อมูลคู่แข่ง</span>
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


<script>
    let countryData = []; // ตัวแปรเก็บข้อมูลประเทศทั้งหมด
    async function CountryView(rival_countryNum,CountryViewDemoNum,CountryCloseNum) {
        try {
            // ดึงข้อมูลจาก API ถ้ายังไม่มีข้อมูลใน countryData
            if (countryData.length === 0) {
                const response = await fetch(`<?php echo $COUNTRY_API;?>`);
                countryData = await response.json();
            }

            const input = document.getElementById(rival_countryNum).value;
            const countryClose = document.getElementById(CountryCloseNum);
            const countryList = document.getElementById(CountryViewDemoNum);
            
            // แสดง dropdown และปุ่มปิด
            countryList.style.display = 'block';
            countryClose.style.display = 'block';

            // กรองข้อมูลประเทศตาม input (case-insensitive)
            const searchTerm = input.trim();
            const filteredCountries = searchTerm === ''
                ? countryData // ถ้า input ว่าง แสดงทั้งหมด
                : countryData.filter(item => {
                    const name = (item.name || item.label || item.value || '').toUpperCase();
                    return name.includes(searchTerm.toUpperCase());
                });

            // สร้าง HTML สำหรับแสดงรายการ
            if (Array.isArray(filteredCountries) && filteredCountries.length > 0) {
                countryList.innerHTML = filteredCountries.map(
                    item => `<div class="my-1" style="cursor: pointer;" onclick="document.getElementById('${rival_countryNum}').value = '${item.name || item.label || item.value || ''}'; CountryClose('${CountryViewDemoNum}','${CountryCloseNum}');">${item.name || item.label || item.value || ''}</div>`
                ).join('');
            } else {
                countryList.innerHTML = '<div class="my-1">ไม่พบข้อมูลประเทศ</div>';
            }
        } catch (error) {
            console.log(error);
            document.getElementById(CountryViewDemoNum).innerHTML = '<div class="my-1">เกิดข้อผิดพลาด</div>';
        }
    }

    function CountryClose(CountryViewDemoNum,CountryCloseNum) {
        const countryClose = document.getElementById(CountryCloseNum);
        const countryList = document.getElementById(CountryViewDemoNum);
        countryList.style.display = 'none';
        countryClose.style.display = 'none';
    }
</script>