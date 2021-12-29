function showLogoutBtn(){
    document.getElementById('LogoutBtn').classList.toggle('showLogout');
}

window.onclick = function(event) {
    let LogoutBtn = document.getElementById('LogoutBtn');
    if (event.target != document.getElementById('Logout')) {
        LogoutBtn.classList.remove('showLogout');
    }
}