window.addEventListener('load', () => {
    let toggle = document.getElementById('menu-toggle')
    let nav = document.getElementById('nav')
    let cancel = document.getElementById('cancel')
    console.log(toggle)
    toggle.addEventListener('click', () => {
        console.log('clicked')
        if(nav.classList.contains('hidden')) {
            nav.classList.replace('hidden', 'lg:hidden')
            nav.classList.replace('-ml-[100%]', 'ml-0')

        }

    })

    cancel.addEventListener('click', () => {
        if(nav.classList.contains('lg:hidden')) {
            nav.classList.replace('lg:hidden', 'hidden')
            nav.classList.replace('-ml-0', 'ml-[100%]')
        }
    })
})
