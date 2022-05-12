const form = document.querySelector(".form-container__form--login");
submitBtn = form.querySelector(".form__form-input--submit");

form.onsubmit = (event) => {
  event.preventDefault();
};

submitBtn.onclick = () => {
  // Starting Ajax & Creating XML Object
  let XmlHttpReq = new XMLHttpRequest();
  XmlHttpReq.open("POST", "./incs/handlers/login.handler.php", true);
  XmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  XmlHttpReq.onload = () => {
    if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
      if (XmlHttpReq.status === 200) {
        let data = XmlHttpReq.response;
        if (data) {
          form.querySelector(".form__paragraph--error-details").innerHTML =
            data;
        } else {
          window.location.href = "users.php";
        }
      }
    }
  };
  let formData = new FormData(form);
  XmlHttpReq.send(formData);
};
