function search() {
    let medicineName = document.getElementById("sea-name").value.trim();
    let genericName = document.getElementById("sea-generic").value.trim();
    let supplierName = document.getElementById("sea-supplier").value.trim();
    promiseJax('searchMedicines', { name: medicineName, generic: genericName }, "POST", 1, 0).then(Response => {
        console.log(Response);
        document.getElementById("table-area").innerHTML = Response;
    })
}
