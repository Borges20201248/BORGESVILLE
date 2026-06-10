function switchTab(type) {
    var formLogin = document.getElementById('form-login');
    var formRegister = document.getElementById('form-register');
    
    var btnLogin = document.getElementById('tab-login');
    var btnRegister = document.getElementById('tab-register');

    if (type === 'login') {
        formLogin.classList.add('active');
        formRegister.classList.remove('active');
        
        btnLogin.classList.add('active');
        btnRegister.classList.remove('active');
    } else {
        formRegister.classList.add('active');
        formLogin.classList.remove('active');
        
        btnRegister.classList.add('active');
        btnLogin.classList.remove('active');
    }
}
