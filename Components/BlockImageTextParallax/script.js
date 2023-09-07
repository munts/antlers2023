import Rellax from 'rellax'

let rellax

const isMobile = () => window.matchMedia('(max-width: 767px)').matches

const isMobileMediaQuery = window.matchMedia('(min-width: 767px)')
isMobileMediaQuery.addEventListener('change', setParallax)

setParallax()

function setParallax () {
  if (isMobile()) {
    if (rellax) {
      rellax.destroy()
      rellax = false
    }
  } else {
    if (!rellax && !isMobile()) {
      rellax = new Rellax(
        'flynt-component[name="BlockImageTextParallax"] [data-parallax]', {
          speed: 2,
          center: true,
          percentage: 0.5
        })
    } else if (rellax) {
      rellax.refresh()
    }
  }
}
