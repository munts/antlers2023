let status

export function init (options) {
  if (!status) {
    const apiKey = options.apiKey
    const callback = `googleMaps_${Date.now()}`
    const url = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=${callback}`
    status = new Promise((resolve, reject) => {
      window[callback] = () => {
        resolve()
      }
    })

    const script = document.createElement('script')
    script.src = url
    document.head.appendChild(script)
  }
  return status
}
