window.addEventListener('load', () => {
    var pusher = new Pusher('0636799640a58312ad5f', {
        cluster: 'mt1'
    });

    let roomName = document.getElementById('roomName').value
    let username = document.getElementById('username').value
    let name = document.getElementById('user_name').value
    let main = document.getElementById('main')

    var channel = pusher.subscribe(roomName);
    channel.bind('messaging', function(data) {
        console.log(data)
        let msg = document.createElement('div')
        if(data['type'] == 'img') {
            msg.innerHTML = `
            <div class="flex flex-row m-5 gap-2">
                <div class="relative self-end" id="dropdown-toast">
                    <img src="https://api.dicebear.com/6.x/initials/svg?seed=${data['name']}" class="w-5 h-5 rounded-full" id="toggle">
                    <span class="absolute shadow-lg rounded-lg flex-col w-fit mt-1 bg-slate-500 bg-opacity-70 hidden z-20 overflow-hidden px-3 py-1 text-white -left-5" id="toast">${data['name']}</span>
                </div>

                <img src="${data['image']}" class="max-w-[50%] h-[20em] rounded-lg" alt="">
            </div>
            `
        } else {
            msg.innerHTML = `
            <div class="relative self-end" id="dropdown-toast">
                <img src="https://api.dicebear.com/6.x/initials/svg?seed=${data['name']}" class="w-5 h-5 rounded-full" id="toggle">
                <span class="absolute shadow-lg rounded-lg flex-col w-fit mt-1 bg-slate-500 bg-opacity-70 hidden z-20 overflow-hidden px-3 py-1 text-white -left-5" id="toast">${data['name']}</span>
            </div>
                <p class="bg-sky-500 p-3 w-fit self-start text-white rounded-lg ">${data['msg']}</p>
            `
        }
        if(data['username'] == username) {

            msg.className = "flex flex-row-reverse w-fit self-end m-5 gap-2 max-w-[50%]"
            msg.querySelector('#toast').classList.replace('-left-5', '-left-20')
        } else {
            msg.className = "flex flex-row w-fit m-5 gap-2 max-w-[50%]"
        }


        main.append(msg)
        main.scrollTo(0, main.offsetHeight)
        setMsg()
    });


    let frm = document.getElementById('msg')
    frm.addEventListener('submit', (ev) => {
        ev.preventDefault()
        let f = new FormData(frm)
        console.log(f)
        sendMessage(f)
        frm.reset()
    })

    let image = document.getElementById('image')
    image.addEventListener('change', (ev) => {
        let f = new FormData(frm)
        f.append('type', 'img')
        f.append('image', sendImage(f))
        sendMessage(f)
        console.log(sendImage(new FormData(frm)))
    })

})

function sendMessage(message) {

    console.log(document.getElementById('link').value)
    console.log(message)

    fetch(document.getElementById('link').value, {
        method: 'POST',
        body: message
    }).then((response) => console.log(response))

}

function sendImage(frm) {

    fetch(document.getElementById('image_link').value, {
        method: 'POST',
        body: frm
    }).then(res => res.text())
    .then(response => { return response;})
}
