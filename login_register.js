document.addEventListener('DOMContentLoaded', function () {
    // Your JavaScript code here
    const loginForm = document.querySelector('.form.login');
    const registerForm = document.querySelector('.form.signup');

    // Switch from Login to Register
    document.querySelector('.signup-link').addEventListener('click', function (e) {
        e.preventDefault();
        loginForm.style.marginLeft = '-50%';
        document.querySelector('.title').textContent = 'Register';
        registerForm.style.marginLeft = '0%';
    });

    // Switch from Register to Login
    document.querySelector('.login-link').addEventListener('click', function (e) {
        e.preventDefault();
        loginForm.style.marginLeft = '0%';
        document.querySelector('.title').textContent = 'Login';
        registerForm.style.marginLeft = '50%';
    });
});
