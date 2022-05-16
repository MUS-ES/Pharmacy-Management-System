let medicineName = document.getElementById("medicine-name");
let genericName = document.getElementById("gereric-name");
let strip = document.getElementById("strip");
let price = document.getElementById("price");
let valid = true;
function validate() {

    if (medicineName.value.trim() == "") {
        medicineName.focus();
        let error = medicineName.nextElementSibling;
        error.innerText = "Please enter medicine name";
        valid = false;
    }
    if (genericName.value.trim() == "") {
        genericName.focus();
        let error = genericName.nextElementSibling;
        error.innerText = "Please enter generic name";
        valid = false;
    }
    if (strip.value.trim() == "") {
        strip.focus();
        let error = strip.nextElementSibling;
        error.innerText = "Please enter strip number";
        valid = false;
    }
    if (price.value.trim() == "") {
        price.focus();
        let error = price.nextElementSibling;
        error.innerText = "Please enter price ";
        valid = false;
    }
    return valid;
}

function save() {
    if (validate()) {
        promiseJax("/addmedicine", { medicine: medicineName.value, generic: genericName.value, strip: strip.value, price: price.value }, "POST", 1, 0).then(response => {
            console.log(response);
            if (response.success) {
                let feedbackEle = document.querySelector("#popup .feedback");
                feedbackEle.classList.add("active");

            }
        }).catch(response => {
            console.log(response);
        })
    }
}
