<style>
    .list2file1_allfile1Styel{
        background-color: #FCFCFC;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        border-radius: 15px;
        font-size: 10px;
        padding: 0px 10px;
        color: #0080c0;
    }
    .file-section{
        margin-top: 15px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        padding:5px 10px 15px 10px; 
        border-radius: 15px;
    }
</style>
<div class="accordion-item rounded-0 border border-0" style="margin: 20px 0px;">
    <p class="accordion-header d-flex align-items-center justify-content-between" style="background-color: #FAFAFA;" id="feature11">
        <span class="rounded-0 border border-0"><input type="checkbox" name="listmain2" id="listmain2" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="true" aria-controls="panelsStayOpen-collapse2" value="1"> &nbsp; &nbsp; <label for="listmain2">Demo ทดลองสินค้า</label></span>
        <span id="panelsStayOpen-collapse2" class="accordion-collapse collapse">
        <?php if($_SESSION['typelogin'] != 'Supervisor'){ ?>
            <a href="https://sol.allwellcenter.com/main_salehos_br.php" target="_blank" data-bs-toggle="tooltip" data-bs-title="ออกใบยืม sale"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> ออกใบยืม</span></a>
        <?php } else { ?>
            <a href="https://sol.allwellcenter.com/main_suphos_br.php" target="_blank" data-bs-toggle="tooltip" data-bs-title="ออกใบยืม sup"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> ออกใบยืม</span></a>
        <?php } ?>
        </span>
    </p>
    <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" >
        <div class="accordion-body">
            <!-- มีเลขที่อ้างอิง ถึงแสดงส่วนนี้เช่น BR680400070	-->
            <!-- <table class="table-thead-custom-awl table-bordered border-secondary mb-4 mt-1">
                <thead>
                    <tr>
                    <th style="width: 12.5%;">เลขที่อ้างอิง</th>
                    <th style="width: 12.5%;">วันที่ออกเอกสาร</th>
                    <th style="width: 12.5%;">เลขที่ใบยืม</th>
                    <th style="width: 20%;">ชื่อลูกค้า</th>
                    <th style="width: 22.5%;">รายการสินค้า</th>
                    <th style="width: 10%;">จำนวน</th>
                    <th style="width: 10%;">หน่วย</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                    <td style="padding: 4px; ">BR680400070</td>
                    <td style="padding: 4px; ">date_br</td>
                    <td style="padding: 4px; ">BRNP.1594</td>
                    <td style="padding: 4px; text-align: left;">customer</td>
                    <td style="padding: 4px; text-align: left;">รายการสินค้า</td>
                    <td style="padding: 4px; ">จำนวน</td>
                    <td style="padding: 4px; ">หน่วย</td>
                </tr>
                </tbody>
            </table> -->

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
                            <input type="hidden" name="product_outlist[]" id="product_outlist1" />
                            <div id="txtHint1" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"></div>
                        </div>
                    </td>
                    <td><input class="text-center" type="text" name="cusrequest_like[]" id="cusrequest_like1" ></td>
                    <td><input class="text-center" type="text" name="cusrequest_dislike[]" id="cusrequest_dislike1" ></td>
                </tr>
            </table>

            <br><span class="badge rounded-pill" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="myCreateFunction2()" ><img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มรุ่นสินค้า</span>
            <p class="mt-3"> รายละเอียดเพิ่มเติม <textarea class="textarea-form-control" style="width:100%;" name="cuspre_descript" id="cuspre_descript" rows="3"><?php echo $show->showDelivery($id_work,'cuspre_descript');?></textarea> </p>

            <div id="fileAttachmentsContainer">
                <div class="file-section" data-row="1" style="padding-top:10px;">
                    <span class="badge rounded-pill mb-2" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addFileRow(1)"> 
                        <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์สินค้า 1 
                    </span> 
                    <div> <p><font id="list2file1_allfile1"></font></p> </div>
                    <div id="fileRowsContainer1" style="max-width: 100%; display: flex; flex-wrap:wrap; align-items: center;">
                        <div> 
                            <label for="list2file1_1">แนบไฟล์</label> 
                            <input style="width: 150px;" type="file" name="list2file[1][]" id="list2file1_1">
                            <input type="hidden" name="list2_old_file[1][]" id="list2_old_file1_1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  $productDemoValues = $show->showDelivery($id_work, 'product_1'); echo "<script type='text/javascript'>let productDemos = " . json_encode($productDemoValues) . ";</script>"; ?>
<script type='text/javascript'>
    // document.write(productDemos);
    productDemos = JSON.parse(productDemos);
    productDemos.forEach((productDemo, index) => {
        // Add a new row for each productDemo if it's not the first one
        if (index > 0) {
            myCreateFunction2();
        }
        const rowId = index + 1; // Row IDs start from 1
        document.getElementById(`product_twolist${rowId}`).value = productDemo.productname;
        document.getElementById(`product_outlist${rowId}`).value = productDemo.productid;
        document.getElementById(`cusrequest_like${rowId}`).value = productDemo.inlike;
        document.getElementById(`cusrequest_dislike${rowId}`).value = productDemo.dislike;
        document.getElementById(`list2_old_file1_${rowId}`).value = productDemo.memoryfile.join('","');
        
        if (Array.isArray(productDemo.memoryfile)) {
            productDemo.memoryfile.forEach(memoryfilecut => {
            const fileLink = document.createElement('a');
            fileLink.href = `<?php echo $_SESSION['thisDomain'];?>uploads/${memoryfilecut}`;
            fileLink.target = '_blank';
            fileLink.rel = 'noopener noreferrer';
            fileLink.style.marginLeft = '5px';
            fileLink.textContent = memoryfilecut;
            fileLink.classList.add("list2file1_allfile1Styel");
            const fileContainer = document.getElementById(`list2file1_allfile${rowId}`);
            fileContainer.appendChild(fileLink);
            });
        } 
    });

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
            <input type="hidden" name="product_outlist[]" id="product_outlist${rowCount}" />
            <div id="txtHint${rowCount}" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"></div>
        </div>
    </td>`;
    cell3.innerHTML = `<td><input class="text-center" type="text" name="cusrequest_like[]" id="cusrequest_like${rowCount}" ></td>`;
    cell4.innerHTML = `<td><input class="text-center" type="text" name="cusrequest_dislike[]" id="cusrequest_dislike${rowCount}" ></td>`;

    // เพิ่มส่วนแนบไฟล์สำหรับแถวใหม่
    const attachmentsContainer = document.getElementById('fileAttachmentsContainer');
    const newFileSection = document.createElement('div');
    newFileSection.className = 'file-section';
    newFileSection.setAttribute('data-row', rowCount);
    newFileSection.innerHTML = `
        <span class="badge rounded-pill my-2" style="background-color: #525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" onclick="addFileRow(${rowCount})"> 
            <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มแนบไฟล์สินค้า ${rowCount} 
        </span>
        <div> <p><font id="list2file1_allfile${rowCount}"></font></p> </div>
        <div id="fileRowsContainer${rowCount}" style="max-width: 100%; display: flex; flex-wrap:wrap; align-items: center;">
            <div> 
                <label for="list2file${rowCount}_1">แนบไฟล์</label> 
                <input style="width: 150px;" type="file" name="list2file[${rowCount}][]" id="list2file${rowCount}_1">
                <input type="hidden" name="list2_old_file[${rowCount}][]" id="list2_old_file1_${rowCount}">
            </div>
        </div>
    `;
    attachmentsContainer.appendChild(newFileSection);
}

function addFileRow(rowNumber) {
    const container = document.getElementById(`fileRowsContainer${rowNumber}`);
    const rowCount = container.children.length + 1;
    if(rowCount <= 10) {
        const newRow = document.createElement('div');
        newRow.innerHTML = `
            <label for="list2file${rowNumber}_${rowCount}">แนบไฟล์</label> 
            <input style="width: 150px; margin: 5px 0px;" type="file" name="list2file[${rowNumber}][]" id="list2file${rowNumber}_${rowCount}">
        `;
        container.appendChild(newRow);
    }
}

function myDeleteFunction() {
    var table = document.getElementById("demo_product");
    if(table.rows.length > 1) {
        table.deleteRow(-1);
        const attachmentsContainer = document.getElementById('fileAttachmentsContainer');
        attachmentsContainer.lastElementChild.remove();
    }
}

// ใช้ fetch API เพื่อดึงข้อมูลจาก API
fetch('<?php echo $cumapi;?>')
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





// function viewFile(){
//     Swal.fire({
//     title: "ไฟล์แนบที่พบ...",
//     showConfirmButton: false,
//     footer: '<a href="#">Why do I have this issue?</a> \n \n \n  <a href="#">Why do I have this issue?</a>'
//     });
// }

</script>