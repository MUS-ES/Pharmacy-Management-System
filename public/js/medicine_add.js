let medicineName = document.getElementById("medicine-name");
let genericName = document.getElementById("gereric-name");
let unit = document.getElementById("unit");
let price = document.getElementById("price");
let description = document.getElementById("description");
let feedbacksElements = document.getElementsByClassName("invalid-feedback");
function validate(errors) {

    Array.from(feedbacksElements).forEach(element => {
        element.innerText = "";
    });


    if (errors.hasOwnProperty('name')) {
        medicineName.focus();
        let error = medicineName.nextElementSibling;
        error.innerText = errors.name;

    }
    if (errors.hasOwnProperty('generic')) {
        genericName.focus();
        let error = genericName.nextElementSibling;
        error.innerText = errors.generic;

    }
    if (errors.hasOwnProperty('unit')) {
        unit.focus();
        let error = unit.nextElementSibling;
        error.innerText = errors.unit;

    }
    if (errors.hasOwnProperty('price')) {
        price.focus();
        let error = price.nextElementSibling;
        error.innerText = errors.price;

    }
}

function save() {
    let data = { name: medicineName.value, generic: genericName.value, unit: unit.value, price: price.value, description: description.value }
    promiseJax("/medicine/add", data, "POST", 1, 1).then(response => {

        openPopup('/ajax/popup/feedback', {
            msg: "New medicine " + medicineName.value + " has been added"
        });
    }).catch((response) => {
        console.log(response);
        validate(response.errors);
    });
}

