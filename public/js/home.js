//Sidebar Dropdown

const allDropdown = document.querySelectorAll("#sidebar .side-dropdown");

allDropdown.forEach(item => {
    const a = item.parentElement.querySelector("a:first-child");
    a.addEventListener("click", function (e) {
        e.preventDefault();
        item.classList.toggle("show");
    });
});


//Profile Dropdown
const profile = document.querySelector("nav .profile");
const imgProfile = profile.querySelector("img");
const dropdownProfile = profile.querySelector(".profile-link");

imgProfile.addEventListener("click", function () {
    dropdownProfile.classList.toggle("show");
});

//Menu
const allMenu = document.querySelectorAll("main .content-data .head .menu");
allMenu.forEach(item => {
    const icon = item.querySelector(".icon");
    const menuLink = item.querySelector(".menu-link");
    icon.addEventListener("click", function () {
        menuLink.classList.toggle("show");
    });
});

window.addEventListener("click", function (e) {
    if (e.target !== imgProfile) {
        if (e.target !== dropdownProfile) {
            if (dropdownProfile.classList.contains("show")) {
                dropdownProfile.classList.remove("show");
            }
        }
    }

    // Menu
    allMenu.forEach(item => {
        const icon = item.querySelector(".icon");
        const menuLink = item.querySelector(".menu-link");
        if (e.target !== icon) {
            if (e.target !== menuLink) {
                if (menuLink.classList.contains("show")) {
                    menuLink.classList.remove("show");
                }
            }
        }
    });
});

//SideBar Collapse
const toggleSidebar = document.querySelector("nav .toggle-sidebar");
const sidebar = document.getElementById("sidebar");
const iconRight = document.querySelectorAll("#sidebar .side-menu .icon-right");

toggleSidebar.addEventListener("click", function () {
    sidebar.classList.toggle("hide");

    if (sidebar.classList.contains("hide")) {
        iconRight.forEach(item => {
            item.textContent = "";
        })
        allDropdown.forEach(item => {
            item.classList.remove("show");
        })
    } else {
        iconRight.forEach(item => {
            item.textContent = itemContent = "expand_more";
        })

    }
}
);

/**
 *
 * @param  url of the ajax request
 * @returns  response from server
 */
function promiseJax(url, data, method = "GET", async = true, parseJson = true) {
    return new Promise(function (resolve, reject) {
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        data["_token"] = token;
        let xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (parseJson == true) {

                resolve(JSON.parse(xhttp.responseText));
            }
            else {

                resolve(xhttp.responseText);
            }

        };
        xhttp.onerror = function () {

            reject(xhttp.responseText);

        }
        xhttp.open(method, url, async);
        xhttp.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhttp.send(JSON.stringify(data));
    });
}



function closeWindow(...arg) {
    arg.forEach(ele => {
        document.querySelector(ele).classList.remove('active');

    })
}
function openWindow(...arg) {
    arg.forEach(ele => {
        document.querySelector(ele).classList.add('active');

    })

}
