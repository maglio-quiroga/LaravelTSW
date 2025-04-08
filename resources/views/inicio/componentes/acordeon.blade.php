<div class="container">
  <h2 style="color:#416788;">ACLAREMOS TUS DUDAS</h2>
  <div class="faqs">
      @foreach($faqs as $faq)
          <div class="faq">
              <div class="head">
                  <span>{{ $faq->titulo }}</span>
                  <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                      <path d="M9 14.469L1 6.46897L1.96897 5.5L9 12.531L16.031 5.5L17 6.46897L9 14.469Z" fill="black"/>
                  </svg>
              </div>
              <div class="content">
                  <p>{{ $faq->texto }}</p>
              </div>
          </div>
      @endforeach
  </div>
</div>

<script>
 document.addEventListener("DOMContentLoaded", function() {
    const accordeons = document.querySelectorAll('.faq .head');

    accordeons.forEach(function(acc) {
        // Obtén el contenido del acordeón
        const content = acc.nextElementSibling;

        // Asegúrate de que el contenido esté cerrado al principio
        content.style.display = "none";
        content.style.height = "0"; // Garantiza que el contenido esté cerrado por defecto

        acc.addEventListener('click', function() {
            // Alternar el estado de visibilidad
            if (content.style.display === "block") {
                content.style.display = "none";
                content.style.height = "0"; // Volver a cerrar el acordeón con transición suave
            } else {
                content.style.display = "block";
                content.style.height = content.scrollHeight + "px"; // Abrir el acordeón con la altura del contenido
            }
        });
    });
});

</script>


{{-- aquí se insertarán dinámicamente 
<link rel="stylesheet" href="{{ asset('css/inicio/acordeon.css') }}">
<div class="container">
      <h2 style="color:#416788;">ACLAREMOS TUS DUDAS</h2>
      <div class="faqs">
        <div class="faq">
          <div class="head">
            <span>¿Hacen envíos a todo el mundo?</span>
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 14.469L1 6.46897L1.96897 5.5L9 12.531L16.031 5.5L17 6.46897L9 14.469Z" fill="black" />
            </svg>
          </div>
          <div class="content">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
              consectetur totam saepe id quae, voluptate, obcaecati temporibus
              alias unde dolore voluptatem aperiam placeat possimus! Labore est
              repudiandae sequi veniam aliquid?
            </p>
          </div>
        </div>
        <div class="faq">
          <div class="head">
            <span>
              ¿En cuantos días llega mi pedido?
            </span>
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 14.469L1 6.46897L1.96897 5.5L9 12.531L16.031 5.5L17 6.46897L9 14.469Z" fill="black" />
            </svg>
          </div>
          <div class="content">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
              consectetur totam saepe id quae, voluptate, obcaecati temporibus
              alias unde dolore voluptatem aperiam placeat possimus! Labore est
              repudiandae sequi veniam aliquid?
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
              consectetur totam saepe id quae, voluptate, obcaecati temporibus
              alias unde dolore voluptatem aperiam placeat possimus! Labore est
              repudiandae sequi veniam aliquid?
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
              consectetur totam saepe id quae, voluptate, obcaecati temporibus
              alias unde dolore voluptatem aperiam placeat possimus! Labore est
              repudiandae sequi veniam aliquid?
            </p>
          </div>
        </div>
        <div class="faq">
          <div class="head">
            <span>
              ¿Cómo se manejan las devoluciones?
            </span>
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 14.469L1 6.46897L1.96897 5.5L9 12.531L16.031 5.5L17 6.46897L9 14.469Z" fill="black" />
            </svg>
          </div>
          <div class="content">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
              consectetur totam saepe id quae, voluptate, obcaecati temporibus
              alias unde dolore voluptatem aperiam placeat possimus! Labore est
              repudiandae sequi veniam aliquid?
            </p>
          </div>
        </div>
      </div>
</div>

<script src="{{ asset('js/inicio/acordeon.js') }}"></script>--}}