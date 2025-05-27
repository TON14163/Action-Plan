    // ใช้ fetch API เพื่อดึงข้อมูลจาก API
    // function fetchData(selectElementKeyword, fetchKeyword) {
    //     fetch(fetchKeyword)
    //         // fetch(<?php // echo $customerapi;?>)
    //         .then(response => response.json())
    //         .then(data => {
    //             var selectElement = document.getElementById(selectElementKeyword);
                
    //             data.forEach(function(customer) {
    //                 var option = document.createElement('option');
    //                 option.value = customer.customer_name;
    //                 option.textContent = customer.customer_name;
    //                 selectElement.appendChild(option);
    //             });
    //         })
    //         .catch(error => console.error('Error:', error));
    // }


    fetch(`<?php echo $cumapi;?>`)
    // fetch(<?php // echo $customerapi;?>)
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