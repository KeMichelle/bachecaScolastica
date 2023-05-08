const editbtns = document.querySelectorAll(".editbtn");
const deletebtns = document.querySelectorAll(".deletebtn");

function edita() {
  window.location.href = "edita.php";
}

function elimina() {
  window.location.href = "elimina.php";
}

editbtns.forEach(function (editbtn) {
  editbtn.addEventListener("click", edita);
});

deletebtns.forEach(function (deletebtn) {
  deletebtn.addEventListener("click", elimina);
});
