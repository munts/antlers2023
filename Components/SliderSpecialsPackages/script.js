// import { buildRefs, getJSON } from '@/assets/scripts/helpers.js'
// import Swiper from 'swiper'
// import { Autoplay, A11y, Navigation, Pagination } from 'swiper/modules'
// import 'swiper/css'
// import 'swiper/css/autoplay'
// import 'swiper/css/a11y'
// import 'swiper/css/navigation'
// import 'swiper/css/pagination'

// export default function (el) {
//   const refs = buildRefs(el)
//   const data = getJSON(el)

//   const swiper = initSlider(refs, data)
//   return () => swiper.destroy()
// }

// function initSlider (refs, data) {
//   const { options } = data

//   const config = {
//     modules: [Autoplay, A11y, Navigation, Pagination],
//     a11y: options.a11y,
//     loop: true,
//     // roundLengths: true,
//     navigation: {
//       nextEl: refs.next,
//       prevEl: refs.prev
//     },
//     // centeredSlides: true,
//     slidesPerView: 2,
//     //spaceBetween: 30,
//     pagination: {
//       el: refs.pagination,
//       clickable: true
//     },
//     // Responsive breakpoints
//     breakpoints: {
//       // when window width is >= 400px
//       400: {
//         slidesPerView: 1,
//         spaceBetween: 0
//       },
//       // when window width is >= 480px
//       768: {
//         slidesPerView: 2,
//         spaceBetween: 30
//       }
//       // // when window width is >= 640px
//       // 980: {
//       //   slidesPerView: 2,
//       //   spaceBetween: 60
//       // }
//     }
//   }

//   if (options.autoplay && options.autoplaySpeed) {
//     config.autoplay = {
//       delay: options.autoplaySpeed
//     }
//   }

//   return new Swiper(refs.slider, config)
// }

import { buildRefs, getJSON } from '@/assets/scripts/helpers.js'
import Swiper from 'swiper'
import { Autoplay, A11y, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/autoplay'
import 'swiper/css/a11y'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

export default function (el) {
  const refs = buildRefs(el)
  const data = getJSON(el)

  const swiper = initSlider(refs, data)
  return () => swiper.destroy()
}

function initSlider (refs, data) {
  const { options } = data

  const config = {
    modules: [Autoplay, A11y, Navigation, Pagination],
    a11y: options.a11y,
    roundLengths: false,
    navigation: {
      nextEl: refs.next,
      prevEl: refs.prev
    },
    loop: true,
    slidesPerView: 2,
    centeredSlides: false,
    // slidesPerGroupSkip: 2,
    grabCursor: true,
    keyboard: {
      enabled: true
    },
    // breakpoints: {
    //   769: {
    //     slidesPerView: 2,
    //   },
    // },
    pagination: {
      el: refs.pagination,
      clickable: true
    }
  }

  if (options.autoplay && options.autoplaySpeed) {
    config.autoplay = {
      delay: options.autoplaySpeed
    }
  }

  return new Swiper(refs.slider, config)
}
