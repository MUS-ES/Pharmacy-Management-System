
function search() {
    let voucherNumber = document.getElementById("sea-voucher-number").value.trim();
    let voucherType = document.getElementById("sea-voucher-type").value.trim();
    let fromDate = document.getElementById("sea-from-date").value.trim();
    let toDate = document.getElementById("sea-to-date").value.trim();
    promiseJax('/voucher/search', { id: voucherNumber, type: voucherType, from: fromDate, to: toDate }, "POST", 1, 0).then(response => {
        document.getElementById("table-area").innerHTML = response;
    })
}


function deleteVoucher(currentElement) {
    promiseJax("/voucher/delete", { id: currentElement.dataset.id }, "DELETE").then(response => {
        search();
    })
}

