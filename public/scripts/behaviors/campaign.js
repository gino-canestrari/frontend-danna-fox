
const $content = document.querySelector('.content-body')
const $main = document.querySelector('.main-box')

$content.addEventListener('click', (event) => {
  if (event.target.matches('.campaign-right > .icon')) {
    
    const campaignId = Number(event.target.nextElementSibling.getAttribute('data-campaign'))
    const otherMenu = document.querySelector('.campaign-menu.-opened')

    
    /* Check if other menu isn't equal to current menu */
    if (otherMenu && campaignId != Number(otherMenu.getAttribute('data-campaign'))) {
      /* Remove opened class to other campaign menu */
      otherMenu.classList.remove('-opened')
    }

    /* Add opened class to current campaign menu */
    event.target.nextElementSibling.classList.toggle('-opened')
    
  }
})

$main.addEventListener('click', (event) => {
  if (!event.target.matches('.campaign-right > .icon') && !event.target.matches('.campaign-menu')) {
    
    /* Remove opened class to other campaign menu */
    const otherMenu = document.querySelector('.campaign-menu.-opened')

    if (otherMenu) {
      otherMenu.classList.remove('-opened')
    }
    
  }
})
