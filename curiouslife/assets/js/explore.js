const data = [
    {
      image: "../images/intro1.jpg",
      title: "Home Automation",
      url: "https://hariramjp777.github.io/frontend-todo-app/",
    },
    {
      image: "../images/intro2.jpg",
      title: "Grid Component",
      url: "https://hariramjp777.github.io/frontend-single-price-grid-component/",
    },
    {
      image: "../images/intro3.jpg",
      title: "Social Proof Section",
      url: "https://hariramjp777.github.io/frontend-social-proof-section/",
    },
    {
      image: "../images/intro1.jpg",
      title: "SignUp Form",
      url: "https://hariramjp777.github.io/frontend-intro-component-signup-form/",
    },
    {
      image: "../images/intro1.jpg",
      title: "Testimonials Grid Layout Page",
      url: "https://hariramjp777.github.io/frontend-testimonials-grid-section/",
    },
    {
      image: "../images/intro1.jpg",
      title: "Social Media Dashboard",
      url:
        "https://hariramjp777.github.io/frontend-social-media-dashboard-theme-switcher/",
    },
    {
      image: "../images/intro1.jpg",
      title: "Landing Page",
      url:
        "https://hariramjp777.github.io/frontend-huddle-landing-page-intro-section/",
    },
    {
      image: "../images/intro1.jpg",
      title: "Landing Page",
      url: "https://hariramjp777.github.io/frontend-fylo-data-storage-component/",
    },
    {
      image: "../images/intro1.jpg",
      title: "../images/intro1.jpg",
      url: "https://hariramjp777.github.io/frontend-404-page-challenge/",
    },
    {
      image: "../images/intro1.jpg",
      title: "Team Page",
      url: "https://hariramjp777.github.io/frontend-team-page/",
    },
    {
      image: "../images/intro1.jpg",
      title: "Recipe Page",
      url: "https://hariramjp777.github.io/frontend-recipe-page/",
    },
    {
      image: "../images/intro1.jpg",
      title: "Cards",
      url: "https://hariramjp777.github.io/frontend-four-card-feature-section/",
    },
  ];
  
  document.addEventListener("DOMContentLoaded", function () {
    fillCards();
    const next = document.getElementById("next");
    const prev = document.getElementById("prev");
    next.addEventListener("click", function () {
      const currCard = document.querySelector(".card.view");
      const nextCard = currCard.nextElementSibling
        ? currCard.nextElementSibling
        : document.querySelector(".card-container").firstElementChild;
      currCard.classList.remove("view");
      nextCard.classList.add("view");
    });
  
    prev.addEventListener("click", function () {
      const currCard = document.querySelector(".card.view");
      const prevCard = currCard.previousElementSibling
        ? currCard.previousElementSibling
        : document.querySelector(".card-container").lastElementChild;
      currCard.classList.remove("view");
      prevCard.classList.add("view");
    });
  
    document.addEventListener("keydown", function (e) {
      if (e.key === "ArrowLeft") prev.click();
      else if (e.key === "ArrowRight") next.click();
      else return false;
    });
  
    document.querySelector(".btn").addEventListener("click", function () {
      const img = this.children[0];
      document.querySelector(".about").classList.toggle("view");
      setTimeout(function () {
        img.setAttribute(
          "src",
          img.getAttribute("src") === "./images/icon-cross.svg"
            ? "./images/icon-hamburger.svg"
            : "./images/icon-cross.svg"
        );
      }, 800);
    });
  });
  
  function fillCards() {
    const container = document.querySelector(".card-container");
    data.forEach((data) => {
      const card = document.createElement("div"),
        cardImage = document.createElement("div"),
        img = document.createElement("img"),
        url = document.createElement("a");
      img.setAttribute("src", data.image);
      img.setAttribute("alt", data.title);
      url.textContent = data.title;
      url.setAttribute("href", data.url);
      url.setAttribute("target", "_blank");
      card.classList.add("card");
      cardImage.classList.add("card-image");
      if (data.title === "Home Automation") {
        card.classList.add("view");
      }
      cardImage.appendChild(img);
      card.appendChild(cardImage);
      card.appendChild(url);
      container.appendChild(card);
    });
  }
  