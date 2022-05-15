function showInvoiceItems(currentElement) {

    promiseJax("getinvoiceitems/" + currentElement.dataset.id, "", "GET", true, 0).then(response => {
        console.log(response);
        document.getElementById("popup").innerHTML = response;
        document.querySelector(".container1").style.display = "flex";
        document.getElementById("close-btn").addEventListener("click",
            function () {
                document.querySelector(".container1").style.display = "none";
            });
    });

}




document.getElementById("refresh-btn").addEventListener("click", function () {
    let from = document.getElementById("from-date");
    let to = document.getElementById("to-date");
    if (from.value.trim() != "" && to.value.trim() != "") {
        window.location.href = "/manageinvoices/" + to.value + "/" + from.value;
    } else if (to.value.trim() != "") {

        window.location.href = "/manageinvoices/" + to.value;
    }
});
