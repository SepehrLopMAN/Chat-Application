const form = document.querySelector(".chat-message-form");
const msgInput = form.querySelector('[name="message"]');
const sendBtn = form.querySelector(".send-btn");

(function () {
  function XMLreq() {
    let XmlHttpReq = new XMLHttpRequest();
    XmlHttpReq.open("POST", "./incs/handlers/get-chat.handler.php", true);
    XmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    XmlHttpReq.onload = () => {
      if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
        if (XmlHttpReq.status === 200) {
          let data = XmlHttpReq.response;
          if (data) {
            document.querySelector(".chat-box").innerHTML = data;
          }
        }
      }
    };
    let formData = new FormData(form);
    formData.append("user_id", window.location.href.split("?user_id=")[1]);
    XmlHttpReq.send(formData);

    if (!$(".chat-box").parent().hasClass("active")) {
      chatScroller();
    }
  }

  XMLreq();
  setTimeout(chatScroller, 200);
  // setInterval(XMLreq, 600);
})();

form.onsubmit = (event) => {
  event.preventDefault();
};
$(".chat-box").mouseenter(() => {
  $(".chat-box").parent().addClass("active");
});

$(".chat-box").mouseleave(() => {
  $(".chat-box").parent().removeClass("active");
});

sendBtn.onclick = (event) => {
  let XmlHttpReq = new XMLHttpRequest();
  XmlHttpReq.open("POST", "./incs/handlers/chat-insert.handler.php", true);
  XmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  XmlHttpReq.onload = () => {
    if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
      if (XmlHttpReq.status === 200) {
        msgInput.value = "";
        let data = XmlHttpReq.response;
        if (data) {
          console.log(data); //ERROR
        }
      }
    }
  };
  let formData = new FormData(form);
  formData.append("user_id", window.location.href.split("?user_id=")[1]);
  XmlHttpReq.send(formData);
  chatScroller();
};

function chatScroller() {
  $("html").animate(
    { scrollTop: document.querySelector(".chat-box").offsetHeight },
    400
  );
}
msgInput.onfocus = msgInput.onclick = chatScroller;
