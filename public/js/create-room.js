window.addEventListener('load', () => {
    let form = document.getElementById('room_form')
    let select = document.getElementById('avail')
    let availability = document.getElementById('availability')

    form.addEventListener('submit', (ev) => {
        ev.preventDefault()
        let frm = new FormData(form)
        let selected = select.options[select.selectedIndex].value
        availability.value = selected

        console.log(availability.value)
        form.submit()
    })
});
