/* Variable Define For Chart */

let sales = [];
let purchases = [];
let dates = [];

let offest = 30;

promiseJax("chart/", { "offest": offest }, "POST").then(response => {
    let data = response;
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

            type: 'date',

        },
        tooltip: {
            x: {
                format: 'yyyy/MM/d',

            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
});

//ApexChart

