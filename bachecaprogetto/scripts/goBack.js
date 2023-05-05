const gobackbtn = document.getElementById("gobackbtn");

function goBack() {
  window.location.href = "profile.php";
}

gobackbtn.addEventListener("click", goBack);
