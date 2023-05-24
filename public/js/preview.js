$(document).ready(function() {
    $("#image-input").change(function() {
      var reader = new FileReader();
      reader.onload = function() {
        $("#image-preview").attr("src", reader.result);
      }
      reader.readAsDataURL(this.files[0]);
    });
  });

  