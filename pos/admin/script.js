function addProduct() {
    var prod_name = document.getElementById("prod_name").value;
    var prod_code = document.getElementById("prod_code").value;
    var prod_price = document.getElementById("prod_price").value;
    var s_category = document.getElementById("s_category").value;
    var prod_desc = document.getElementById("prod_desc").value;
    var prod_img = document.getElementById("prod_img");

    var f = new FormData();
    if (prod_name == "") {
        alert("Please enter the product name!!");
    } else if (prod_price == "") {
        alert("Please enter the product price!!");
    } else if (isNaN(prod_price)) {
        alert("Thats not price");
    } else if (s_category == "0") {
        alert("Please select a category");
    } else if (prod_img.files.length == 0) {

        alert("you have not selected any image.");
        f.append("prod_name", prod_name);
        f.append("prod_code", prod_code);
        f.append("prod_price", prod_price);
        f.append("s_category", s_category);
        f.append("prod_desc", prod_desc);
        f.append("image", prod_img.files[0]);
        var r = new XMLHttpRequest();

    } else {
        f.append("prod_name", prod_name);
        f.append("prod_code", prod_code);
        f.append("prod_price", prod_price);
        f.append("s_category", s_category);
        f.append("prod_desc", prod_desc);
        f.append("image", prod_img.files[0]);

        var r = new XMLHttpRequest();
    }


    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                alert("Add Product successfully");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "addProduct.php", true);
    r.send(f);
}
function updateProduct() {

    var prod_name = document.getElementById("prod_name");
    var prod_code = document.getElementById("prod_code");
    var prod_price = document.getElementById("prod_price");
    var prod_desc = document.getElementById("prod_desc");
    var prod_img = document.getElementById("prod_img");

    var f = new FormData();
    f.append("prod_name", prod_name.value);

    f.append("prod_code", prod_code.value);
    f.append("prod_price", prod_price.value);
    f.append("prod_desc", prod_desc.value);

    if (prod_img.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", prod_img.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                window.location = "products.php";
            }
        }
    };

    r.open("POST", "updateProduct.php", true);
    r.send(f);
}
function addcategory() {
    var cat = document.getElementById("cat").value;

    var form = new FormData();
    form.append("cat", cat);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "ok") {
                window.location = "products.php";
            }

        }
    };

    r.open("POST", "addcatProcess.php", true);
    r.send(form);
}

function searchOrder() {
    var date = document.getElementById("date").value;

    var form = new FormData();
    form.append("date", date);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById('search').innerHTML = t;

        }
    };

    r.open("POST", "orderserch.php", true);
    r.send(form);


}
function searchproduct() {

    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;

    var form = new FormData();
    form.append("from", from);
    form.append("to", to);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 'ok') {
                alert('please select date');

            } else {
                document.getElementById('search').innerHTML = t;
            }


        }
    };
    r.open("POST", "productsearch.php", true);
    r.send(form);

}

function findcode() {
    var code = document.getElementById("ordercode").value;

    var form = new FormData();
    form.append("code", code);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById('paymentview').innerHTML = t;

        }
    };

    r.open("POST", "findordercode.php", true);
    r.send(form);
}
function monthSales() {
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;

    var form = new FormData();

    form.append("from", from);
    form.append("to", to);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById('monthsale').innerHTML = t;

        }
    };

    r.open("POST", "monthprocess.php", true);
    r.send(form);

}
function returnpay(x) {

    var form = new FormData();

    form.append("order", x);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "ok") {
                if (confirm('Are your sure?')) {
                    window.location.reload();

                }

            }



        }
    };

    r.open("POST", "returnprocess.php", true);
    r.send(form);

}
function paymentsearch() {
    if (confirm('Are your sure?')) {



        var form = new FormData();

        form.append("order", x);


        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {

            if (r.readyState == 4) {
                var t = r.responseText;

                if (t == "ok") {

                    window.location.reload();

                }
            }
        };

        r.open("POST", "returnprocess.php", true);
        r.send(form);
    }
}
function paymentdatefilter() {
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;



    var form = new FormData();
    form.append("from", from);
    form.append("to", to);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById('paymentview').innerHTML = t;

        }
    };

    r.open("POST", "paymentdatefilter.php", true);
    r.send(form);

    setInterval(function paymentdatefilter() {
        var from = document.getElementById("from").value;
        var to = document.getElementById("to").value;



        var form = new FormData();
        form.append("from", from);
        form.append("to", to);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {

            if (r.readyState == 4) {
                var t = r.responseText;

                document.getElementById('total').innerHTML = t;

            }
        };

        r.open("POST", "recipttoatalsale.php", true);
        r.send(form);
    },
        100);

}
function addtable() {
    var id = document.getElementById("tab_id").value;
    var name = document.getElementById("tab_name").value;

    var form = new FormData();

    form.append("id", id);
    form.append("name", name);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "setting.php";
            }
        }
    };

    r.open("POST", "add_tableprocess.php", true);
    r.send(form);

}

function billinfo() {
    var bill_title = document.getElementById("bill_title").value;
    var bill_address = document.getElementById("bill_address").value;
    var bill_mobile = document.getElementById("bill_mobile").value;
    var discount = document.getElementById("discount").value;
    var service_charge = document.getElementById("service_charge").value;
    var bill_footer_text = document.getElementById("bill_footer_text").value;
    var bill_logo_display = document.getElementById("bill_logo_display");

    if (bill_logo_display.checked) {
        var cheacked = "1";
    } else {
        var cheacked = "2";
    }

    var form = new FormData();

    form.append("bill_title", bill_title);
    form.append("bill_address", bill_address);
    form.append("bill_mobile", bill_mobile);
    form.append("discount", discount);
    form.append("service_charge", service_charge);
    form.append("bill_footer_text", bill_footer_text);
    form.append("cheacked", cheacked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location.reload();
            }
        }
    };

    r.open("POST", "billprocess.php", true);
    r.send(form);

}