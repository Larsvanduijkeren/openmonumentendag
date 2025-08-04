$(document).ready(function () {
    smoothScroll();
    headerController();
});

let headerController = function () {
    let scrollWrapper = $(window);
    let body = $("body");

    if (scrollWrapper.scrollTop() > 0) {
        body.addClass("scrolled");
    }

    scrollWrapper.scroll(function () {
        if (scrollWrapper.scrollTop() > 10) {
            body.addClass("scrolled");
        } else {
            body.removeClass("scrolled");
        }
    });
};

let smoothScroll = function () {
    $(document).on("click", "a[href^=\"#\"]", function (event) {
        event.preventDefault();

        $("html, body").animate({
            scrollTop: $($.attr(this, "href")).offset().top - 120,
        }, 500);
    });
};
