<style>

#demo_planitem {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr ;
    gap: 10px 0px;
}

#planitemlist:nth-child(1) {
  grid-area: 1 / 1 / 2 / 2;
}

#planitemlist:nth-child(2) {
  grid-area: 1 / 2 / 2 / 3;
}

#planitemlist:nth-child(3) {
  grid-area: 1 / 3 / 2 / 4;
}

#planitemlist:nth-child(4) {
  grid-area: 1 / 4 / 2 / 5;
}

#planitemlist:nth-child(5) {
  grid-area: 2 / 1 / 3 / 2;
}

#planitemlist:nth-child(6) {
  grid-area: 2 / 2 / 3 / 3;
}

#planitemlist:nth-child(7) {
  grid-area: 2 / 3 / 3 / 4;
}

#planitemlist:nth-child(8) {
  grid-area: 2 / 4 / 3 / 5;
}

</style>

<hr class="my-4">

<section>
    <div class="row font-custom-awl-14" style="padding: 0 20px; font-weight: bold;">
        <div class="col-1">เลือกสินค้า</div>
        <div class="col-11">
            <table class="table table-borderless" style="width: 100%; border: none; padding: 0;">
                <tr>
                    <td style="border: none; text-align: left; padding: 0;">
                        <input type="checkbox" name="planitem[]" id="item1" value="เตียงผู้ป่วยไฟฟ้า" onclick="ListItemPlan(this.value, 'item1', this.checked)">
                        <label for="item1">เตียงผู้ป่วยไฟฟ้า</label>
                    </td>
                    <td style="border: none; text-align: left; padding: 0;">
                        <input type="checkbox" name="planitem[]" id="item2" value="เตียงกายภาพ" onclick="ListItemPlan(this.value, 'item2', this.checked)">
                        <label for="item2">เตียงกายภาพ</label>
                    </td>
                    <td style="border: none; text-align: left; padding: 0;">
                        <input type="checkbox" name="planitem[]" id="item3" value="ที่นอนโฟม" onclick="ListItemPlan(this.value, 'item3', this.checked)">
                        <label for="item3">ที่นอนโฟม</label>
                    </td>
                    <td style="border: none; text-align: left; padding: 0;">
                        <input type="checkbox" name="planitem[]" id="item4" value="เครื่องดูดเสมหะ" onclick="ListItemPlan(this.value, 'item4', this.checked)">
                        <label for="item4">เครื่องดูดเสมหะ</label>
                    </td>
                </tr>
                <tr>
                    <td style="border: none; text-align: left; padding: 0;">
                        <input type="checkbox" name="planitem[]" id="item5" value="เตียงตรวจ OPD" onclick="ListItemPlan(this.value, 'item5', this.checked)">
                        <label for="item5">เตียงตรวจ OPD</label>
                    </td>
                    <td style="border: none; text-align: left; padding: 0;">
                        <input type="checkbox" name="planitem[]" id="item6" value="เตียงเคลื่อนย้าย" onclick="ListItemPlan(this.value, 'item6', this.checked)">
                        <label for="item6">เตียงเคลื่อนย้าย</label>
                    </td>
                    <td style="border: none; text-align: left; padding: 0;">
                        <input type="checkbox" name="planitem[]" id="item7" value="เครื่องวัดน้ำตาล" onclick="ListItemPlan(this.value, 'item7', this.checked)">
                        <label for="item7">เครื่องวัดน้ำตาล</label>
                    </td>
                    <td style="border: none; text-align: left; padding: 0;">
                        <input type="checkbox" name="planitem[]" id="item8" value="อื่นๆ / สินค้ารวม" onclick="ListItemPlan(this.value, 'item8', this.checked)">
                        <label for="item8">อื่นๆ / สินค้ารวม</label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>

<script>
    function ListItemPlan(keyValue, keyId, isChecked, keyEditValue) {
        const demoPlanItem = document.getElementById("demo_planitem");
        
        if (isChecked) {
            const viewItem = document.createElement('div');
            viewItem.id = `item-${keyId}`;
            if(keyEditValue === '1'){
                viewItem.innerHTML = `
                        ${keyValue}
                        <select class="form-select-custom-awl" name="planitemlist[]" id="planitemlist" required>
                            <option value="${keyValue}:1:${keyId}">แจก Catalog</option>
                            <option value="">Please Select</option>
                            <option value="${keyValue}:2:${keyId}">พูดคุย นำเสนอ</option>
                        </select>
                `;
            } else if(keyEditValue === '2'){
                viewItem.innerHTML = `
                        ${keyValue}
                        <select class="form-select-custom-awl" name="planitemlist[]" id="planitemlist" required>
                            <option value="${keyValue}:2:${keyId}">พูดคุย นำเสนอ</option>
                            <option value="">Please Select</option>
                            <option value="${keyValue}:1:${keyId}">แจก Catalog</option>
                        </select>
                `;
            } else {
                viewItem.innerHTML = `
                        ${keyValue}
                        <select class="form-select-custom-awl" name="planitemlist[]" id="planitemlist" required>
                            <option value="">Please Select</option>
                            <option value="${keyValue}:1:${keyId}">แจก Catalog</option>
                            <option value="${keyValue}:2:${keyId}">พูดคุย นำเสนอ</option>
                        </select>
                `;
            }
            demoPlanItem.appendChild(viewItem);
        } else {
            const itemToRemove = document.getElementById(`item-${keyId}`);
            if (itemToRemove) {
                itemToRemove.remove();
            }
        }
    }
</script>


<?php echo "<script type='text/javascript'> let product_presents = '".$show->showDetails($id_work,'product_present')."' </script>"; ?>
    <script>
    // document.write(product_presents+`<br>`);
    window.onload = function() {
    product_presents = JSON.parse(product_presents);
    product_presents.forEach(product_present => {
        let product_present_value = product_present.itemlist.split(':')[1];
        let product_present_cut = product_present.itemlist.slice(-1);
        switch (product_present_cut) {
            case '1': document.getElementById('item1').checked = true; ListItemPlan('เตียงผู้ป่วยไฟฟ้า', 'item1', true, product_present_value); break;
            case '2': document.getElementById('item2').checked = true; ListItemPlan('เตียงกายภาพ', 'item2', true, product_present_value); break;
            case '3': document.getElementById('item3').checked = true; ListItemPlan('ที่นอนโฟม', 'item3', true, product_present_value); break;
            case '4': document.getElementById('item4').checked = true; ListItemPlan('เครื่องดูดเสมหะ', 'item4', true, product_present_value); break;
            case '5': document.getElementById('item5').checked = true; ListItemPlan('เตียงตรวจ OPD', 'item5', true, product_present_value); break;
            case '6': document.getElementById('item6').checked = true; ListItemPlan('เตียงเคลื่อนย้าย', 'item6', true, product_present_value); break;
            case '7': document.getElementById('item7').checked = true; ListItemPlan('เครื่องวัดน้ำตาล', 'item7', true, product_present_value); break;
            case '8': document.getElementById('item8').checked = true; ListItemPlan('อื่นๆ / สินค้ารวม', 'item8', true, product_present_value); break;
            default: break;
        }
    });
};
    </script>

<hr class="my-4">

<section>
    <div class="row font-custom-awl-14" style="padding: 0px 20px; font-weight: bold;">
        <div class="col-1">แผนงาน</div>
        <div class="col-11" >
            <div id="demo_planitem"> </div>
        </div>
        <div class="col-12 mt-3"><textarea class="textarea-form-control" style="width:100%; background-color: #e0e0e0; cursor:no-drop;" rows="3" name="plan_work" id="plan_work" readonly><?php echo $show->showDetails($id_work,'plan_work');?></textarea></div>
    </div>
</section>
<hr class="my-4">

