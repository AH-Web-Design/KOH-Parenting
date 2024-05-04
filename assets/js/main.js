$(document).ready(() => {
  //VARIABLES
  const parallax = $('.jarallax');
  const blogPostCard = document.querySelectorAll('.blog-post-card');
  const newsletterFormSubmit = document.getElementById('newsletterFormSubmit');
  if (newsletterFormSubmit) {
    const newsletterFormName = document.getElementById('newsletterFormName');
    const newsletterFormNameHelp = document.getElementById('newsletterFormNameHelp');
    const newsletterFormEmail = document.getElementById('newsletterFormEmail');
    const newsletterFormEmailHelp = document.getElementById('newsletterFormEmailHelp');
    const newsletterFormEmailHelpDefaultText = newsletterFormEmailHelp.innerText;
    const beforeEmailRegister = document.getElementById('beforeEmailRegister');
    const afterEmailRegister = document.getElementById('afterEmailRegister');
    const loading = document.getElementById('loading');
    const afterEmailRegisterIcon = document.getElementById('afterEmailRegisterIcon');
    const afterEmailRegisterTitle = document.getElementById('afterEmailRegisterTitle');
    const afterEmailRegisterText = document.getElementById('afterEmailRegisterText');
    const afterEmailRegisterIconDefaultClassName = afterEmailRegisterIcon.className;
    const afterEmailRegisterTitleDefaultText = afterEmailRegisterTitle.innerHTML;
    const afterEmailRegisterTextDefaultText = afterEmailRegisterText.innerHTML;
    const closePopup = subscriptionSection.querySelector('#close-popup');
    const floatingSubscriptionForm = document.querySelector('.floating-subscription-form');
    //const agreeTerms = document.getElementById('agree-terms');


    const errorScreen = () => {
      afterEmailRegisterIcon.className = 'fa-solid fa-circle-exclamation red';
      afterEmailRegisterTitle.innerText = 'Something went wrong';
      afterEmailRegisterText.innerText = 'It seems we are having issues getting your email registered at the moment. Please try again in a few minutes.';
      if (!document.getElementById('newsletterFormRetry')) {
        afterEmailRegister.innerHTML += '<a id="newsletterFormRetry" title="Try Again" href="" class="btn btn-primary ms-auto me-auto d-table"><i class="fa-solid fa-rotate-right"></i> Try Again</a>';
      }
      const afterEmailRegisterRetry = document.getElementById('newsletterFormRetry');
      beforeEmailRegister.style.display = 'none';
      if(floatingSubscriptionForm) {
        beforeEmailRegister.remove();
      }
      loading.classList.add('d-none');
      afterEmailRegister.classList.remove('d-none');
      afterEmailRegisterRetry.addEventListener('click', (e) => {
        e.preventDefault();
        newsletterFormEmailHelp.innerText = newsletterFormEmailHelpDefaultText;
        afterEmailRegister.classList.add('d-none');
        beforeEmailRegister.style.display = 'block';
      })
    };

    const successScreen = (email) => {
      afterEmailRegisterIcon.className = afterEmailRegisterIconDefaultClassName;
      afterEmailRegisterTitle.innerHTML = afterEmailRegisterTitleDefaultText;
      afterEmailRegisterText.innerHTML = afterEmailRegisterTextDefaultText;
      document.getElementById('emailSlot').innerText = email;
      beforeEmailRegister.style.display = 'none';
      if(floatingSubscriptionForm) {
        beforeEmailRegister.remove();
      }
      loading.classList.add('d-none');
      afterEmailRegister.classList.remove('d-none');
    }

    const reloadAfter = (seconds, url = window.location.origin+window.location.pathname) => {
      setTimeout(() => {
        window.location.href = url;
      }, seconds * 1000)
    }

    const alreadyRegisteredScreen = () => {
      afterEmailRegisterIcon.className = afterEmailRegisterIconDefaultClassName;
      afterEmailRegisterTitle.innerText = 'Welcome back!';
      afterEmailRegisterText.innerText = 'You are already subscribed!';
      beforeEmailRegister.style.display = 'none';
      if(floatingSubscriptionForm) {
        beforeEmailRegister.remove();
      }
      loading.classList.add('d-none');
      afterEmailRegister.classList.remove('d-none');
    }

    const invalidEmail = () => {
      newsletterFormEmailHelp.innerText = 'Please enter a valid email address!';
      if(!floatingSubscriptionForm) {
        newsletterFormEmailHelp.style.color = 'red';
      }
    }
    

    const emptyField = (fields) => {

      let status = [];
      
      fields.forEach(field => {
          const help = document.getElementById(field.getAttribute('aria-describedby'));
          if(field.value == null || field.value == '' || field.value == ' '){
            status.push(false);
            help.innerText = help.dataset.empty;
          } else {
            status.push(true);
            help.innerText = '';
          }
      })

      if(status.some(e => !e)){
        return false;
      } else {
        return true;
      }
    }

    const sendNewsletterForm = (email = newsletterFormEmail, name = newsletterFormName) => {      

      if (emptyField([email, name])) {
        if (validateEmail(email.value)) {
          loading.classList.remove('d-none');
          const requestUrl = window.location.origin + '/wp-admin/admin-post.php';
          const action = 'submitContact';
          const data = email.value +','+ name.value;
          const url = requestUrl + '?action=' + action + '&email=' + email.value + '&name=' + name.value;
          fetch(url)
            .then(
              (response) => {
                if (response.ok) {
                  return response.text();
                }
                return Promise.reject(response);
              }
            ).then(
              (text) => {
                const responseText = JSON.parse(text);
                if(responseText.status === 'OK') {
                  successScreen(email.value);
                  reloadAfter(2, window.location.origin  + '/wp-admin/admin-post.php?action=setSubscriberCookie&token=' + responseText.data + '&ref=' + window.location.pathname);
                } else {
                  if(responseText.status.status = 'FAIL'){
                    if (responseText.status.code === 'E05'){
                      alreadyRegisteredScreen();
                      reloadAfter(2, window.location.origin  + '/wp-admin/admin-post.php?action=setSubscriberCookie&token=' + responseText.data + '&ref=' + window.location.pathname);
                    } else {
                      errorScreen();
                    }
                  }
                }
              }
            ).catch(() => {
              errorScreen();
            });
        } else {
          invalidEmail();
        }
      }
    }

    const validateEmail = (email) => {
      return String(email)
        .toLowerCase()
        .match(
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };

    function setCookie(cname, cvalue, exdays) {
      const d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      let expires = "expires="+d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    
    function getCookie(cname) {
      let name = cname + "=";
      let ca = document.cookie.split(';');
      for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }



    //EVENTS
    
    

    if(document.querySelector('.blog-single-wraper')) {
      const subscriptionSection = document.getElementById('subscriptionSection');
      

      

      const popupSubscriptionSection = () => {
        let popup = getCookie("popup");
        if (popup === "") {
          if(document.documentElement.scrollTop >= (subscriptionSection.offsetTop - window.outerHeight)) {
            if(!subscriptionSection.classList.contains('popup')) {
              subscriptionSection.classList.add('popup');
            }
            setCookie("popup", "1", 2);
          }
        }
       
      }

      popupSubscriptionSection();
      window.addEventListener('scroll', ()=> {
       popupSubscriptionSection();
      });
      
      closePopup.addEventListener('click', ()=> {
        if(subscriptionSection.classList.contains('popup')) {
          subscriptionSection.classList.remove('popup');
        }
      })
    }


    if(document.querySelector('.page-template-template-learning-guide-example')) {
      
      let popup = getCookie("lgpopup");
      if (popup === "") {
        setTimeout(()=>{
          if(!floatingSubscriptionForm.classList.contains('popup')) {
            floatingSubscriptionForm.classList.add('popup');
          }
          if(getCookie("subscriber_session") === "") {
            floatingSubscriptionForm.style.display = 'flex';
          }
        },2000)
        if(!subscriptionSection.classList.contains('popup')) {
          subscriptionSection.classList.add('popup');
        }
      } else {
        if(getCookie("subscriber_session") === "") {
          floatingSubscriptionForm.style.display = 'block';
        }
      }

      closePopup.addEventListener('click', ()=> {
        document.querySelector('.popup').classList.remove('popup');
        if(popup === ""){
          setCookie("lgpopup", "1", 2);
        }
      })
    }

    newsletterFormSubmit.addEventListener('click', (e) => {
      e.preventDefault();
      if(document.querySelector('.page-template-template-learning-guide-example')) {
        if (!floatingSubscriptionForm.classList.contains('popup')) {
          floatingSubscriptionForm.classList.add('popup');
        }
      }
      sendNewsletterForm();
    });




  }


  //FUNCTIONS

  const initTooltips = () => {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  }


  const initSliders = () => {
    const slider = new Swiper('.swiper.generic', {
      loop: true,
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    });
  };


  const initJarallax = () => {
    parallax.jarallax({
      speed: 0.8,
    });
  };


  const setBlogPostClickable = () => {
    blogPostCard.forEach(bpc => {
      bpc.addEventListener('click', (event) => {
        if(!event.target.classList.contains('btn')) {
          bpc.querySelector('.btn').click(); 
        }
      })
    })
  }


  //READY
  if (document.readyState != 1) {
    initSliders();
    initJarallax();
    initTooltips();
    setBlogPostClickable();
  }
})