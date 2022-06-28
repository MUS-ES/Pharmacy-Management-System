function search() {
    let supplierName = document.getElementById("sea-name").value.trim();
    promiseJax('/supplier/search', { name: supplierName }, "POST", 1, 0).then(Response => {

        document.getElementById("table-area").innerHTML = Response;
    }).catch((error) => {

        console.log(error);
    });
}
async function deleteSupplier(currentElement) {
    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/supplier/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        }).catch((error) => {

            console.log(error);
        });;

    }
}
