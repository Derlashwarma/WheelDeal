addEventListener('DOMContentLoaded',function(){
    
    var register_btn = document.getElementById("submit_registration");

    register_btn.addEventListener('click',function(event){
        var password2 = document.getElementById("regis_pass").value;
        var password = document.getElementById("regis_pass_conf").value;

        if(password !== password2){
            document.getElementById("error_message").textContent = "Pasword does not match";
            event.preventDefault();
        }
    })

});
