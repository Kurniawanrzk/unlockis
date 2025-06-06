<div style="max-width: 100vh; margin: 0 auto;">
    <div id="chat" style="padding: 10px; border-radius: 4px; max-height: 400px; overflow-y: auto;display:grid">
        <p style="float:right;margin-bottom:10px;font-size:13px;background-color:white;padding:10px;border-radius:10px">Bot: Halo, saya akan membantu menjawab pertanyaan seputar unlock studio</p>
    </div>
    <div style="display: flex;padding:5px;position: absolute;bottom:20px;right:10px">
        <input type="text" id="userInput" placeholder="Ask something..." style="width:100%;flex: 1; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
        <button id="btn" style="width:fit-content;padding: 8px 16px; margin-left: 5px; border-radius: 4px; border: none; background-color: #2c4257; color: white; cursor: pointer;">
            Send
        </button>
    </div>

    @php
        $paket = App\Models\LayananFoto::all();
        $arr_nama_layanan = [];

        foreach($paket as $p) {
            $arr_nama_layanan[] = $p->nama_layanan_foto;
        }
    @endphp
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/markdown.js/0.5.0/markdown.min.js" integrity="sha512-kaDP6dcDG3+X87m9SnhyJzwBMKrYnd2tLJjGdBrZ9yEL8Zcl2iJRsPwylLkbd2g3QC5S8efV3sgwI5r73U0HnA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const userInput = document.getElementById("userInput"),
          btn = document.getElementById("btn"),
          chat = document.getElementById("chat");

    const generateApiRes = async () => {
        const userText = userInput.value;
        
      

        // Add loading indicator to chat
        const loadingMessage = document.createElement("p");
        loadingMessage.textContent = "Loading...";
        loadingMessage.style.float = 'left';
        loadingMessage.style.marginBottom = '10px';
        loadingMessage.style.fontSize = '13px';
        loadingMessage.style.backgroundColor = 'white';
        loadingMessage.style.padding = '10px';
        loadingMessage.style.borderRadius = '10px';
        chat.appendChild(loadingMessage);

        const requestBody = {
            system_instruction: {
                parts: {
                    text:"Kamu adalah chatbot yang menjawab pertanyaan seputar foto studio 'unlock studio'. Pertanyaan pertanyaan yang ditanyakan akan seperti servis/layanan fotonya ada apa saja({{implode(',', $arr_nama_layanan)}}), berikut alamat unlock studio: 'Perum Bumi Palapa, Jl. Saxophone No.blok E27, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur'. Berikan jawaban yang singkat saja."
                }
            },
            contents: [
                {
                    parts: [
                        {
                            text: userInput.value
                        }
                    ]
                }
            ]
        };

        try {
            const response = await fetch("{{Route("chatbot-api")}}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    userInput: userInput.value
                })
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            chat.removeChild(loadingMessage);  // Remove loading indicator if request is successful
            const data = await response.json();
            let botResponse = data.data.text || "I'm sorry, I couldn't understand that.";
            chat.innerHTML += `<span style="float:left;margin-bottom:10px;font-size:13px;background-color:white;padding:10px;border-radius:10px">${markdown.toHTML("Bot: " + botResponse)}</span>`;
        } catch (error) {
            chat.removeChild(loadingMessage);  // Remove loading indicator if error occurs
            console.error('Error:', error);
            chat.innerHTML += `<p style="color: red;">Error: ${error.message}</p>`;
        }
    };

    btn.addEventListener("click", () => {
        const userText = userInput.value.trim();
        if (userText) {
            chat.innerHTML += `<p style="float:right;margin-bottom:10px;font-size:13px;background-color:white;padding:10px;border-radius:10px">You: ${userText}</p>`;
            generateApiRes();
            userInput.value = '';  // Clear the input field
        }
    });

    // Optionally, allow "Enter" key to submit
    userInput.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            btn.click();
        }
    });
</script>
