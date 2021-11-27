let current_page = window.location.href;
// Remove ?page=1,2,3... generated in the URL by Laravel pagination
current_page = current_page.replace(/\?page=[\d]/gm, "");

document.addEventListener("DOMContentLoaded", () =>
{
    let scroll_position = sessionStorage.getItem(`scroll_position_of_${current_page}`);
    scroll_position = JSON.parse(scroll_position);

    if (scroll_position.page === current_page)
    {
        window.scrollTo(0, scroll_position.position);
    }
});

window.onbeforeunload = () =>
{
    const page_scroll_position = {
        // Remove last character in case the page is using pagination (end up with page=1,2,...)
        page: current_page,
        position: window.scrollY
    };

    sessionStorage.setItem(`scroll_position_of_${current_page}`, JSON.stringify(page_scroll_position));
};

console.log(current_page);
