
   // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
 'use strict'

 // Fetch all the forms we want to apply custom Bootstrap validation styles to
 var forms = document.querySelectorAll('.needs-validation')

 // Loop over them and prevent submission
 Array.prototype.slice.call(forms)
   .forEach(function (form) {
     form.addEventListener('submit', function (event) {
       if (!form.checkValidity()) {
         event.preventDefault()
         event.stopPropagation()
       }

       form.classList.add('was-validated')
     }, false)
   })
})();

// select test javascript
(function () {
  $('select').each(function () {
    $(this).select2({
      theme: 'bootstrap4',
      width: 'style',
      placeholder: $(this).attr('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
  });
});

// date formating
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
  dd = '0' + dd;
}
if (mm < 10) {
  mm = '0' + mm;
} 
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("date").setAttribute("min", today);