function login(){
    let username = $('#username').val();
    let pass = $('#password').val();

    if(username !== '' && pass != ''){
        AsynCall('routes/UserRoute.php', {action: 'login', username: username, pass: pass})
            .then(doneCallBack, failCallBack);
        
        function doneCallBack(response){
            debugger;
            let data = JSON.parse(response);
            if(data.state){
                window.location = data.redirect;
            }else{
                ShowToastr('warning', data.message, 'Login', 6);
            }
        }

        function failCallBack(error){
            ShowToastr('error', 'error', 'Login', 6);
        }
        
    }else{
        ShowToastr('error', 'Campos vacíos.', 'Login', 6);
    }
}

function logOut(){
    let response = confirm('Seguro que quiere cerrar sesión?');
    if(response){
        AsynCall('routes/UserRoute.php', {action: 'logOut'})
            .then(
                function (response){
                    debugger;
                    let data = JSON.parse(response);
                    if(data.state){
                        window.location = data.redirect;
                    }
                },
                function () {
                    console.log('no pudo cerrarse sesión.');
                }
            );
    }
}