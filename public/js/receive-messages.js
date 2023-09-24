window.addEventListener('load', () => {
    var pusher = new Pusher('0636799640a58312ad5f', {
        cluster: 'mt1'
    });

    let roomName = document.getElementById('roomName').value
    let username = document.getElementById('username').value
    let name = document.getElementById('user_name').value
    let main = document.getElementById('main')

    var channel = pusher.subscribe(roomName);
    channel.bind('messaging', async function(data) {
        console.log(data)
        let msg = document.createElement('div')
        if (data['type'] == 'img') {
            msg.innerHTML = `


                <div class="relative self-end" id="dropdown-toast">
                    <img src="https://api.dicebear.com/6.x/initials/svg?seed=${data['name']}" class="w-5 h-5 rounded-full" id="toggle">
                    <span class="absolute shadow-lg rounded-lg flex-col w-fit mt-1 bg-slate-500 bg-opacity-70 hidden z-20 overflow-hidden px-3 py-1 text-white -left-5" id="toast">${data['name']}</span>
                </div>
                <img src="${data['image']}" class="w-full h-[20em] rounded-lg object-cover" alt="">


            `
        } else {
            let text = await decrypt(data['msg'])
            msg.innerHTML = `
            <div class="relative self-end" id="dropdown-toast">
                <img src="https://api.dicebear.com/6.x/initials/svg?seed=${data['name']}" class="w-5 h-5 rounded-full" id="toggle">
                <span class="absolute shadow-lg rounded-lg flex-col w-fit mt-1 bg-slate-500 bg-opacity-70 hidden z-20 overflow-hidden px-3 py-1 text-white -left-5" id="toast">${data['name']}</span>
            </div>
                <p class="bg-sky-500 p-3 w-full self-start text-white rounded-lg break-all">${text}</p>
            `
        }
        if (data['username'] == username) {

            msg.className = "flex flex-row-reverse w-fit self-end m-5 my-1 gap-2 max-w-[50%]"
            msg.querySelector('#toast').classList.replace('-left-5', '-left-20')
        } else {
            msg.className = "flex flex-row w-fit m-5 gap-2 max-w-[50%]"
        }

        main.append(msg)
        main.scrollTo(0, main.offsetHeight)
        setMsg()
    });

    let frm = document.getElementById('msg')
    frm.addEventListener('submit', async (ev) => {
        ev.preventDefault()
        let f = new FormData(frm)

        sendMessage(f);
        frm.reset()
    })

    let image = document.getElementById('image')
    image.addEventListener('change', async (ev) => {
        let f = new FormData(frm);
        const imageResponse = await sendImage(f, f.get('_token'));
        f.append('type', 'img');
        f.append('image', imageResponse);
        f.append('msg', 'fkit');
        sendMessage(f);
        console.log(f.get('image'));
    })
})

async function decrypt(message) {
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let frm = new FormData()
    frm.append('str', message)
    frm.append('_token', csrfToken)

    let response = await fetch(location.origin + '/decrypt', {
        method: 'POST',
        body: frm
    })

    let text = await response.text()

    console.log(text)

    return text
}

async function sendMessage(message) {
    console.log(document.getElementById('link').value)
    console.log(message)

    const response = await fetch(document.getElementById('link').value, {
        method: 'POST',
        body: message
    });
    console.log(response);
}

async function sendImage(f, csrf) {
    let frm = new FormData();
    frm.append('image', f);
    frm.append('_token', csrf);
    console.log(f)

    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    console.log('attempting');

    try {
        const response = await fetch(document.getElementById('image_link').value, {
            method: 'POST',
            body: f,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        const data = await response.text();
        console.log(data);
        return data;
    } catch (error) {
        console.error(error);
        return ''; // Return an empty string or handle the error as needed.
    }
}
