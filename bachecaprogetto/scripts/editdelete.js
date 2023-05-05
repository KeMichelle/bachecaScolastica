const editbtn = document.getElementById("editbtn");
const deletebtn = document.getElementById("deletebtn");

function edita() {
  window.location.href = "edita.php";
}

function elimina() {
  window.location.href = "elimina.php";
}

loginbtn.addEventListener("click", edita);
loginbtn.addEventListener("click", elimina);
