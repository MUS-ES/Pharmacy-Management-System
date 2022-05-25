class PurchaseItem {
    constructor(medicine, mfd, exp, qty, price, supplierPrice) {
        this.medicine = medicine;
        this.exp = exp;
        this.mfd = mfd;
        this.qty = qty;
        this.price = price;
        this.supplierPrice = supplierPrice;

    }
}

function addInvoice() {
    let container = document.getElementById("bill-rows");
    let bill = document.getElementById("bill-body");
    let newbill = bill.cloneNode(1);
    let hr = document.createElement("hr");
    hr.classList.add("horizontal-rule");
    newbill.classList.add("canremove");
    inputs = newbill.querySelectorAll("input");
    let list = newbill.querySelector(".list");
    if (list != null) {
        list.remove();
    }
    inputs.forEach(e => {
        e.value = "";
    });
    container.appendChild(newbill);
    container.appendChild(hr);
}
function removeInvoice(element) {

    let invoice = element.parentElement.parentElement;
    let hr = invoice.nextSibling;
    if (invoice.classList.contains("canremove")) {

        invoice.remove();
        hr.remove();
    }

}


function fillFields(billElement) {
    let medicineElement = billElement.querySelector("#sub-purchase-medicine")
    let packingElement = billElement.querySelector("#sub-purchase-packing");
    let salepriceElement = billElement.querySelector("#sub-purchase-sale-price");
    packingElement.value = 0;
    salepriceElement.value = 0;

    promiseJax("/medicine/details", { medicine: medicineElement.value }, "POST", true, true).then((response) => {
        console.log(response);
        if (response.medicine != null) {

            packingElement.value = response.medicine.strip_unit;
            salepriceElement.value = response.medicine.price;
        }
    });

}
function fillPurchaseDetails() {

    let totalElements = document.querySelectorAll("#sub-purchase-total");
    let qtyElements = document.querySelectorAll("#sub-purchase-qty");
    let salePriceElements = document.querySelectorAll("#sub-purchase-sale-price");
    let finalpriceElement = document.querySelector("#finalprice");
    let length = totalElements.length;
    let totalSum = 0;
    /* Changing values */
    for (let i = 0; i < length; i++) {

        totalSum += totalElements[i].value = qtyElements[i].value * salePriceElements[i].value;
    }

    finalpriceElement.value = totalSum;

}

function getPurchaseDetails() {
    let purchaseItemsArray = [];
    let purchaseItems = document.getElementsByClassName("purchase-items");
    let purchaseHeader = document.querySelector("#bill-header");
    let supplier = purchaseHeader.querySelector("#supplier-name");
    let purchaseDate = purchaseHeader.querySelector("#purchase-date");
    let total = document.querySelector("#finalprice");
    let paid = document.querySelector("#paid");
    let paymentType = purchaseHeader.querySelector("#payment-type");
    Array.from(purchaseItems).forEach(item => {
        let medicine = item.querySelector("#sub-purchase-medicine");
        let qty = item.querySelector("#sub-purchase-qty");
        let expDate = item.querySelector("#sub-purchase-exp-date");
        let mfdDate = item.querySelector("#sub-purchase-mfd-date");
        let unitPrice = item.querySelector("#sub-purchase-sale-price");
        let supplierPrice = item.querySelector("#sub-purchase-supplier-price");
        let purchaseItemObject = new PurchaseItem(medicine.value, mfdDate.value, expDate.value, qty.value, unitPrice.value, supplierPrice.value);
        purchaseItemsArray.push(purchaseItemObject);
    });
    return { total: total.value, status: ((paid.value == total.value) ? "Paid" : "Partially Paid"), date: purchaseDate.value, provider: paymentType.value, supplier: supplier.value, items: purchaseItemsArray };
}

function savePurchase() {
    let purchase = getPurchaseDetails();
    promiseJax("/purchase/add", purchase, "POST", true, true).then(response => {
        console.log(response);
        if (response.success == 1) {

            openPopup('/ajax/popup/feedback', { msg: "success" });
        }
        else if (response.status = 422) {
            let errorList = document.getElementById("invalid-feedback-list");

            for (let item of Object.values(response.errors)) {
                console.log(item);
                let li = document.createElement("li");
                li.innerText = item;
                errorList.appendChild(li);
            }
        }
    });
}
