

function save() {
    let name = document.getElementById("customer-name").value;
    let contact = document.getElementById("customer-contact").value;
    let address = document.getElementById("customer-address").value;
    let data = {
        name: name,
        contact: contact,
        address: address
    };
    promiseJax("/customer/add", data, "POST", 1, 1).then(response => {

        openPopup('/ajax/popup/feedback', {
            msg: "Customer " + name + " has been added"
        });

    }).catch((response) => {
        validate(response.errors);
    });
}

function validate(errors) {
    let nameElement = document.getElementById("customer-name");
    let contactElement = document.getElementById("customer-contact");
    let addressElement = document.getElementById("customer-contact");
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
