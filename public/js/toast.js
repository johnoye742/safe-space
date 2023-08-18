window.addEventListener('load', (ev) => {
    setMsg()
})

let setMsg = () => {
    let wrappers = document.querySelectorAll('#dropdown-toast')
    wrappers.forEach((wrapper) => {
        let toggle = wrapper.querySelector("#toggle")
        let toast = wrapper.querySelector('#toast')
        toggle.addEventListener('mouseover', (ev) => {
            if(toast.classList.contains('hidden')) {
                toast.classList.replace('hidden', 'flex')
            }
        })
        toggle.addEventListener('mouseout', (ev) => {
            if(toast.classList.contains('flex')) {
                toast.classList.replace('flex', 'hidden')
            }
        })
    })
}