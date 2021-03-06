
class Voucher {
    constructor(type, amount, description, date) {
        this.type = type;
        this.amount = amount;
        this.description = description;
        this.date = date;
    }
}

function addVoucher() {
    let container = document.getElementById("bill-rows");
    let bill = container.firstElementChild;
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
function removeVoucher(element) {

    let invoice = element.parentElement.parentElement;
    let hr = invoice.nextSibling;
    if (invoice.classList.contains("canremove")) {

        invoice.remove();
        hr.remove();
    }

}

function save() {
    let vouchers = getVoucherDetails();
    promiseJax("/voucher/add", vouchers, "POST", false).then(response => {
        if (response.success == 1) {
            openPopup('/ajax/popup/feedback', { msg: "success" });

        }
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

function getVoucherDetails() {
    let vouchersArray = [];
    let voucherFields = document.getElementsByClassName("voucher-items");
    let date = document.getElementById("voucher-date");
    Array.from(voucherFields).forEach(item => {
        let type = item.querySelector("#voucher-type");
        let amount = item.querySelector("#amount");
        let description = item.querySelector("#description");
        let voucherObject = new Voucher(type.value, amount.value, description.value, date.value);
        vouchersArray.push(voucherObject);
    });
    return { vouchers: vouchersArray };
}


function fillTotalFields() {
    let vouchersRow = document.getElementsByClassName("voucher-items");
    let totalPayment = document.getElementById("total-payment");
    let totalReceipt = document.getElementById("total-receipt");
    let totalCash = document.getElementById("total-cash");
    totalPayment.value = 0;
    totalReceipt.value = 0;
    totalCash.value = 0;
    Array.from(vouchersRow).forEach(row => {
        let type = row.querySelector("#voucher-type").value;
        let amount = row.querySelector("#amount").value;
        if (type == "Payment")
            totalPayment.value = (+totalPayment.value) + +amount;
        else if (type == "Receipt")
            totalReceipt.value = +totalReceipt.value + +amount;
        else {

            totalCash.value = +totalCash.value + +amount;
        }

    });

}

let discardBtn = document.getElementById("discard-btn").onclick = function () {
    inputs = document.getElementsByTagName("input");
    Array.from(inputs).forEach((ele) => {
        ele.value = "";
    });
};
