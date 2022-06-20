function search() {
    let customerName = document.getElementById("sea-name").value.trim();
    promiseJax('/customer/search', { name: customerName }, "POST", 1, 0).then(Response => {

        document.getElementById("table-area").innerHTML = Response;
    })
}
async function deleteCustomer(currentElement) {

    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/customer/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        });

    }
}
