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
    
    document.getElementById("login").addEventListener('click',function(event){
        var username = document.getElementById("username");
        var password = document.getElementById("password");
        var error_username = document.getElementById("error_username");
        var error_password = document.getElementById("error_password");

        if(username.value === ""){
            error_username.innerHTML = "*Username Must be Filled";
            event.preventDefault();
        }
        if(password.value === ""){
            error_password.innerHTML = "*Password Must be Filled";
            event.preventDefault();
        }
    });

});
