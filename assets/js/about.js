$(document).ready(()=>{
    //FUNCTIONS
    const initTestimonials = () => {
        const slider = new Swiper('.swiper.testimonials', {
          slidesPerView: 1,
          spaceBetween: 30,
          touchEventsTarget: 'container',
          breakpoints: {
            980: {
              slidesPerView: 2,
              spaceBetween: 30,
            }
          },
          pagination: {
            el: '.swiper-pagination',
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          }
        })
      }

    //INIT
    if(document.readyState != 1){
        initTestimonials()
    }
})