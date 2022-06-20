function search() {
    let medicineName = document.getElementById("sea-name").value.trim();
    let genericName = document.getElementById("sea-generic").value.trim();
    let supplierName = document.getElementById("sea-supplier").value.trim();
    promiseJax('/medicine/search', { name: medicineName, generic: genericName }, "POST", 1, 0).then(Response => {
        document.getElementById("table-area").innerHTML = Response;
    })
}
async function deleteMedicine(currentElement) {


    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/medicine/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        });

    }

}
