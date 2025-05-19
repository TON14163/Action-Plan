function addProductRow(rowNum, fieldName, searchTerm, txtHint, product_twolist) {
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
    
    xhr.open("GET", "./src/controllers/product_list_controllers.php?q=" + encodeURIComponent(searchTerm) + "&rowNum=" + rowNum + "&fieldName=" + encodeURIComponent(fieldName) + "&txtHint=" + encodeURIComponent(txtHint) + "&product_twolist=" + encodeURIComponent(product_twolist), true);
    xhr.send();
}