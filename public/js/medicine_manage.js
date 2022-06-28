function search() {
    let medicineName = document.getElementById("sea-name").value.trim();
    let genericName = document.getElementById("sea-generic").value.trim();
    promiseJax('/medicine/search', { name: medicineName, generic: genericName }, "POST", 1, 0).then(Response => {
        document.getElementById("table-area").innerHTML = Response;
    }).catch((error) => {

        console.log(error);
    });
}
async function deleteMedicine(currentElement) {


    await openPopup('/ajax/popup/confirm', { msg: 'if you delete this all records depends in this record will also deleted ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/medicine/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        }).catch((error) => {

            console.log(error);
        });

    }

}
