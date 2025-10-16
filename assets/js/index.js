






document.addEventListener("DOMContentLoaded", () => {

  // Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach(element => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

  

  const nav = document.getElementById("nav");
  const navBtn = document.getElementById('burger');
  if(navBtn){
    navBtn.addEventListener("click", function () {
      if (this.getAttribute("aria-expanded") == "true") {
        this.setAttribute("aria-expanded", "false");
        this.classList.remove('expanded');
      } else {
        this.setAttribute("aria-expanded", "true");
        this.classList.add('expanded');
      }
    });
  }
    


  
});










    
