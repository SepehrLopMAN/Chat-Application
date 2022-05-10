const form = document.querySelector(".form-container__form--sign-up");
submitBtn = form.querySelector(".form__form-input--submit");
var usernameTimer;
var emailTimer;
form.querySelector('[name = "username"]').onkeyup = () => {
  // username input event listener for checking if username already exists
  usernameInp = form.querySelector('[name = "username"]');
  usernameStatus = form.querySelector(".form-input__inp--username-status");
  usernameStatus.innerHTML = "Checking..";
  usernameStatus.style.color = usernameInp.style.borderBottomColor = "gray";
  let XmlHttpReq = new XMLHttpRequest();
  XmlHttpReq.open("POST", "../incs/handlers/username-err.handler.php", true);
  XmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  if (usernameTimer != undefined) clearTimeout(usernameTimer);
  usernameTimer = setTimeout(() => {
    XmlHttpReq.onload = () => {
      if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
        if (XmlHttpReq.status === 200) {
          let data = XmlHttpReq.response;
          if (data) {
            usernameStatus.innerHTML = data;
            usernameStatus.style.color = usernameInp.style.borderBottomColor =
              "#f44336";
          } else {
            usernameStatus.innerHTML =
              form.querySelector('[name="username"]').value + " is valid!";
            usernameStatus.style.color = usernameInp.style.borderBottomColor =
              "#034aff";
          }
        }
      }
    };
    let formData = new FormData(form);
    XmlHttpReq.send(formData);
  }, 1000);
};

form.onsubmit = (event) => {
  event.preventDefault();
};

submitBtn.onclick = () => {
  // Starting Ajax & Creating XML Object
  let XmlHttpReq = new XMLHttpRequest();
  XmlHttpReq.open("POST", "../incs/handlers/signup.handler.php", true);
  XmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  XmlHttpReq.onload = () => {
    if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
      if (XmlHttpReq.status === 200) {
        let data = XmlHttpReq.response;
        if (data) {
          form.querySelector(".form__paragraph--error-details").innerHTML =
            data;
        } else {
          const blockElem = document.createElement("p");
          blockElem.appendChild(
            document.createTextNode("Your registration was successful!")
          );
          form.style.display = "none";
          document.querySelector(".form-container").append(blockElem);
          blockElem.classList.add("form-container__paragraph--success");
        }
      }
    }
  };
  let formData = new FormData(form);
  XmlHttpReq.send(formData);
};
