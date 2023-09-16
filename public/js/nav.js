window.addEventListener('load', (ev) => {
    let navbar = document.getElementById('navbar')

    navbar.classList.replace('bg-white', 'bg-transparent')
    navbar.classList.add('text-white')

    window.addEventListener('scroll', (ev) => {
        console.log(window.scrollY)
        if(window.scrollY > 500) {
            navbar.classList.replace('bg-transparent', 'bg-white')
            navbar.classList.remove('text-white')
            navbar.classList.add()
        } else {
            navbar.classList.replace('bg-white', 'bg-transparent')
            navbar.classList.add('text-white')
        }
    })
})
