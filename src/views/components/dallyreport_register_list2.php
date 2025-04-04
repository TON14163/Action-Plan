<div class="accordion-item rounded-0 border border-0">
    <p class="accordion-header">
        <span class="collapsed rounded-0 border border-0" style="background-color: #FAFAFA; margin-top: 20px; border:0 none;" >
            <input type="checkbox" name="22" id="22" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2"> &nbsp; &nbsp; <label for="22">Demo ทดลองสินค้า</label>
        </span>
    </p>
    <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
        <div class="accordion-body">
            <!--  -->
                <table id="demo_product" class="table-thead-custom-awl table-bordered border-secondary">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการสินค้า</th>
                        <th>ต้องการ / ชอบ</th>
                        <th>ไม่ต้องการ / ไม่ชอบ</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="product-data-container">
                                <input class="form-search-custom-awl" type="text" list="product_twodata1" name="product_twolist[]" id="product_twolist1" onkeyup="addProductRow('1','product_outlist1',this.value,'txtHint1','product_twolist1')" placeholder="Product Search" autocomplete="off" />
                                <input type="hidden" name="product_outlist1" id="product_outlist1" />
                                <div id="txtHint1" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"></div>
                            </div>
                        </td>
                        <td><input class="text-center" type="text" name="" id="" placeholder=""></td>
                        <td><input class="text-center" type="text" name="" id="" placeholder=""></td>
                    </tr>
                </table>

            <br><span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="myCreateFunction2()" ><img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มรุ่นสินค้า</span>

            <p class="mt-3"> รายละเอียดเพิ่มเติม <textarea class="textarea-form-control" style="width:100%;" name="" id=""  rows="3"></textarea> </p>

            <p>
                แนบไฟล์
                <input type="file" id="fileInput" style="display: none;">
                <label for="fileInput"><span class="badge border border-1 rounded-0 text-dark">Choose File</span></label>
                <span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px;"><img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์</span>
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
        cell2.innerHTML = `<td>
        <div class="product-data-container">
            <input class="form-search-custom-awl" type="text" list="product_twodata1" name="product_twolist[]" id="product_twolist${rowCount}" onkeyup="addProductRow('${rowCount}','product_outlist${rowCount}',this.value,'txtHint${rowCount}','product_twolist${rowCount}')" placeholder="Product Search" autocomplete="off" />
            <input type="hidden" name="product_outlist${rowCount}" id="product_outlist${rowCount}" />
            <div id="txtHint${rowCount}" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"></div>
        </div>
        </td>`;
        cell3.innerHTML = `<td><input class="text-center" type="text" name="" id="" placeholder=""></td>`;
        cell4.innerHTML = `<td><input class="text-center" type="text" name="" id="" placeholder=""></td>`;
    }

    function myDeleteFunction() {
        document.getElementById("demo_product").deleteRow(-1);
    }
</script>

<script>
    // ใช้ fetch API เพื่อดึงข้อมูลจาก API
    fetch('https://testpr-wr.allwellcenter.com/customers_json')
        .then(response => response.json())
        .then(data => {
            var selectElement = document.getElementById('customerSelect');
            
            data.forEach(function(customer) {
                var option = document.createElement('option');
                option.value = customer.customer_name;
                option.textContent = customer.customer_name;
                selectElement.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
</script>


<script>
function addProductRow(rowNum, fieldName, searchTerm,txtHint,product_twolist) {
    if (!searchTerm.trim() || searchTerm.length == 0) {
        document.getElementById(`${txtHint}`).innerHTML = "";
        document.getElementById(`${txtHint}`).style.display = "none";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById(`${txtHint}`).innerHTML = this.responseText;
            document.getElementById(`${txtHint}`).style.display = "block";
        }
    };
    
    xhr.open("GET", `product_list_controllers?q=${encodeURIComponent(searchTerm)}&rowNum=${rowNum}&fieldName=${encodeURIComponent(fieldName)}&txtHint=${encodeURIComponent(txtHint)}&product_twolist=${encodeURIComponent(product_twolist)}`, true);
    xhr.send();
}
</script>