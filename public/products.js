/**
 * store product through ajax
 */
function storeProduct() {
    $.ajax({
        type: "POST",
        url: _BASE_URL + "/products",
        data: {
            name: $("#name").val(),
            price: $("#price").val(),
        },
        success: function (result) {
            if (result?.success) {
                $("#modal-product").modal("hide");

                console.log('JSON.stringify(result.data)');
                console.log(JSON.stringify(result.data).replace(/},{/g,'}, {'));

                var html = $("#template-row tbody").html()
                    .replaceAll("#ID", result?.data?.id)
                    .replaceAll("#NAME", result?.data?.name)
                    .replaceAll("#PRICE", result?.data?.price)
                    ;


                $("#product-tbody").append(html);

                $("#product-name-" + result?.data?.id).text(result?.data?.name);
                $("#product-price-" + result?.data?.id).text(
                    result?.data?.price
                );

                console.log(html);

                $.toaster({ message: result?.message, priority: "success" });

                // Add html row
            } else {
                $.toaster({ message: result?.message, priority: "danger" });
            }
        },
        error: function (result) {
            printErrorMsg(result.responseJSON.errors);
        },

    });
}

function printErrorMsg(msg) {

    $(".print-error-msg").find("ul").html("");
    $(".print-error-msg").show();
    $.each(msg, function (key, value) {
        $(".print-error-msg")
            .find("ul")
            .append("<li>" + value + "</li>");
    });

}

/**
 * update product through ajax
 */
function updateProduct() {
    $.ajax({
        type: "POST",
        url: _BASE_URL + "/products/" + $("#product-id").val(),
        data: {
            name: $("#name").val(),
            price: $("#price").val(),
            _method: "PATCH",
        },
        success: function (result) {
            console.log("result ", result);

            if (result?.success) {
                $("#modal-product").modal("hide");

                $("#product-name-" + $("#product-id").val()).text(
                    result?.data?.name
                );
                $("#product-price-" + $("#product-id").val()).text(
                    result?.data?.price
                );
                $.toaster({ message: result?.message, priority: "success" });
            } else {
                $.toaster({ message: result?.message, priority: "danger" });
            }
        },
        error: function (result) {
            printErrorMsg(result.responseJSON.errors);
        },
    });
}

function deleteProduct(id) {
    $.confirm({
        title: "Confirm!",
        content: "Want to delete record",
        buttons: {
            confirm: {
                btnClass: "btn-danger",
                action: function () {
                    $.ajax({
                        type: "POST",
                        url: _BASE_URL + "/products/" + id,
                        data: {
                            _method: "delete",
                        },
                        success: function (result) {
                            result?.success
                                ? $("#product-row-" + id).fadeOut("slow")
                                : $.alert(result?.message);
                        },
                        error: function (result) {
                            printErrorMsg(result.responseJSON.errors);
                        }
                    });
                },
            },
            cancel: function () {
                return;
            },
        },
    });
}

function editProduct(id, name, price) {
    initProductModal(id, name, price);
}

function addProduct() {
    initProductModal();
}

function initProductModal(id, name, price) {

    if (id) {
        // edit

        $("#product-id").val(id);

        console.log("sdfsdf");
        console.log($("#product-price-" + id).text());

        $("#name").val($("#product-name-" + id).text());
        $("#price").val($("#product-price-" + id).text());

        $("#btn-store-product").hide();
        $("#btn-update-product").show();
        $("#modal-title").html("Edit product");
    } else {
        // New

        $("#product-id").val(0);
        $("#name").val("");
        $("#price").val("");

        $("#btn-store-product").show();
        $("#btn-update-product").hide();
        $("#modal-title").html("Create product");
    }

    $(".print-error-msg").hide();
    $("#modal-product").modal("show");
}
