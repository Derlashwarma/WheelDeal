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

        if(username.value === ""){
            username.style.borderColor = "red";
            event.preventDefault();
        }
        if(password.value === ""){
            password.style.borderColor = "red";
            event.preventDefault();
        }
        else{
            password.style.borderColor = "green";
            username.style.borderColor = "green";
        }
    });
});

