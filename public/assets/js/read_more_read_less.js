$(".readmore-btn").on('click', function () {
    $(this).parent().toggleClass("showContent");

    // Shorthand if-else statement
    var replaceText = $(this).parent().hasClass("showContent") ? "Rút gọn" : "Đọc thêm";
    $(this).text(replaceText);
});
