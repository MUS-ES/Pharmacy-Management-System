

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

    let response = ajaxJson("getavqty/", { "medicine": ele.value });

    let avQtyElement = ele.parentElement.parentElement.querySelector("#avQty");

    if (response.success == 1) {

        avQtyElement.value = response.qty;
    }
    else {

        avQtyElement.value = 0;
    }
}

function autoCompleteMed(ele) {
    removeElements();
    if (ele.value == "") {
        return;
    }
    let medicines = ajaxJson("autocompletemed/", { "term": ele.value.toLowerCase() });
    if (medicines.success == 1) {
        for (let i of medicines.list) {
            //convert ele to lowercase and compare with each string


            //create li element
            let listItem = document.createElement("li");
            //One common class name
            listItem.classList.add("list-items");
            listItem.style.cursor = "pointer";
            listItem.setAttribute("onclick", "displayNames('medicine-name','" + i.name + "')");
            //Display matched part in bold
            let word = "<b>" + i.name.substr(0, ele.value.length) + "</b>";
            word += i.name.substr(ele.value.length);
            //display the value in array
            listItem.innerHTML = word;
            let y = ele.parentElement.querySelector(".list-med").appendChild(listItem);


        }
    }

}

function displayNames(ele, value) {
    let input = document.getElementById(ele);
    input.value = value;
    removeElements();
}

function removeElements() {
    //clear all the item
    let items = document.querySelectorAll(".list-items");
    items.forEach((item) => {
        item.remove();
    });
}


function checkMedAndFillData(medicineElement, exist) {
    if (exist != 1)
        exist = isMedicineExist(medicineElement.value);

    if (!exist) {
        return;
    }
    let expElement = medicineElement.parentElement.parentElement.querySelector("#exp_date");
    let avQtyElement = medicineElement.parentElement.parentElement.querySelector("#avQty");
    fillExpDates(expElement, medicineElement.value);
    fillAvQty(avQtyElement, exp);




}

function isMedicineExist(name) {

    return exist = ajaxJson("ismedexist/", { medicine: name }).exist;
}

function fillExpDates(expElement, medicine) {

    expdates = ajaxJson("getmedexpdates/", { medicine: medicine });
    if (expdates.success != 1) {
        return;
    }
    removeExpDates()
    expdates.expDates.forEach(date => {
        let option = document.createElement("option");
        option.setAttribute("value", date.exp);
        option.innerText = date.exp;
        expElement.appendChild(option);
    })
}
