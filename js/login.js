$("#login-form").submit(function(e) {
    e.preventDefault(); 
    var form = $(this);
    
    $.ajax({
        type: "POST",
        url: "http://localhost/profiletask/php/login.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
         let result = JSON.parse(data);
         if(result.error){
             alert(result.error); 
         } else if(result.success) {
            localStorage.setItem("user",JSON. stringify(result.success));
            window.location.href  = 'profile.html';
         }
        }
    });
});