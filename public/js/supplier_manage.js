function search() {
    let supplierName = document.getElementById("sea-name").value.trim();
    promiseJax('/supplier/search', { name: supplierName }, "POST", 1, 0).then(Response => {

        document.getElementById("table-area").innerHTML = Response;
    })
}
function deleteSupplier(currentElement) {
    promiseJax("/supplier/delete", { id: currentElement.dataset.id }, "DELETE").then(response => {
        search();
    })
}
