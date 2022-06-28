function showInvoiceItems(currentElement) {

    promiseJax("/invoice/items/" + currentElement.dataset.id, null, "GET", true, 0).then(response => {
        let popup = document.getElementById("popup");
        popup.classList.add("active");
        popup.innerHTML = response;
        document.querySelector(".container1").style.display = "flex";
        document.getElementById("close-btn").addEventListener("click",
            function () {
                document.querySelector(".container1").style.display = "none";
            }).catch((error) => {

                console.log(error);
            });
    });

}


function search() {
    let invoiceNumber = document.getElementById("sea-invoice-number").value.trim();
    let customerName = document.getElementById("sea-customer-name").value.trim();
    let fromDate = document.getElementById("sea-from-date").value.trim();
    let toDate = document.getElementById("sea-to-date").value.trim();
    promiseJax('/invoice/search', { id: invoiceNumber, customer: customerName, from: fromDate, to: toDate }, "POST", 1, 0).then(response => {
        document.getElementById("table-area").innerHTML = response;
    }).catch((error) => {

        console.log(error);
    });
}


async function deleteInvoice(currentElement) {

    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/invoice/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        }).catch((error) => {

            console.log(error);
        });

    }

}

