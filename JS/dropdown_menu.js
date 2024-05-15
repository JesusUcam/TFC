//Menu
let toggleBtn = document.querySelector('.toggle_btn');
let toggleBtnIcon = document.querySelector('.toggle_btn i');
let dropDownMenu = document.querySelector('.dropdown_menu');

//Configuracion usuario
let usuario_perfil = document.querySelector('.foto_perfil');
let usuario_config = document.querySelector('.user_config');

toggleBtn.addEventListener("click", function() {
    dropDownMenu.classList.toggle('open')
    let isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen
    ? 'fa-solid fa-xmark'
    : 'fa-solid fa-bars'
})

// Tal vez deba sacar el codigo de config_user
if (usuario_perfil!=null) {
    usuario_perfil.addEventListener("click", function() {
        usuario_config.classList.toggle('open')
    })
} else {
    console.log("no hay sesion?");
}

