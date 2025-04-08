
  window.addEventListener('load', () => {
      const preloader = document.getElementById('preloader');
      const spinner = document.querySelector('.spinner');
      spinner.style.opacity = '0';
      setTimeout(() => {
          preloader.style.opacity = '0';
          preloader.style.pointerEvents = 'none';
      }, 300);
      setTimeout(() => {
          preloader.style.display = 'none';
      }, 800);
  });



const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
      if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target);
      }
  });
}, {
  threshold: 0.3,
});

document.querySelectorAll('.fade-in').forEach(element => {
  observer.observe(element);
});
