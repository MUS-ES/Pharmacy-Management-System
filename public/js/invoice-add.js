
function ajax(url, data) {
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    data["_token"] = token;
    let xhttp = new XMLHttpRequest();
    let response;
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState = 4 && xhttp.status == 200) {

            response = JSON.parse(xhttp.responseText);
        }

    };
    xhttp.open("POST", url, false);
    xhttp.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhttp.send(JSON.stringify(data));
    return response;
}


function addInvoice() {
    let container = document.getElementById("bill-rows");
    let bill = container.firstElementChild;
    let newbill = bill.cloneNode(1);
    let hr = document.createElement("hr");
    hr.classList.add("horizontal-rule");
    newbill.classList.add("canremove");
    inputs = newbill.querySelectorAll("input");
    inputs.forEach(e => {
        e.value = "";
    });
    container.appendChild(newbill);
    container.appendChild(hr);
}
function removeInvoice(element) {

    let invoice = element.parentElement.parentElement;
    let hr = invoice.nextSibling;
    if (invoice.classList.contains("canremove")) {

        invoice.remove();
        hr.remove();
    }

}
function getAvQty(ele) {

    let response = ajax("getavqty/", { "medicine": ele.value });
    console.log(response);

    if (response.success == 1) {

        avQtyElement.value = response.qty;
    }
    else {

        avQtyElement.value = 0;
    }
}
