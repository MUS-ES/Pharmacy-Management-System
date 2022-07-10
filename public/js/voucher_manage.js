
function searchPage(Page = 1) {
    let voucherNumber = document.getElementById("sea-voucher-number").value.trim();
    let voucherType = document.getElementById("sea-voucher-type").value.trim();
    let fromDate = document.getElementById("sea-from-date").value.trim();
    let toDate = document.getElementById("sea-to-date").value.trim();

    promiseJax('/voucher/search', { page: Page, id: voucherNumber, type: voucherType, from: fromDate, to: toDate }, "POST", 1, 0).then(response => {
        document.getElementById("table-area").innerHTML = response;
        paginator = document.getElementsByClassName("paginator");
        Array.from(paginator).forEach(e => {

            e.addEventListener("click", function (event) {
                event.preventDefault();

            });
        });
    });
}


async function deleteVoucher(currentElement) {
    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/voucher/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        }).catch((error) => {

            console.log(error);
        });


    }
}


