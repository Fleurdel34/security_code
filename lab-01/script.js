document.getElementById("loginForm").addEventListener("submit", function (event){
    event.preventDefault();

    const disableUsername =["yopmail.com", "jose.fr"]

    //1.recuperation des données
    const username=document.getElementById("username").value;
    const password=document.getElementById("password").value;

    //2.Vérification que le mail est correct

    const errorElement= document.getElementById("error")
    const  emailRegex =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailRegex.test(username)){
        errorElement.textContent= "Veuillez entrer un mail valide";
        return;
    }else{
        if(disableUsername.includes(username.split('@')[1])) {
            errorElement.textContent= "Domaine email non autorisé";
            return;
        }
    }

    /*
    *Cette regex exige un mot de passe avec:
    * -Au moins 10 caractères
    * -Au moins une lettre minuscule
    * -Au moins une lettre majuscule
    * -Au moins un chiffre
    * -Au moins un caractère spécial (@$!%*?&)
     */

    const  passwordRegex =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/;

    //Vérification que l'entrée utilisateur respecte la politique de sécurité de l'entreprise

    if(!passwordRegex.test(password)){
        errorElement.textContent="Le mot de passe doit contenir au moins 8 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial."
        return;
    }

    //3.afficher un message de création de compte
    document.getElementById("connect").innerHTML="Vous êtes connecté";

})