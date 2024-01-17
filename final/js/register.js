document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#insert-form');
    const errorMessage = document.querySelector('#error-message');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        const url = 'app/register.php';

        if (form.checkValidity()) {
            fetch(url, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
         window.location.href = 'task.html';
                } else {
                    // display error message to the user
                    errorMessage.innerHTML = data.message;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.innerHTML = 'An error occurred during registration.';
            });
        } else {
            // If the form is not valid, display an error message
            errorMessage.innerHTML = 'Please fill out all required fields correctly.';
        }
    });
});
