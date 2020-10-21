const elements = Array.from(document.querySelectorAll('.menu-item-has-children'));

elements.forEach(element => {
    element.addEventListener('mouseenter', displaySubItems);
    element.addEventListener('mouseleave', hideSubItems);
});

function displaySubItems(e) {
    let target = e.target;
    target.querySelector('.navbar-menu-subitem').classList.add("active")
}

function hideSubItems(e) {
    let target = e.target;
    target.querySelector('.navbar-menu-subitem').classList.remove("active")
}