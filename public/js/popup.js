
function closePopup(element) {

    document.querySelector(element).remove();




}
function openPopup(url, data = {}) {

    let popupSection = document.getElementById("popup");
    promiseJax(url, data, "POST", 1, 0).then((response) => {
        popupSection.insertAdjacentHTML("beforeend", response);
    });

}

function autoCompleteMed(currentElement) {

    let list = document.getElementById("list-medicine");
    promiseJax("/ajax/medicineautocomplete/", { term: currentElement.value.toLowerCase() }, "POST", true).then(medicines => {
        removeChilderns(list);
        if (medicines.success == 1) {
            for (let i of medicines.list) {
                let listItem = document.createElement("li");
                listItem.classList.add("list-items");
                listItem.style.cursor = "pointer";
                listItem.addEventListener("click", e => { displayNames(currentElement, list, i.name); });
                let word = "<b>" + i.name.substr(0, currentElement.value.length) + "</b>";
                word += i.name.substr(currentElement.value.length);
                listItem.innerHTML = word;
                currentElement.parentElement.querySelector("#list-medicine").appendChild(listItem);
            }
            list.classList.add("active");
        }
        else {
            list.classList.remove("active");

        }
    });
}
function removeChilderns(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.lastChild);
    }
}

function displayNames(medicineELement, list, value) {
    medicineELement.value = value;
    removeChilderns(list);
    list.classList.remove("active");
}



function saveCustomer() {
    let name = document.getElementById("popup-new-customer-name").value;
    let contact = document.getElementById("popup-new-customer-contact").value;
    let address = document.getElementById("popup-new-customer-contact").value;
    let data = {
        name: name,
        contact: contact,
        address: address
    };
    promiseJax("/customer/add", data, "POST", 1, 1).then(response => {
        if (response.status == 422) {
            validateCustomer(response.errors);
        } else if (response.success == 1) {

            closePopup('.new-customer');
            openPopup('/ajax/popup/feedback', {
                msg: "Customer " + name + " has been added"
            });
            document.querySelector("#customer-name").value = name;
        };

    });
}

function validateCustomer(errors) {
    let nameElement = document.getElementById("popup-new-customer-name");
    let contactElement = document.getElementById("popup-new-customer-contact");
    let addressElement = document.getElementById("popup-new-customer-contact");
    let feedbacksElements = document.getElementsByClassName("invalid-feedback");
    Array.from(feedbacksElements).forEach(element => {
        element.innerText = "";
    });


    if (errors.hasOwnProperty('name')) {
        nameElement.focus();
        let error = nameElement.nextElementSibling;
        error.innerText = errors.name;

    }
    if (errors.hasOwnProperty('contact')) {
        contactElement.focus();
        let error = contactElement.nextElementSibling;
        error.innerText = errors.contact;

    }
    if (errors.hasOwnProperty('address')) {
        addressElement.focus();
        let error = addressElement.nextElementSibling;
        error.innerText = errors.address;

    }
}

function saveStock() {
    let medicine = document.getElementById("popup-stock-medicine-name").value;
    let mfd = document.getElementById("popup-stock-mfd").value;
    let exp = document.getElementById("popup-stock-exp").value;
    let qty = document.getElementById("popup-stock-qty").value;
    let supplier = document.getElementById("popup-stock-supplier").value;
    let data = {
        medicine: medicine,
        mfd: mfd,
        exp: exp,
        qty: qty,
        supplier: supplier,
    };
    promiseJax("/stock/add", data, "POST", 1, 1).then((response) => {
        if (response.status == 422) {
            validateStock(response.errors);
        } else if (response.success == 1) {

            closePopup('.stock-new-entry');
            openPopup('/ajax/popup/feedback', {
                msg: "New entry  has been added"
            });
        };
    });
}


function validateStock(errors) {
    let medicineElement = document.getElementById("popup-stock-medicine-name");
    let mfdElement = document.getElementById("popup-stock-mfd");
    let expElement = document.getElementById("popup-stock-exp");
    let qtyElement = document.getElementById("popup-stock-qty");
    let supplierElement = document.getElementById("popup-stock-supplier");

    let feedbacksElements = document.getElementsByClassName("invalid-feedback");
    Array.from(feedbacksElements).forEach(element => {
        element.innerText = "";
    });


    if (errors.hasOwnProperty('medicine')) {
        medicineElement.focus();
        let error = medicineElement.nextElementSibling;
        error.innerText = errors.medicine;

    }
    if (errors.hasOwnProperty('mfd')) {
        mfdElement.focus();
        let error = mfdElement.nextElementSibling;
        error.innerText = errors.mfd;

    }
    if (errors.hasOwnProperty('exp')) {
        expElement.focus();
        let error = expElement.nextElementSibling;
        error.innerText = errors.exp;

    }
    if (errors.hasOwnProperty('qty')) {
        qtyElement.focus();
        let error = qtyElement.nextElementSibling;
        error.innerText = errors.qty;

    }
    if (errors.hasOwnProperty('supplier')) {
        supplierElement.focus();
        let error = supplierElement.nextElementSibling;
        error.innerText = errors.supplier;

    }
}


function saveMedicine() {
    let name = document.getElementById("popup-new-medicine-name").value;
    let generic = document.getElementById("popup-new-medicine-generic").value;
    let strip = document.getElementById("popup-new-medicine-strip").value;
    let price = document.getElementById("popup-new-medicine-price").value;
    let description = document.getElementById("popup-new-medicine-description").value;
    let data = {
        name: name,
        generic: generic,
        strip: strip,
        price: price,
        description: description,
    };
    promiseJax("/medicine/add", data, "POST", 1, 1).then((response) => {
        if (response.status == 422) {
            validateMedicine(response.errors);
        } else if (response.success == 1) {

            closePopup('.new-medicine');
            openPopup('/ajax/popup/feedback', {
                msg: "New medicine " + name + " has been added"
            });
        };
    });
}


function validateMedicine(errors) {
    let nameElement = document.getElementById("popup-new-medicine-name");
    let genericElement = document.getElementById("popup-new-medicine-generic");
    let stripElement = document.getElementById("popup-new-medicine-strip");
    let priceElement = document.getElementById("popup-new-medicine-price");
    let descriptionElement = document.getElementById("popup-new-medicine-description");

    let feedbacksElements = document.getElementsByClassName("invalid-feedback");
    Array.from(feedbacksElements).forEach(element => {
        element.innerText = "";
    });


    if (errors.hasOwnProperty('name')) {
        nameElement.focus();
        let error = nameElement.nextElementSibling;
        error.innerText = errors.name;

    }
    if (errors.hasOwnProperty('generic')) {
        genericElement.focus();
        let error = genericElement.nextElementSibling;
        error.innerText = errors.generic;

    }
    if (errors.hasOwnProperty('strip')) {
        stripElement.focus();
        let error = stripElement.nextElementSibling;
        error.innerText = errors.strip;

    }
    if (errors.hasOwnProperty('price')) {
        priceElement.focus();
        let error = priceElement.nextElementSibling;
        error.innerText = errors.price;

    }
    if (errors.hasOwnProperty('description')) {
        descriptionElement.focus();
        let error = descriptionElement.nextElementSibling;
        error.innerText = errors.description;

    }
}



function saveSupplier() {
    let name = document.getElementById("popup-new-supplier-name").value;
    let email = document.getElementById("popup-new-supplier-email").value;
    let contact = document.getElementById("popup-new-supplier-contact").value;
    let address = document.getElementById("popup-new-supplier-address").value;
    let data = {
        name: name,
        email: email,
        contact: contact,
        address: address,
    };
    promiseJax("/supplier/add", data, "POST", 1, 1).then((response) => {
        console.log(response);
        if (response.status == 422) {
            validateSupplier(response.errors);
        } else if (response.success == 1) {

            closePopup('.new-supplier');
            openPopup('/ajax/popup/feedback', {
                msg: "New supplier " + name + " has been added"
            });
        };
    });
}


function validateSupplier(errors) {
    let nameElement = document.getElementById("popup-new-supplier-name");
    let emailElement = document.getElementById("popup-new-supplier-email");
    let contactElement = document.getElementById("popup-new-supplier-contact");
    let addressElement = document.getElementById("popup-new-supplier-address");

    let feedbacksElements = document.getElementsByClassName("invalid-feedback");
    Array.from(feedbacksElements).forEach(element => {
        element.innerText = "";
    });


    if (errors.hasOwnProperty('name')) {
        nameElement.focus();
        let error = nameElement.nextElementSibling;
        error.innerText = errors.name;

    }
    if (errors.hasOwnProperty('email')) {
        emailElement.focus();
        let error = emailElement.nextElementSibling;
        error.innerText = errors.email;

    }
    if (errors.hasOwnProperty('contact')) {
        contactElement.focus();
        let error = contactElement.nextElementSibling;
        error.innerText = errors.contact;

    }
    if (errors.hasOwnProperty('address')) {
        addressElement.focus();
        let error = addressElement.nextElementSibling;
        error.innerText = errors.address;

    }
}
