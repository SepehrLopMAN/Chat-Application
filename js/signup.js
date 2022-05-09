const form = document.querySelector(".form-container__form--sign-up");
submitBtn = form.querySelector(".form__form-input--submit");

form.onsubmit = (event) => {
  event.preventDefault();
};

submitBtn.onclick = () => {
  // Starting Ajax & Creating XML Object
  let XmlHttpReq = new XMLHttpRequest();
  XmlHttpReq.open("POST", "../incs/handlers/signup.handler.php", true);
  XmlHttpReq.onload = () => {
    if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
      if (XmlHttpReq.status === 200) {
        let data = XmlHttpReq.response;
        console.log(data);
      }
    }
  };
  XmlHttpReq.send();
};
