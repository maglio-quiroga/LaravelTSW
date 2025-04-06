document.addEventListener('DOMContentLoaded', function () {
    const btnHamburguesa = document.getElementById('btn-hamburguesa');
    const navbar = document.querySelector('.navbar');

    btnHamburguesa.addEventListener('click', function () {
      navbar.classList.toggle('activo');
    });
  });