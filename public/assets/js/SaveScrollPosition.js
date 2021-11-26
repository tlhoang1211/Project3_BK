const current_page = window.location.href;

document.addEventListener("DOMContentLoaded", function (event)
{
    let scroll_position = sessionStorage.getItem(`scroll_position_of_${current_page}`);
    scroll_position = JSON.parse(scroll_position);

    if (scroll_position.page === current_page)
    {
        window.scrollTo(0, scroll_position.position);
    }
});

window.onbeforeunload = function (e)
{
    const page_scroll_position = {
        page: current_page,
        position: window.scrollY
    };

    sessionStorage.setItem(`scroll_position_of_${current_page}`, JSON.stringify(page_scroll_position));
};
