function pwdToggle(elem) {
  elem.classList.toggle("fa-eye-slash");
  elem.classList.toggle("fa-eye");

  if (elem.parentElement.querySelector("label > input").type === "password") {
    elem.parentElement.querySelector("label > input").type = "text";
  } else {
    elem.parentElement.querySelector("label > input").type = "password";
  }
}
