
const navigation = document.querySelector('.sidebar-list')

navigation.addEventListener('click', (event) => {
  if (event.target.matches('.link')) {
    document.querySelector('.sidebar-item.-active').classList.remove('-active')
    event.target.parentNode.classList.toggle('-active')
  }
  
  if (event.target.matches('.bx')) {
    document.querySelector('.sidebar-item.-active').classList.remove('-active')
    event.target.parentNode.parentNode.classList.toggle('-active')
  }
})
