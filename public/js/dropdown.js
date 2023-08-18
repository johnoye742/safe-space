window.addEventListener('load', (ev) => {
    let wrapper = document.querySelectorAll('#dropdown-wrapper')
    wrapper.forEach((wrapper) => {
        let toggle = wrapper.querySelector('#toggle')
        let dropdown = wrapper.querySelector('#dropdown')
    
        toggle.addEventListener('click', (ev) => {
            console.log('clicked')
            if(dropdown.classList.contains('hidden')) {
                dropdown.classList.replace('hidden', 'flex')
            }
            window.addEventListener('click', (ev) => {
            console.log(ev.target)
            if(ev.target != dropdown && ev.target != toggle) {
                
                dropdown.classList.replace('flex', 'hidden')
                
            }
            })
        })
    })
    

    
})