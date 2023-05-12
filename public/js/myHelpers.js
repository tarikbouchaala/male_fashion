$(document).ready(function () {
    /* Sending Email Start */
    $("#sendEmailForm").submit(function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Validate email input
        var emailInput = $("#subscription_email");
        var email = emailInput.val();
        var isValidEmail = validateEmail(email);

        if (!isValidEmail) {
            Toastify({
                text: "Please enter a valid email address",
                duration: 3500,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: "#dc3545",
                },
                stopOnFocus: true,
            }).showToast();
            return;
        }

        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $(".loader").fadeIn();
        $("#preloder").fadeIn();
        // Send AJAX request
        $.ajax({
            url: "/sendMail",
            type: "POST",
            data: { email: email, _token: csrfToken },
            success: function (response) {
                Toastify({
                    text: "Check your email",
                    duration: 3500,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "#198754",
                    },
                    stopOnFocus: true,
                }).showToast();
                $("#subscription_email").val("");
                $(".loader").fadeOut();
                $("#preloder").delay(200).fadeOut("slow");
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                Toastify({
                    text: "Something went wrong. Please try again",
                    duration: 3500,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "#dc3545",
                    },
                    stopOnFocus: true,
                }).showToast();
                $("#subscription_email").val("");
                $(".loader").fadeOut();
                $("#preloder").delay(200).fadeOut("slow");
            },
        });
    });

    // Email validation function
    function validateEmail(email) {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    /* Sending Email End */

    /* Category Filter Start */

    $(".category-button").on("click", function () {
        $(".category-button").removeClass("active");

        $(this).addClass("active");

        var selectedCategory = $(this).data("category");

        $(".product-card").each(function () {
            var cardCategory = $(this).data("category");
            if (selectedCategory == "All") {
                $(this).show();
            } else if (cardCategory === selectedCategory) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    var productContainer = $(".product-container");

    if (productContainer.children(".product-card").length === 0) {
        productContainer.append(
            '<h2 class="no-products">No products for now</h2>'
        );
    } else {
        productContainer.children(".no-products").remove();
    }

    $('.category-button[data-category="All"]').addClass("active");
    productContainer.children(".product-card").show();

    /* Category Filter End */

    /* Sorting Products Start */

    var productContainer = $(".product-container");
    var productCards = productContainer.children(".product-card");

    var sortProducts = function (sortOption) {
        var productArray = productCards.toArray();

        productArray.sort(function (a, b) {
            var priceA = parseInt($(a).data("price"));
            var priceB = parseInt($(b).data("price"));

            if (sortOption === "low-to-high") {
                return priceA - priceB;
            } else {
                return priceB - priceA;
            }
        });

        productContainer.empty();
        productArray.forEach(function (product) {
            productContainer.append(product);
        });
    };

    sortProducts("low-to-high");

    $("#sort-select").on("change", function () {
        var sortOption = $(this).val();
        sortProducts(sortOption);
    });

    /* Sorting Products End */

    /* Search Product Start */

    var searchForm = $("#search-form");
    var searchInput = $("#search-input");
    var suggestionsContainer = $("#suggestions-container");

    // Handle search input change
    searchInput.on("input", function () {
        var searchQuery = $(this).val().trim();

        if (searchQuery === "") {
            suggestionsContainer.empty();
            return; // Do nothing if the search query is empty
        }

        sendSearchRequest(searchQuery);
    });

    // Send search request and handle response
    function sendSearchRequest(query) {
        $.ajax({
            url: "/searchProduct",
            method: "GET",
            data: { query: query },
            success: function (response) {
                suggestionsContainer.empty();

                if (response.length > 0) {
                    response.forEach(function (product) {
                        var productLink = "/product/" + product.id; // Updated URL pattern for product detail

                        var imageUrl = "/storage/images/" + product.image; // Constructing the image URL
                        var suggestionItem = $("<a>")
                            .addClass("suggestion-item")
                            .attr("href", productLink);
                        suggestionItem.append(
                            $("<img>")
                                .attr("src", imageUrl)
                                .attr("alt", product.name)
                        );
                        suggestionItem.append($("<span>").text(product.name));

                        suggestionsContainer.append(suggestionItem);
                    });
                } else {
                    suggestionsContainer.append(
                        $("<div>")
                            .addClass("no-suggestions")
                            .text("No products found with the name: " + query)
                    );
                }
            },
        });
    }

    // Clear suggestions when clicking outside the search input
    $(document).on("click", function (e) {
        if (!searchForm.is(e.target) && searchForm.has(e.target).length === 0) {
            suggestionsContainer.empty();
        }
    });

    /* Search Product End */

    /* Add Product To Cart Start */
    $(".add-cart").click(function (e) {
        e.preventDefault();

        // Retrieve the product ID and quantity from the button's data attributes
        var productId = $(this).data("productid");
        var quantity = $(this).data("quantity");

        // Retrieve the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        // Send an AJAX request to the addProductToCart function
        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                product_id: productId,
                quantity: quantity,
            },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                Toastify({
                    text: response,
                    duration: 3500,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "#198754",
                    },
                    stopOnFocus: true,
                }).showToast();
            },
            error: function (xhr, status, error) {
                Toastify({
                    text: "Something went wrong. Please try again",
                    duration: 3500,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "#dc3545",
                    },
                    stopOnFocus: true,
                }).showToast();
                console.log(error);
            },
        });
    });
    /* Add Product To Cart End*/
});
