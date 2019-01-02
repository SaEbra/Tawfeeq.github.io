document.querySelector('.loader')
.addEventListener('click', (e) => {
  e.currentTarget
  .querySelector('.loader__result')
  .classList.toggle('loader__result--is-complete');
})