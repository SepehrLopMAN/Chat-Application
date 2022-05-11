const searchBar = document.querySelector('[name="search"]');
var searchTimer;
var searchInterval = setInterval(() => {
  let XmlHttpReq = new XMLHttpRequest();
  XmlHttpReq.open("GET", "../incs/handlers/available-users.handler.php", true);
  XmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  XmlHttpReq.onload = () => {
    if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
      if (XmlHttpReq.status === 200) {
        let data = XmlHttpReq.response;
        document.querySelector(".users").innerHTML = data;
      }
    }
  };
  XmlHttpReq.send();
}, 700);

searchBar.onkeyup = () => {
  let searchKeyWord = searchBar.value;
  if (searchKeyWord != "") {
    clearInterval(searchInterval);
    if (searchTimer != undefined) {
      clearTimeout(searchTimer);
    }
    searchTimer = setTimeout(() => {
      let XmlHttpReq = new XMLHttpRequest();
      XmlHttpReq.open(
        "POST",
        "../incs/handlers/users-search.handler.php",
        true
      );
      XmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
      XmlHttpReq.onload = () => {
        if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
          if (XmlHttpReq.status === 200) {
            let data = XmlHttpReq.response;

            document.querySelector(".users").innerHTML = data
              ? data
              : "<p style='text-align: center;'>No users found!</p>";
          }
        }
      };
      XmlHttpReq.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      XmlHttpReq.send("searchKeyWord=" + searchKeyWord);
    }, 600);
  } else {
    searchInterval = setInterval(() => {
      let XmlHttpReq = new XMLHttpRequest();
      XmlHttpReq.open(
        "GET",
        "../incs/handlers/available-users.handler.php",
        true
      );
      XmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
      XmlHttpReq.onload = () => {
        if (XmlHttpReq.readyState === XMLHttpRequest.DONE) {
          if (XmlHttpReq.status === 200) {
            let data = XmlHttpReq.response;
            document.querySelector(".users").innerHTML = data;
          }
        }
      };
      XmlHttpReq.send();
    }, 700);
  }
};
