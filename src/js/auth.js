document.addEventListener('DOMContentLoaded', function(){
    var root = document.getElementById('auth');
    if(!root) return;
    var loginFields = document.getElementById('login-fields');
    var signupFields = document.getElementById('signup-fields');
    console.log('auth.js loaded — auth root:', !!root);

    function showSignup(e){
        if(e) e.preventDefault();
        root.classList.add('is-signup');
        console.log('showSignup: added is-signup class');
        // cross-fade fields
        if(loginFields) { loginFields.classList.remove('visible'); loginFields.classList.add('hidden'); }
        if(signupFields) { signupFields.classList.remove('hidden'); signupFields.classList.add('visible'); }
        setTimeout(function(){
            var f = signupFields && signupFields.querySelector('input'); if(f) f.focus();
        }, 560);
    }
    function showLogin(e){
        if(e) e.preventDefault();
        root.classList.remove('is-signup');
        console.log('showLogin: removed is-signup class');
        if(signupFields) { signupFields.classList.remove('visible'); signupFields.classList.add('hidden'); }
        if(loginFields) { loginFields.classList.remove('hidden'); loginFields.classList.add('visible'); }
        setTimeout(function(){
            var f = loginFields && loginFields.querySelector('input'); if(f) f.focus();
        }, 560);
    }

    // Prefer direct listeners if elements exist
    var togglesSignup = document.querySelectorAll('.toggle-signup');
    if(togglesSignup.length) togglesSignup.forEach(function(el){ el.addEventListener('click', showSignup); });
    var togglesLogin = document.querySelectorAll('.toggle-login');
    if(togglesLogin.length) togglesLogin.forEach(function(el){ el.addEventListener('click', showLogin); });

    // Fallback: delegate clicks from body (robust if links are injected later)
    document.body.addEventListener('click', function(ev){
        var s = ev.target.closest && ev.target.closest('.toggle-signup');
        var l = ev.target.closest && ev.target.closest('.toggle-login');
        if(s){ ev.preventDefault(); showSignup(ev); }
        if(l){ ev.preventDefault(); showLogin(ev); }
    });

    // Optional: allow pressing Escape to return to login
    document.addEventListener('keydown', function(ev){ if(ev.key === 'Escape') showLogin(ev); });
    
    // Also attach to any global buttons that may exist in the PHP view
    var btnIns = document.getElementById('bouton-inscription');
    var btnConn = document.getElementById('bouton-connexion');
    if(btnIns) btnIns.addEventListener('click', showSignup);
    if(btnConn) btnConn.addEventListener('click', showLogin);

        // expose as global fallback in case inline handlers are used
        window.showSignup = showSignup;
        window.showLogin = showLogin;

    // If URL contains ?action=inscription or connexion, open the corresponding panel
    try {
        var params = new URLSearchParams(window.location.search);
        var action = params.get('action');
        if(action === 'inscription') showSignup();
        else if(action === 'connexion') showLogin();
    } catch (e) { /* ignore */ }
});
