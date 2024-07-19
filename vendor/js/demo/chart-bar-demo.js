// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var ctx2 = document.getElementById("myBarChart2");
var labels = document.getElementById("dataLabelChart").value
var arrayResult = labels.split(", ");
const lastTwoElements = JSON.parse(document.getElementById("dataBarChart").value).slice(-2);
const fiveElements = JSON.parse(document.getElementById("dataBarChart").value).slice(0, 5);
const fiveLabels = arrayResult.slice(0, 5)
const lastTwoLabels = arrayResult.slice(-2)
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: fiveLabels,
        datasets: [{
            label: "Earnings",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: fiveElements,
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 5,
                right: 5,
                top: 5,
                bottom: 0
            },
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 6
                },
                maxBarThickness: 25,
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 30,
                    maxTicksLimit: 10,
                    padding: 10,
                    callback: function(value, index, values) {
                        return number_format(value) ;
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: false
        },
        tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    return 'Data: ' + number_format(tooltipItem.yLabel);
                }
            }
        },
    }
});

var myBarChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        // labels: arrayResult,
        labels: lastTwoLabels,
        datasets: [{
            label: "Earnings",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: lastTwoElements,
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 5,
                right: 5,
                top: 5,
                bottom: 0
            },
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 6
                },
                maxBarThickness: 25,
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 30,
                    maxTicksLimit: 10,
                    padding: 10,
                    callback: function(value, index, values) {
                        return number_format(value) ;
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: false
        },
        tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    return 'Data: ' + number_format(tooltipItem.yLabel);
                }
            }
        },
    }
});

function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
