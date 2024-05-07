console.log("Todavía no funciona en mobile");

let modal = document.querySelector("#myModal")
let iniciar_sesion = document.getElementsByClassName('action_btn')[0];
let span = document.getElementsByClassName("close")[0];

iniciar_sesion.addEventListener('click', function() {
  modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
span.addEventListener("click", function() {
  modal.style.display = "none";
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener("click", function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});