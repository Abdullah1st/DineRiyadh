document.head.innerHTML += `
<meta name="viewport" content="width=device-width, initial-scale=1" />
`;

function goTo(order) {
    window.open(`../../resturants/rsetaurant${order}/Resturant_page.html`, "_blank");
}

// event listener for up button
let upBtn = document.querySelector("footer button");
upBtn.addEventListener("click", () => window.open('#top', '_self'));

// event listener for burger menu
let menu = document.querySelector("nav ul:first-of-type");
let menuState = menu.style;
let burgerMenu = document.querySelector(".burger");
burgerMenu.addEventListener("click", () => {
    menuState.display = (menuState.display == "flex") ? "none" : "flex";
});