
const $items = document.querySelectorAll('.sidebar-item')
const $contents = document.querySelectorAll('.content-box')

$items.forEach((item, index) => {
  item.addEventListener('click', (event) => {
    if (event.target.matches('.sidebar-item')) {
      document.querySelector('.sidebar-item.-active').classList.remove('-active')
      document.querySelector('.content-box.-active').classList.remove('-active')
      event.target.classList.toggle('-active')
      $contents[index].classList.toggle('-active')
    }

    if (event.target.matches('.link')) {
      document.querySelector('.sidebar-item.-active').classList.remove('-active')
      document.querySelector('.content-box.-active').classList.remove('-active')
      event.target.parentNode.classList.toggle('-active')
      $contents[index].classList.toggle('-active')
    }
    
    if (event.target.matches('.bx')) {
      document.querySelector('.sidebar-item.-active').classList.remove('-active')
      document.querySelector('.content-box.-active').classList.remove('-active')
      event.target.parentNode.parentNode.classList.toggle('-active')
      $contents[index].classList.toggle('-active')
    }

  })
})
