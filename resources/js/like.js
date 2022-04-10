$(function () {
    let like = $(".like-toggle");
    let liekProductId;
    like.on("click", function () {
        let $this = $(this);
        liekProductId = $this.data("product-id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/like",
            method: "POST",
            data: {
                product_id: liekProductId,
            },
        })
            .done(function (data) {
                $this.toggleClass("liked");
                $this.next(".like-counter").html(data.product_likes_count);
            })
            .fail(function () {
                console.log("fail");
            });
    });
});
