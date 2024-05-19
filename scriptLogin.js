
let formLogin = document.getElementById("btnLogin");
formLogin.addEventListener("click", function(e){
    let name = document.getElementById("usuario").value;
    let pass = document.getElementById("senha").value;


    if (name != '' && pass != ''){
        var formData = new FormData();
        formData.append("metodo", "select");
        formData.append("usuario", name);
        formData.append("password", pass);
        formData.append("where", " usuario = " +  name + " AND password = " + pass);
     
        fetch('classes/processaLogin.php', {
            method: "POST",
            body: formData
        })
        .then(response => response.json()) 
        .then(data => {
            if (data['result'] == true){
                   window.location.href = "http://blog.naturezaemcasa.com/conteudos.php";
                };
                
                
            
            });
    }

})