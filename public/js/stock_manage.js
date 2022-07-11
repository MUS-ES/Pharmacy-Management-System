function searchPage(Page = 1) {
    let medicineName = document.getElementById("sea-name").value.trim();
    let genericName = document.getElementById("sea-generic").value.trim();
    let supplierName = document.getElementById("sea-supplier").value.trim();
    let outOfStockBtn = document.getElementById("out-of-stock-btn").classList.contains("active");
    let expireBtn = document.getElementById("expire-btn").classList.contains("active");
    let data = { page: Page, name: medicineName, generic: genericName, supplier: supplierName, outOfStock: outOfStockBtn, expire: expireBtn };
    promiseJax('/stock/search', data, "POST", 1, 0).then(Response => {
        document.getElementById("table-area").innerHTML = Response;
        paginator = document.getElementsByClassName("paginator");
        Array.from(paginator).forEach(e => {

            e.addEventListener("click", function (event) {
                event.preventDefault();

            });
        });
    }).catch((error) => {

        console.log(error);
    });
}


function addRule(currentEle) {
    currentEle.onclick = function () {
        currentEle.classList.toggle("active");
        searchPage();
    }

}



function saveStock() {
    let validated = validateStock();
    if (validated) {
        promiseJax("stock/add", validated.data, "post", 1, 0).then(response => {
            console.log(response);
        }).catch((error) => {

            console.log(error);
        });
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
async function deleteStock(currentElement) {


    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/stock/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        }).catch((error) => {

            console.log(error);
        });

    }
}
