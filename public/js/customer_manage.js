function searchPage(Page = 1) {
    let customerName = document.getElementById("sea-name").value.trim();
    promiseJax('/customer/search', { page: Page, name: customerName }, "POST", 1, 0).then(Response => {

        document.getElementById("table-area").innerHTML = Response;
        paginator = document.getElementsByClassName("paginator");
        Array.from(paginator).forEach(e => {

            e.addEventListener("click", function (event) {
                event.preventDefault();

            });
        });
    }).catch((error) => {

        console.log(error);
    })
}
async function deleteCustomer(currentElement) {

    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/customer/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        }).catch((error) => {

            console.log(error);
        });

    }
}
