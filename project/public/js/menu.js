function toggleSubMenu(element) {
    $(element).siblings('.sub-menu').slideToggle();
}

function toggleMenu(element) {
    $('#sidebar').toggleClass('active');
}