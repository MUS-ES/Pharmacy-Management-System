function searchPage(Page = 1) {
    let supplierName = document.getElementById("sea-name").value.trim();
    promiseJax('/supplier/search', { page: Page, name: supplierName }, "POST", 1, 0).then(Response => {

        document.getElementById("table-area").innerHTML = Response;
        paginator = document.getElementsByClassName("paginator");
        Array.from(paginator).forEach(e => {

            e.addEventListener("click", function (event) {
                event.preventDefault();

            });
        });
    }).catch((error) => {

        console.log(error);
    });
}
async function deleteSupplier(currentElement) {
    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/supplier/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            searchPage();

        }).catch((error) => {

            console.log(error);
        });;

    }
}
