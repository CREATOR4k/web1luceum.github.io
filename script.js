 /*var backgrounds = [
    "url('img/image1.jpg')",
    "url('img/image2.jpg')",
    "url('img/image3.jpg')"
  ];
 window.onload = function() {
    var randomIndex = Math.floor(Math.random() * backgrounds.length);
    document.body.style.backgroundImage = backgrounds[randomIndex];
  };*/

function showForm(formId) {
  document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
  document.getElementById(formId).classList.add("active");
}