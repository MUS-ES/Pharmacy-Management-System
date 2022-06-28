function showPurchaseItems(currentElement) {

    promiseJax("/purchase/items/" + currentElement.dataset.id, null, "GET", true, 0).then(response => {
        console.log(response);
        let popup = document.getElementById("popup");
        popup.classList.add("active");
        popup.innerHTML = response;
        document.querySelector(".container1").style.display = "flex";
        document.getElementById("close-btn").addEventListener("click",
            function () {
                document.querySelector(".container1").style.display = "none";
            });
    }).catch((error) => {

        console.log(error);
    });

}


function search() {
    let purchaseNumber = document.getElementById("sea-purchase-number").value.trim();
    let supplierName = document.getElementById("sea-supplier-name").value.trim();
    let fromDate = document.getElementById("sea-from-date").value.trim();
    let toDate = document.getElementById("sea-to-date").value.trim();
    promiseJax('/purchase/search', { id: purchaseNumber, supplier: supplierName, from: fromDate, to: toDate }, "POST", 1, 0).then(response => {
        document.getElementById("table-area").innerHTML = response;
    }).catch((error) => {

        console.log(error);
    });
}


async function deletePurchase(currentElement) {


    await openPopup('/ajax/popup/confirm', { msg: 'Are you sure ?' });
    document.getElementById("confirm-btn").onclick = function () {
        promiseJax("/purchase/delete", { id: currentElement.dataset.id }, "DELETE", false, true).then(response => {
            closePopup('.confirm');
            search();

        }).catch((error) => {

            console.log(error);
        });

    }
}

