$(function () {
    $(".toggle_with").on("click", function () {
        product_id = $(this).attr("product_id");
        like_product = $(this).attr("like_product");
        click_button = $(this);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/like_product",
            type: "POST",
            data: { product_id: product_id, like_product: like_product },
        })
            .done(function (data) {
                if (data == 0) {
                    click_button.attr("like_product", "1");
                    click_button.children().attr("class", "fas fa-heart");
                }
                if (data == 1) {
                    click_button.attr("like_product", "0");
                    click_button.children().attr("class", "far fa-heart");
                }
            })
            .fail(function (data) {
                alert("いいね処理失敗");
                alert(JSON.stringify(data));
            });
    });
});
