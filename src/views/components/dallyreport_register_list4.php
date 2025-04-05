<div class="accordion-item rounded-0 border border-0" style="margin: 20px 0px;">
    <p class="accordion-header">
      <span class="collapsed rounded-0 border border-0" style="background-color: #FAFAFA;" >
      <input type="checkbox" name="44" id="44" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4"> &nbsp; &nbsp; <label for="44">ข้อมูลคู่เเข่ง</label>
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
                            <select class="form-search-custom-awl" name="h_product_rival" id="h_product_rival">
                                <option value="">Search</option>
                                <?php echo $show->showProrival();?>
                            </select>
                        </td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""  placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""  placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""  placeholder="Please fill out"></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="text" name="" id=""></td>
                        <td style="padding: 8px;"><input style="width: 100%;" type="date" name="" id=""></td>
                    </tr>
                </table>
            </div>

            <p class="p-2">
            หมายเหตุ
            <textarea class="textarea-form-control" style="width:100%;" name="" id=""  rows="3"></textarea>
            </p>

            <div style="display: flex; justify-content: space-between; margin-top: -10px;">
                <div>
                    <div style="margin-bottom: 5px;">
                        <label for="list4file1">แนบไฟล์</label> 
                        <input style="width: 300px;" type="file" name="list4file[]" id="list4file1">
                        <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addFileRow4()">
                            <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์
                        </span>
                    </div>

                    <div id="fileRowsContainer4"></div>

                    <script>
                        function addFileRow4() {
                            const container = document.getElementById('fileRowsContainer4');
                            const rowCount = container.children.length + 2; // Start from 2 since the first row is already present
                            const newRow = document.createElement('div');
                            newRow.innerHTML = `
                                <label for="list4file${rowCount}">แนบไฟล์</label> 
                                <input style="width: 300px; margin: 5px 0px;" type="file" name="list4file[]" id="list4file${rowCount}">
                            `;
                            container.appendChild(newRow);
                        }
                    </script>
                </div>
                
                <span>
                <a href=""><span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px;"><img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มข้อมูลคู่เเข่ง</span></a>
                </span>
            </div>
        </div>
    </div>
</div>