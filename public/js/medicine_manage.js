function searchPage(Page = 1) {
    let medicineName = document.getElementById("sea-name").value.trim();
    let genericName = document.getElementById("sea-generic").value.trim();
    promiseJax('/medicine/search', { page: Page, name: medicineName, generic: genericName }, "POST", 1, 0).then(Response => {
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
async function deleteMedicine(currentElement) {


    await openPopup('/ajax/popup/confirm', { msg: 'If you delete this all records depends on this record will also deleted ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/medicine/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            searchPage();

        }).catch((error) => {

            console.log(error);
        });

    }

}
