
const $content = document.querySelector('.content-body')
const $list = document.querySelector('.sidebar-list')

$list.addEventListener('click', (event) => {
  if (event.target.matches('.sidebar-item')) {
    localStorage.setItem('CurrentPage', event.target.getAttribute('data-target'))
    
    /* Remove active class to previous elements */
    document.querySelector('.sidebar-item.-active').classList.remove('-active')
    document.querySelector('.content-box.-active').classList.remove('-active')
    
    /* Get the target content from data-target attribute of sidebar items */
    const target = event.target.getAttribute('data-target')
    
    /* Add active class to current elements */
    event.target.classList.toggle('-active')
    document.querySelector(target).classList.toggle('-active')
  }
})

$content.addEventListener('click', (event) => {
  if (event.target.matches('.campaign-menu > .button')) {
    localStorage.setItem('CurrentPage', event.target.getAttribute('data-target'))
  }
})

window.addEventListener('load', (event) => {
  const currentPage = localStorage.getItem('CurrentPage') || '#home';

  document.querySelector('.sidebar-item.-active').classList.remove('-active')
  document.querySelector('.content-box.-active').classList.remove('-active')

  document.querySelector(`.sidebar-item[data-target="${currentPage}"]`).classList.add('-active')

  document.querySelector(currentPage).classList.toggle('-active')
})
