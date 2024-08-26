function onSignIn(googleUser) {
    var perfil = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;

    console.log('ID: ' + perfil.getId());
    console.log('Nombre: ' + perfil.getName());
    console.log('Imagen URL: ' + perfil.getImageUrl());
    console.log('Email: ' + perfil.getEmail());

    // Aquí puedes enviar el token al servidor para verificar e iniciar sesión
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'verificar_google.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        console.log('Sesión iniciada como: ' + xhr.responseText);
    };
    xhr.send('idtoken=' + id_token);
}
