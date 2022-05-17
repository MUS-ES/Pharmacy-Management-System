function search() {
    let medicineName = document.getElementById("sea-name").value.trim();
    let genericName = document.getElementById("sea-generic").value.trim();
    let supplierName = document.getElementById("sea-supplier").value.trim();
    let outOfStockBtn = document.getElementById("out-of-stock-btn").classList.contains("active");
    let expireBtn = document.getElementById("expire-btn").classList.contains("active");
    let data = { name: medicineName, generic: genericName, supplier: supplierName, outOfStock: outOfStockBtn, expire: expireBtn };
    promiseJax('searchstock', data, "POST", 1, 0).then(Response => {
        document.getElementById("table-area").innerHTML = Response;
    });
}

function autoCompleteMed(currentElement) {

    let list = document.getElementById("list-medicine");
    promiseJax("autocompletemed/", { term: currentElement.value.toLowerCase() }, "POST", true).then(medicines => {
        removeChilderns(list);
        if (medicines.success == 1) {
            for (let i of medicines.list) {
                let listItem = document.createElement("li");
                listItem.classList.add("list-items");
                listItem.style.cursor = "pointer";
                listItem.addEventListener("click", e => { displayNames(currentElement, list, i.name); });
                let word = "<b>" + i.name.substr(0, currentElement.value.length) + "</b>";
                word += i.name.substr(currentElement.value.length);
                listItem.innerHTML = word;
                currentElement.parentElement.querySelector("#list-medicine").appendChild(listItem);
            }
            list.classList.add("active");
        }
        else {
            list.classList.remove("active");

        }
    });
}
function removeChilderns(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.lastChild);
    }
}

function displayNames(medicineELement, list, value) {
    medicineELement.value = value;
    removeChilderns(list);
    list.classList.remove("active");
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
        promiseJax("/addstockentry", validated.data, "post", 1, 0).then(response => {
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
