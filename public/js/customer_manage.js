function search() {
    let customerName = document.getElementById("sea-name").value.trim();
    promiseJax('/customer/search', { name: customerName }, "POST", 1, 0).then(Response => {

        document.getElementById("table-area").innerHTML = Response;
    })
}
function deleteCustomer(currentElement) {
    promiseJax("/customer/delete", { id: currentElement.dataset.id }, "DELETE").then(response => {
        search();
    })
}
