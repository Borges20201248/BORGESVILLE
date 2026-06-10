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
function switchTab(tab) {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const tabs = document.querySelectorAll('.tab-btn');

    if (tab === 'login') {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
        tabs[0].classList.add('active');
        tabs[1].classList.remove('active');
    } else {
        registerForm.classList.add('active');
        loginForm.classList.remove('active');
        tabs[1].classList.add('active');
        tabs[0].classList.remove('active');
    }
}