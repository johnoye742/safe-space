window.addEventListener('load', () => {
    let toggle = document.getElementById('toggle')
    let nav = document.getElementById('nav')
    let cancel = document.getElementById('cancel')

    toggle.addEventListener('click', () => {
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