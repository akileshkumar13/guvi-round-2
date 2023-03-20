
(function(e) {

    $("#logout").click(function(e) {
        localStorage.clear();
        window.location.href  = 'index.html';
    });
    var form = $(this);
 
    if (localStorage.getItem("user") === null) {
        window.location.href  = 'login.html';
    }
    let user = JSON.parse(localStorage.getItem("user"));
 
    
    $("#inputFirst").val(user["firstname"]);
    $("#inputLast").val(user["lastname"])
    $("#inputEmail").val(user["emailid"])
    
    
    
})();

$("#profile-form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
   
    $.ajax({
        type: "POST",
        url: "http://localhost/profiletask/php/profile.php",
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