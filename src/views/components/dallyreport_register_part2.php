<div class="accordion-item rounded-0 border border-0">
    <p class="accordion-header">
      <span class="collapsed rounded-0 border border-0" style="background-color: #FAFAFA; margin-top: 20px; border:0 none;" >
      <input type="checkbox" name="22" id="22" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2"> &nbsp; &nbsp; <label for="22">Demo ทดลองสินค้า</label>
      </span>
    </p>
    <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
        <div class="accordion-body">
            <!--  -->
            <div class="table-responsive">
                <table id="demo_product" class="table-thead-custom-awl table-bordered border-secondary">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการสินค้า</th>
                        <th>ต้องการ / ชอบ</th>
                        <th>ไม่ต้องการ / ไม่ชอบ</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><input class="form-search-custom-awl" type="text" name="" id="" placeholder="Product Search"></td>
                        <td><input class="text-center" type="text" name="" id="" placeholder=""></td>
                        <td><input class="text-center" type="text" name="" id="" placeholder=""></td>
                    </tr>
                </table>
            </div>

            <br><span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="myCreateFunction2()" ><img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มรุ่นสินค้า</span>

            <p class="mt-3">
                รายละเอียดเพิ่มเติม
                <textarea class="textarea-form-control" style="width:100%;" name="" id=""  rows="3"></textarea>
                <br>
                แนบไฟล์
                <input type="file" id="fileInput" style="display: none;">
                <label for="fileInput"><span class="badge border border-1 rounded-0 text-dark">Choose File</span></label>
                <a href=""><span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px;"><img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์</span></a>
            </p>
        </div>
    </div>
</div>

<script>
    function myCreateFunction2() {
        var table = document.getElementById("demo_product");
        var rowCount = table.rows.length;
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = `<td>${rowCount}</td>`;
        cell2.innerHTML = `<td><input class="form-search-custom-awl" type="text" name="" id="" placeholder="Product Search"></td>`;
        cell3.innerHTML = `<td><input class="text-center" type="text" name="" id="" placeholder=""></td>`;
        cell4.innerHTML = `<td><input class="text-center" type="text" name="" id="" placeholder=""></td>`;
    }

    function myDeleteFunction() {
        document.getElementById("demo_product").deleteRow(-1);
    }
</script>