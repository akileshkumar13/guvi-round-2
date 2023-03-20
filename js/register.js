$("#register-form").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    $.ajax({
        type: "POST",
        url: "http://localhost/profiletask/php/register.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            console.log(data);
         let result = JSON.parse(data);
         console.log(result);
         if(result.error){
             alert(result.error); 
         } else if(result.success) {
            alert(result.success); 
            window.location.href  = 'login.html';
         }
        },
        error: function(data)
        {
            alert(data); 
        }
        
    });
    
});