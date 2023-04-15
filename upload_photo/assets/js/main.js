const toggle_side_nav = document.querySelector("#toggle-side-nav");
const side_nav = document.querySelector("#side-nav");
let opened = false;

toggle_side_nav.addEventListener("click", () => {
  if (!opened) {
    document.documentElement.style.setProperty(
      "--side-navigation-width",
      "280px"
    );
    opened = true;
  } else {
    document.documentElement.style.setProperty(
      "--side-navigation-width",
      "0px"
    );
    opened = false;
  }
});

/*======== LOGIC TO CLOSE ===========*/
side_nav.addEventListener("click", () => {
  document.documentElement.style.setProperty("--side-navigation-width", "0px");
  opened = false;
});

/* =============== LOGIC TO OPEN/CLOSE MODAL ============== */
const film = document.getElementById("film");

function openModal(modalName) {
  console.log(modalName);
  switch (modalName) {
    case "book":
      let book_modal = document.getElementById("book-modal");
      book_modal.classList.toggle("visible");
      film.classList.toggle("film_visible");
      break;
    case "student":
      let student_modal = document.getElementById("student-modal");
      student_modal.classList.toggle("visible");
      film.classList.toggle("film_visible");
      break;
    case "admin":
      let admin_modal = document.getElementById("admin-modal");
      admin_modal.classList.toggle("visible");
      film.classList.toggle("film_visible");
      break;

    case "category":
      let category_modal = document.getElementById("category-modal");
      category_modal.classList.toggle("visible");
      film.classList.toggle("film_visible");
      break;

    case "branch":
      let branch_modal = document.getElementById("branch-modal");
      console.log(branch_modal);
      branch_modal.classList.toggle("visible");
      film.classList.toggle("film_visible");
      break;

    case "issue":
      let issue_modal = document.getElementById("issue-modal");
      issue_modal.classList.toggle("visible");
      film.classList.toggle("film_visible");
      break;

    case "return":
      let return_modal = document.getElementById("return-modal");
      return_modal.classList.toggle("visible");
      film.classList.toggle("film_visible");
      break;

    default:
      break;
  }
}

let modal_close_div = document.querySelectorAll(".modal__close-div");
modal_close_div.forEach((modal) =>
  modal.addEventListener("click", (e) => {
    let modalID = e.target.parentElement.parentElement.id;
    let modal = document.getElementById(`${modalID}`);
    modal.classList.toggle("visible");
    film.classList.toggle("film_visible");
  })
);

/* ============== LOGIC TO SHOW/HIDE DROP DOWN ============= */
const dropDownMenu = document.querySelector("#login__detail-dropdown");
const login__detail_div = document.querySelector("#login__detail_div");
const dropDown_toggle_icon = document.querySelector("#dropDown_toggle_icon");

login__detail_div.addEventListener("click", () => {
  dropDownMenu.classList.toggle("dropdown-menu-show");
  dropDown_toggle_icon.classList.toggle("rotateIcon");
});
