$(document).ready(function () {
    if (document.getElementById("year"))
        loadGraph()
    $('#year').on('change', function () {
        loadGraph();
    });


    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('.addStock').click(function () {
        var id = $(this).attr("data-id");
        var amount = document.getElementById("quantity").value;
        var element = document.getElementById("sizes");
        var size = element.options[element.selectedIndex].value
        element = document.getElementById("colors");
        var color = element.options[element.selectedIndex].value
        $.post("/SafeRideStore/admin/products/addStock/" + color + "/" + size + "/" + amount + "/" + id, {}, function (data) {
            var obj = JSON.parse(data);
            if (!obj.hasOwnProperty('amount')) {
                var html = '<tr>';
                html += '<td>' + size + '</td>';
                html += '<td>' + color + '</td>';
                html += '<td><input type="text" size="3" id="' + obj.inStockId + '" value="' + amount + '"' + " oninput='this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');'" + '"onkeyup="quantityChange()"></td></tr>';
                $('#tableData').prepend(html);
            } else {
                $("#" + obj.inStockId).val(obj.amount);
            }
        });
        return false;
    });


    $('#filterProducts').keyup(function () {
        var filter = $('#filterProducts').val()

        $.post('products/filter ', {
            'filter': filter
        }, function (data) {
            $(".productsBody").html(data);
        });
        return false;

    });
    //search by user name
    $('#searchByUserName').click(function () {
        var userName = $('#userName').val();
        if (userName.length > 0) {
            $.post('orders/user ', {
                'userName': userName,
            }, function (data) {
                $(".orderBody").html(data);
            });

            return false;
        }
    });
    //date range search
    $('#searchByDate').click(function () {
        var sDate = $('#startDate').val();
        var eDate = $('#endDate').val();
        if (eDate.length > 0 && sDate.length > 0) {
            $.post('orders/dates/ ', {
                'startDate': sDate,
                'endDate': eDate
            }, function (data) {
                $(".orderBody").html(data);
            });

            return false;
        }
    });

    $('#filterProducts').keyup(function () {
        var filter = $('#filterProducts').val()

        $.post('products/filter ', {
            'filter': filter
        }, function (data) {
            $(".productsBody").html(data);
        });

        return false;

    });

    $('.deleteProduct').click(function () {
        var delUrl = $(this).attr("url");
        if (confirm("Are you sure you want to delete this product")) {
            window.location.replace(delUrl);
        }

        return false;
    });
    $('input:radio[name="choose"]').change(function () {
        if ($(this).val() == "byProduct")
            $('.productsList').css('display', 'inline');
        else
            $('.productsList').css('display', 'none');
        return false;
    });
    $('input:radio[name="type"]').change(function () {
        if ($(this).val() == "amount")
            $('.input-group-text').text('$');
        else
            $('.input-group-text').text('%');
        return false;
    });

});


function quantityChange() {
    var id = event.target.attributes.id.value;
    var quantity = $("#" + id).val();
    if (quantity !== "")
        $.post("/SafeRideStore/admin/products/updateStock/" + quantity + "/" + id, {}, {});
}

function buildGraph(obj, chart, yAxesLabel, stepSize = '') {
    var ctx = document.getElementById(chart).getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart 
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Product Sales',
                backgroundColor: '#00AAA9',
                borderColor: '#00AAA9',
                data: [obj.month1, obj.month2, obj.month3, obj.month4, obj.month5, obj.month6, obj.month7, obj.month8, obj.month9, obj.month10, obj.month11, obj.month12]
            }]
        },
        // Configuration options 
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: yAxesLabel
                    },
                    ticks: {
                        stepSize: stepSize
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Mounths'
                    }
                }]
            }
        }
    });
}

function loadGraph() {
    var element = document.getElementById("year");
    var year = element.options[element.selectedIndex].value
    if (document.getElementById("salesChart")) {

        $.post("/SafeRideStore/admin/loadSales/" + year, {}, function (data) {
            var obj = JSON.parse(data);
            buildGraph(obj, 'salesChart', 'amount earned in month ($)')

        });

    } else if (document.getElementById("customerChart")) {
        $.post("/SafeRideStore/admin/loadCustomers/" + year, {}, function (data) {
            var obj = JSON.parse(data);
            buildGraph(obj, 'customerChart', 'Customers joined', 100)
        });

    }
}