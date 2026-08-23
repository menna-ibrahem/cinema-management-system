<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AI Chatbot - Cinema</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #111827;
            color: white;
            min-height: 100vh;
        }

        .navbar {
            height: 70px;
            padding: 0 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #111827;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .home-btn {
            text-decoration: none;
            color: white;
            border: 1px solid #4b5563;
            padding: 9px 16px;
            border-radius: 7px;
            font-size: 14px;
        }

        .chat-container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
            background: #1f2937;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .chat-header {
            padding: 20px;
            background: #374151;
            text-align: center;
        }

        .chat-header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .chat-header p {
            color: #9ca3af;
            font-size: 14px;
        }

        .messages {
            height: 450px;
            overflow-y: auto;
            padding: 25px;
        }

        .message {
            max-width: 75%;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 15px;
            line-height: 1.5;
            font-size: 14px;
        }

        .user-message {
            background: #7f1d2d;
            margin-left: auto;
        }

        .bot-message {
            background: #374151;
            color: #e5e7eb;
        }

        .chat-form {
            display: flex;
            gap: 10px;
            padding: 20px;
            border-top: 1px solid #374151;
        }

        .message-input {
            flex: 1;
            padding: 13px 15px;
            border: 1px solid #4b5563;
            border-radius: 8px;
            background: #111827;
            color: white;
            outline: none;
            font-size: 14px;
        }

        .message-input:focus {
            border-color: #9ca3af;
        }

        .send-btn {
            padding: 13px 22px;
            border: none;
            border-radius: 8px;
            background: white;
            color: #111827;
            font-weight: bold;
            cursor: pointer;
        }

        .send-btn:hover {
            background: #e5e7eb;
        }

        .send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .typing {
            color: #9ca3af;
            font-size: 13px;
            margin-bottom: 15px;
            display: none;
        }

        @media (max-width: 600px) {
            .chat-container {
                width: 95%;
                margin: 20px auto;
            }

            .messages {
                height: 400px;
            }

            .message {
                max-width: 90%;
            }

            .chat-form {
                flex-direction: column;
            }

            .send-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            🎬 Cinema AI
        </div>

        <a href="{{ url('/') }}" class="home-btn">
            Home
        </a>

    </nav>


    <div class="chat-container">

        <div class="chat-header">

            <h1>🤖 Cinema AI Assistant</h1>

            <p>Ask me anything about movies</p>

        </div>


        <div class="messages" id="messages">

            <div class="message bot-message">
                Hello! 👋 How can I help you find a movie today?
            </div>

        </div>


        <div class="typing" id="typing">
            AI is typing...
        </div>


        <form class="chat-form" id="chatForm">

            @csrf

            <input
                type="text"
                id="messageInput"
                class="message-input"
                placeholder="Ask me about movies..."
                autocomplete="off"
                required
            >

            <button
                type="submit"
                class="send-btn"
                id="sendBtn"
            >
                Send
            </button>

        </form>

    </div>


<script>

const chatForm = document.getElementById('chatForm');
const messageInput = document.getElementById('messageInput');
const messages = document.getElementById('messages');
const sendBtn = document.getElementById('sendBtn');
const typing = document.getElementById('typing');

let chatHistory = [];

chatForm.addEventListener('submit', async function(event) {

    event.preventDefault();

    const message = messageInput.value.trim();

    if (!message) {
        return;
    }


    // Show user's message

    const userMessage = document.createElement('div');

    userMessage.classList.add('message', 'user-message');

    userMessage.textContent = message;

    messages.appendChild(userMessage);


    messageInput.value = '';

    messages.scrollTop = messages.scrollHeight;

    sendBtn.disabled = true;

    typing.style.display = 'block';


    try {

    const response = await fetch("{{ route('chatbot.chat') }}", {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },

        body: JSON.stringify({
    message: message,
    messages: chatHistory
})

    });

    const data = await response.json();

    console.log('STATUS:', response.status);
    console.log('RESPONSE:', data);

    if (!response.ok) {

        throw new Error(
            data.message || `Server error: ${response.status}`
        );

    }

    chatHistory.push({
        role: 'user',
        content: message
    });

    chatHistory.push({
        role: 'assistant',
        content: data.reply
    });

    const botMessage = document.createElement('div');

    botMessage.classList.add('message', 'bot-message');

    botMessage.textContent = data.reply;

    messages.appendChild(botMessage);


} catch (error) {

    console.error('CHATBOT ERROR:', error);

    const errorMessage = document.createElement('div');

    errorMessage.classList.add('message', 'bot-message');

    errorMessage.textContent =
        'ERROR: ' + error.message;

    messages.appendChild(errorMessage);

}

    typing.style.display = 'none';

    sendBtn.disabled = false;

    messageInput.focus();

    messages.scrollTop = messages.scrollHeight;

});

</script>

</body>
</html>
