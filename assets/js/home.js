$(document).ready(() => {
  //VARIABLES
  const closeModal = document.getElementById('closeModal');
  const iframe = document.getElementById('iframe');
  const youtubeModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('youtube-modal'));


  //FUNCTIONS
  const resetIframe = () => {
    iframe.src = iframe.dataset.src;
  }



  //CLICK EVENTS
  closeModal.addEventListener('click', () => {
    youtubeModal.hide();
  });
  youtubeModal._element.addEventListener('hide.bs.modal', ()=>{
    resetIframe();
  })
  youtubeModal._element.addEventListener('shown.bs.modal', ()=>{
    resetIframe();
  })
 
})