const bottone = document.getElementById("getStartedbtn");
const loginbtn = document.getElementById("loginbtn");

function registrati() {
  window.location.href = "registrati.php";
}

function login() {
  window.location.href = "failogin.php";
}

bottone.addEventListener("click", registrati);
loginbtn.addEventListener("click", login);
