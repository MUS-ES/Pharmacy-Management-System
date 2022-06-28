
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
    let salepriceElement = billElement.querySelector("#sub-purchase-sale-price");
    salepriceElement.value = 0;

    promiseJax("/medicine/show", { medicine: medicineElement.value }, "POST", true, true).then((response) => {
        if (response.instance != null) {

            salepriceElement.value = response.instance.price;
        }
    }).catch((error) => {

        console.log(error);
    });

}
function fillPurchaseDetails() {

    let totalElements = document.querySelectorAll("#sub-purchase-total");
    let qtyElements = document.querySelectorAll("#sub-purchase-qty");
    let salePriceElements = document.querySelectorAll("#sub-purchase-supplier-price");
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
    return { total: total.value, paid: paid.value, status: ((paid.value == total.value) ? "Paid" : "Partially Paid"), date: purchaseDate.value, provider: paymentType.value, supplier: supplier.value, items: purchaseItemsArray };
}

function savePurchase() {
    let purchase = getPurchaseDetails();
    promiseJax("/purchase/add", purchase, "POST", true, true).then(response => {

        openPopup('/ajax/popup/feedback', { msg: "success" });
    }).catch((response) => {

        let errorList = document.getElementById("invalid-feedback-list");
        while (errorList.firstChild) {
            errorList.removeChild(errorList.lastChild);
        }
        for (let item of Object.values(response.errors)) {
            let li = document.createElement("li");
            li.innerText = item;
            errorList.appendChild(li);
        }
    });
}

let discardBtn = document.getElementById("discard-btn").onclick = function () {
    inputs = document.getElementsByTagName("input");
    Array.from(inputs).forEach((ele) => {
        ele.value = "";
    });
};
