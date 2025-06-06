const btnchat = document.getElementById('btn-chat');
const chatSide = document.getElementById('chat-side');
const closeChat = document.querySelector('.close-chat');
const chatcontent = document.querySelector('.chat-content');
var chatstate = false;

btnchat.addEventListener('click', () => {
  chatSide.style.width = '300px';
  chatstate = true;
  chatcontent.style.display = 'block';
});

closeChat.addEventListener('click', () => {
  chatSide.style.width = '0px';
  chatstate = false;
  chatcontent.style.display = 'none';
});
