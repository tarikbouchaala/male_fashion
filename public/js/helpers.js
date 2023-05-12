// Change category image placeholder when uploading image
$(function () {
    $("#categoryImageUploadCreate").change(function () {
        var file = this.files[0];
        var fileExtension = file.name.split(".").pop().toLowerCase();
        if ($.inArray(fileExtension, ["png", "jpeg", "jpg"]) == -1) {
            Toastify({
                text: "Invalid file type. Please select a PNG, JPEG, or JPG image",
                duration: 3000,
                close: true,
                gravity: "top",
                style: {
                    background: "#198754",
                },
                position: "right",
                stopOnFocus: true,
            }).showToast();
            $(this).val("");
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#categoryUploadedImageCreate").attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
    });
});
$(function () {
    $("#categoryImageUploadUpdate").change(function () {
        console.log("test");
        var file = this.files[0];
        var fileExtension = file.name.split(".").pop().toLowerCase();
        if ($.inArray(fileExtension, ["png", "jpeg", "jpg"]) == -1) {
            Toastify({
                text: "Invalid file type. Please select a PNG, JPEG, or JPG image",
                duration: 3000,
                close: true,
                gravity: "top",
                style: {
                    background: "#198754",
                },
                position: "right",
                stopOnFocus: true,
            }).showToast();
            $(this).val("");
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#categoryUploadedImageUpdate").attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
    });
});
// Change product image placeholder when uploading image
$(function () {
    $("#productImageUploadCreate").change(function () {
        var file = this.files[0];
        var fileExtension = file.name.split(".").pop().toLowerCase();
        if ($.inArray(fileExtension, ["png", "jpeg", "jpg"]) == -1) {
            Toastify({
                text: "Invalid file type. Please select a PNG, JPEG, or JPG image",
                duration: 3000,
                close: true,
                gravity: "top",
                style: {
                    background: "#198754",
                },
                position: "right",
                stopOnFocus: true,
            }).showToast();
            $(this).val("");
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#productUploadedImageCreate").attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
    });
});
$(function () {
    $("#productImageUploadUpdate").change(function () {
        console.log("test");
        var file = this.files[0];
        var fileExtension = file.name.split(".").pop().toLowerCase();
        if ($.inArray(fileExtension, ["png", "jpeg", "jpg"]) == -1) {
            Toastify({
                text: "Invalid file type. Please select a PNG, JPEG, or JPG image",
                duration: 3000,
                close: true,
                gravity: "top",
                style: {
                    background: "#198754",
                },
                position: "right",
                stopOnFocus: true,
            }).showToast();
            $(this).val("");
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#productUploadedImageUpdate").attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
    });
});
