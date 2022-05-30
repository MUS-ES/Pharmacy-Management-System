function search() {
    let medicineName = document.getElementById("sea-name").value.trim();
    let genericName = document.getElementById("sea-generic").value.trim();
    let supplierName = document.getElementById("sea-supplier").value.trim();
    let outOfStockBtn = document.getElementById("out-of-stock-btn").classList.contains("active");
    let expireBtn = document.getElementById("expire-btn").classList.contains("active");
    let data = { name: medicineName, generic: genericName, supplier: supplierName, outOfStock: outOfStockBtn, expire: expireBtn };
    promiseJax('/stock/search', data, "POST", 1, 0).then(Response => {
        document.getElementById("table-area").innerHTML = Response;
    });
}


function addRule(currentEle) {
    currentEle.onclick = function () {
        currentEle.classList.toggle("active");
        search();
    }

}



function saveStock() {
    let validated = validateStock();
    if (validated) {
        promiseJax("stock/add", validated.data, "post", 1, 0).then(response => {
            console.log(response);
        })
    }
}

function validateStock() {
    let medicineELement = document.getElementById("stock-medicine-name");
    let mfdElement = document.getElementById("stock-mfd");
    let expElement = document.getElementById("stock-exp");
    let qtyElement = document.getElementById("stock-qty");
    let supplierElement = document.getElementById("stock-supplier");
    let valid = 1;
    if (medicineELement.value.trim() == "") {
        medicineELement.focus();
        medicineELement.nextElementSibling.innerText = "Please enter med name";
        valid = 0;
    }
    if (mfdElement.value.trim() == "") {
        mfdElement.focus();
        mfdElement.nextElementSibling.innerText = "Mfd Date !";
        valid = 0;
    }
    if (expElement.value.trim() == "") {
        expElement.focus();
        expElement.nextElementSibling.innerText = "Exp Date !";
        valid = 0;
    }
    if (qtyElement.value.trim() == "") {
        expElement.focus();
        expElement.nextElementSibling.innerText = "Quantity !";
        valid = 0;
    }
    let data = { medicine: medicineELement.value, mfd: mfdElement.value, exp: expElement.value, qty: qtyElement.value, supplier: supplierElement.value };
    return { valid: valid, data: data };
}
function deleteStock(currentElement) {
    promiseJax("/stock/delete", { id: currentElement.dataset.id }, "DELETE").then(response => {
        console.log(response);
        search();
    })
}
