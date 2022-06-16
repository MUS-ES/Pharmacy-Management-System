
function search() {
    let voucherNumber = document.getElementById("sea-voucher-number").value.trim();
    let fromDate = document.getElementById("sea-from-date").value.trim();
    let toDate = document.getElementById("sea-to-date").value.trim();
    promiseJax('/voucher/payment/search', { id: voucherNumber, from: fromDate, to: toDate }, "POST", 1, 0).then(response => {
        document.getElementById("table-area").innerHTML = response;
    })
}


function deleteVoucher(currentElement) {
    promiseJax("/voucher/payment/delete", { id: currentElement.dataset.id }, "DELETE").then(response => {
        search();
    })
}

