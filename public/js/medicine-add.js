let medicineName = document.getElementById("medicine-name");
let genericName = document.getElementById("gereric-name");
let strip = document.getElementById("strip");
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
    if (errors.hasOwnProperty('strip')) {
        strip.focus();
        let error = strip.nextElementSibling;
        error.innerText = errors.strip;

    }
    if (errors.hasOwnProperty('price')) {
        price.focus();
        let error = price.nextElementSibling;
        error.innerText = errors.price;

    }
}

function save() {
    promiseJax("/medicine/add", { name: medicineName.value, generic: genericName.value, strip: strip.value, price: price.value, description: description.value }, "POST", 1, 1).then(response => {
        if (response.status == 422) {
            validate(response.errors);
        }
    });
}

