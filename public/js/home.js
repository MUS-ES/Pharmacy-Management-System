//Sidebar Dropdown

const allDropdown = document.querySelectorAll("#sidebar .side-dropdown");

allDropdown.forEach(item => {
    const a = item.parentElement.querySelector("a:first-child");
    a.addEventListener("click", function (e) {
        e.preventDefault();

        // if(!this.classList.contains("active")) {
        //   allDropdown.forEach(i=> {
        //     const aLink = i.parentElement.querySelector("a:first-child");
        //     aLink.classList.remove("active");
        //     i.classList.remove("show");
        //   });
        // }

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

/* Variable Define For Chart */

let sales = [];
let purchases = [];
let dates = [];

let offest = 30;
let data = ajax("chart/", { "offest": offest });

//ApexChart
var options = {
    series: [{
        name: 'Sales',
        data: data.invoices
    }, {
        name: 'Purchases',
        data: data.purchases
    }],
    chart: {
        height: 350,
        type: 'area'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {

        type: 'datetime',

    },
    tooltip: {
        x: {
            format: 'yyyy/MM/d H:m:s',

        },
    },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

