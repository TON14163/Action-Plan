<div class="accordion-item rounded-0 border border-0">
    <p class="accordion-header d-flex align-items-center justify-content-between" style="background-color: #FAFAFA;">
        <span class="rounded-0 border border-0"><input type="checkbox" name="listmain1" id="listmain1" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1" value="1"> &nbsp; &nbsp; <label for="listmain1">ประมาณการขาย</label></span>
        <span id="panelsStayOpen-collapse1" class="accordion-collapse collapse">
            <a href="https://quotation.allwellcenter.com/" target="_blank"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> ใบเสนอราคา</span></a>
            <a href="https://sol.allwellcenter.com/" target="_blank"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> ERP SALE</span></a>
        </span>
    </p>
    <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
        <div class="accordion-body">
            <!--  -->
                <table class="table-thead-custom-awl table-bordered border-secondary">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา / หน่วย</th>
                        <th>มูลค่า</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="product-data-container">
                                <input class="form-search-custom-awl" type="text" list="product_onedata1" name="product_onelist[]" id="product_onelist1" onkeyup="addProductRow('1','product_outlistone1',this.value,'txtHintone1','product_onelist1')" placeholder="Product Search" autocomplete="off" />
                                <input type="hidden" name="product_outlistone1" id="product_outlistone1" />
                                <div id="txtHintone1" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"></div>
                            </div>
                        </td>
                        <td><input class="text-center" type="text" name="unit_product1" id="unit_product1" placeholder="0"></td>
                        <td><input class="text-center" type="text" name="price_unit1" id="price_unit1" placeholder="0.00"></td>
                        <td><input class="text-center" type="text" name="price_product1" id="price_product1" placeholder="0.00"></td>
                    </tr>
                </table>
            <div class="d-flex align-items-center justify-content-between my-4">
                <label for="inputPassword" class="">เปอร์เซ็นต์&nbsp;</label> 
                <select name="percent_code" id="percent_code" style="width: 100px;">
                    <option value="">Please Select</option>
                    <option value="100%">100%</option>
                    <option value="90-99%">90-99%</option>
                    <option value="80-89%">80-89%</option>
                    <option value="50-80%">50-80%</option>
                    <option value="0-50%">0-50%</option>
                </select>
                <label for="inputPassword" class="">วันที่จะได้รับ P/O&nbsp;</label> <input class="text-center" style="width: 143px;" type="date" name="month_po" id="month_po" >
                <label for="inputPassword" class="">มูลค่าทั้งหมด&nbsp;</label> <input class="text-center" style="width: 100px;" type="text" name="sum_price_product" id="sum_price_product" placeholder="0">
                <label for="inputPassword" class="">วันที่ต้องการสินค้า&nbsp;</label> <input class="text-center" style="width: 143px;" type="date" name="date_request" id="date_request" >
                <label for="inputPassword" class="">ประเภท&nbsp;</label>
                <select name="type_cus" id="type_cus"  style="width: 151px;">
                    <option value="">Please Select</option>
                    <option value="">ProA (Project A+ / A)</option>
                    <option value="">NewB (New Building)</option>
                    <option value="">NewF (New Forecast)</option>
                    <option value="">Pre/B (Present / Booth)</option>
                    <option value="">ลูกค้าทั่วไป / เจ้าหน้าที่รพ.</option>
                </select>
            </div>
            <div>
                <textarea class="textarea-form-control" style="width:100%;" name="description_focastnew" id="description_focastnew"  rows="3"></textarea>
            </div>
            <!--  -->
        </div>
    </div>
</div>