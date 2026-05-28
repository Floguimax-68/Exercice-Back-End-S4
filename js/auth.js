function basculerFormulaire(type) {
    const formulaireConnexion = document.getElementById('formulaire-connexion');
    const formulaireInscription = document.getElementById('formulaire-inscription');

    const afficherConnexion = type === 'connexion';

    formulaireConnexion.classList.toggle('formulaire-authentification--visible', afficherConnexion);
    formulaireConnexion.classList.toggle('formulaire-authentification--masque', !afficherConnexion);
    formulaireInscription.classList.toggle('formulaire-authentification--visible', !afficherConnexion);
    formulaireInscription.classList.toggle('formulaire-authentification--masque', afficherConnexion);
}

document.addEventListener('DOMContentLoaded', function () {
    const btnConn = document.getElementById('bouton-connexion');
    const btnInscr = document.getElementById('bouton-inscription');

    if (btnConn) {
        btnConn.addEventListener('click', function () {
            basculerFormulaire('connexion');
        });
    }

    if (btnInscr) {
        btnInscr.addEventListener('click', function () {
            basculerFormulaire('inscription');
        });
    }

    // Support optional URL param ?action=inscription or connexion
    try {
        const params = new URLSearchParams(window.location.search);
        const action = params.get('action');
        if (action === 'inscription' || action === 'connexion') {
            basculerFormulaire(action);
        }
    } catch (e) {
        // ignore
    }
});
