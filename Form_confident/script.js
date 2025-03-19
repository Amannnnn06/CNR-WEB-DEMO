document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const yesRadio = document.querySelector('input[value="yes"]');
    const noRadio = document.querySelector('input[value="no"]');
    const detailsSection = document.getElementById('details-section');
    const detailsTextarea = document.getElementById('details');

    const errorMessage = document.getElementById('error-message');
    const textareaError = document.getElementById('textarea-error');


    yesRadio.addEventListener('change', function() {
        detailsSection.classList.remove('hidden');
        clearErrors();
    });

    noRadio.addEventListener('change', function() {
        detailsSection.classList.add('hidden');
        clearErrors();
    });


    function clearErrors() {
        errorMessage.textContent = '';
        textareaError.textContent = '';
    }
    form.addEventListener('submit', function(e) {
        e.preventDefault(); 

        clearErrors(); 

        const selectedOption = document.querySelector('input[name="confidential"]:checked');

        if (!selectedOption) {
            errorMessage.textContent = "Please select YES or NO.";
            errorMessage.style.color = "red";
            return; 
        }

        if (selectedOption.value === 'yes') {
            if (detailsTextarea.value.trim() === '') {
                textareaError.textContent = "Please provide details in the textarea.";
                textareaError.style.color = "red";
                detailsTextarea.focus();
                return; 
            }
        }
        form.submit();
    });
});
