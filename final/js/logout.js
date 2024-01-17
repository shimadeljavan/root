
document.querySelector('#logout-button').addEventListener('click', function () {
    const confirmed = confirm("Are you sure you want to log out?");
    
    if (confirmed) {
        // Redirect to logout.php
        window.location.href = '../app/logout.php';
    }
});