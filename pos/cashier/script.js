function filte_cat(product_category) {
    document.getElementById('product_display_div').innerHTML = "<div class='text-center mt-4 w-100'><img src='image/loading_sm.gif'> Searching product</div>";
    var form = new FormData();
    form.append('product_category', product_category);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById('product_display_div').innerHTML = t;
        }
    }

    r.open("POST", "product_cat_filter.php", true);
    r.send(form);
}
function save_list(event, sale_qty) {
    if (event.keyCode == 13) {

        var update = document.getElementById('update').value;//productid
        var product_barcode = document.getElementById('product_barcode').value;//productid
        var sale_qty = document.getElementById('sale_qty').value;
        var bill_id = document.getElementById('bill_id').value;
        var menu_type = document.getElementsByName('menu_type');//brack,lunch

        var form = new FormData();

        form.append('product_barcode', product_barcode);
        form.append('sale_qty', sale_qty);
        form.append('bill_id', bill_id);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                document.getElementById('table_view').innerHTML = t;
            } else {


            }
            document.getElementById('sale_qty').value = "";
            document.getElementById('product_barcode').value = "";
            document.getElementById('product_barcode').select();
        }



        r.open("POST", "save_list.php", true);
        r.send(form);

        document.getElementById('product_barcode').focus();
    }
    setInterval(function save_list() {

        let bill_id = document.getElementById('bill_id').value;

        var f = new FormData();
        f.append('bill_id', bill_id);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;


                document.getElementById('total_amount').innerHTML = t;

            } else {
                document.getElementById("msg2").innerHTML = t;

            }

        }
        r.open("POST", "total_cal_pos.php", true);
        r.send(f);
    },
        100);
}
function bill_claer() {
    window.location = "dashboard.php";
}
function cal_amount(x) {
    const saleDetailsDiscount = document.getElementById('sale_details_discount').value;
    const saleDetailsCashPayment = document.getElementById('sale_details_cash_payment').value;
    const saleDetailsCardPayment = document.getElementById('sale_details_card_payment').value;
    const servicecharge = document.getElementById('sale_details_service_charge').value;
    const discount = x - (x / 100 * saleDetailsDiscount);
    const serve = x / 100 * servicecharge;
    const net_amount = discount + +serve;
    const payment = +saleDetailsCashPayment + +saleDetailsCardPayment;
    document.getElementById('net_amount').value = net_amount;
    document.getElementById('balance').value = payment - net_amount;

}
function save_list1(event, sale_qty) {
    if (event.keyCode == 13) {

        //var update = document.getElementById('update').value;//productid
        var product_barcode = document.getElementById('product_barcode').value;//productid
        var sale_qty = document.getElementById('sale_qty').value;
        var bill_id = document.getElementById('bill_id').value;
        //var menu_type = document.getElementsByName('menu_type');//brack,lunch
        var table = document.getElementById('table').value;

        var form = new FormData();

        form.append('product_barcode', product_barcode);
        form.append('sale_qty', sale_qty);
        form.append('bill_id', bill_id);
        form.append('table', table);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "ok") {
                    alert("please Insert Table");


                } else if (t == "ck") {
                    alert("please Insert Product Code");

                }
                else {
                    document.getElementById('table_view').innerHTML = t;
                }

            }
            document.getElementById('sale_qty').value = "";
            document.getElementById('product_barcode').select();
            document.getElementById('product_barcode').value = "";
        }

        r.open("POST", "save_list1.php", true);
        r.send(form);

        document.getElementById('product_barcode').focus();
    }

    setInterval(function save_list1() {

        let bill_id = document.getElementById('bill_id').value;





        var f = new FormData();
        f.append('bill_id', bill_id);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                document.getElementById('total_amount').innerHTML = t;

            }
        }
        r.open("POST", "total_cal_pos.php", true);
        r.send(f);

    },
        1000 / 2);


}

function b() {
    window.location = 'dayEntry.php';
}
function filter() {
    var from = document.getElementById('from_date').value;
    var to = document.getElementById('to_date').value;
    var select = document.getElementById('select').value;

    var form = new FormData();

    form.append('from_date', from);
    form.append('to_date', to);
    from = form.append('select', select);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById('filter_table').innerHTML = t;
            // alert(t);

        }
    }

    r.open("POST", "filter_date.php", true);
    r.send(form);
}

