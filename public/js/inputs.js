window.addEventListener('load', () => {
    console.log('kuso')
    const inputs = document.getElementsByClassName('custom-input')
    console.log(inputs)
    for(i = 0; i < inputs.length; i++) {
        //const(inp) is the actual input element while const(input) is the div element
        const input = inputs[i];
        const inp = input.getElementsByTagName('input')[0]
        const select = input.getElementsByTagName('select')[0]
        console.log(i)

        
        if(inp != null || inp != undefined) {
            inp.addEventListener('focus', () => {
                input.classList.replace('border-gray-200', 'border-sky-600')
            })
    
            inp.addEventListener('focusout', () => {
                input.classList.replace('border-sky-600', 'border-gray-200')
            })
        }

        if(select != null || select != undefined) {
            select.addEventListener('focus', () => {
                input.classList.replace('border-gray-200', 'border-sky-600')
            })
    
            select.addEventListener('focusout', () => {
                input.classList.replace('border-sky-600', 'border-gray-200')
            })
        }

    }
})