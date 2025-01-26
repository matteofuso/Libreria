document.body.querySelectorAll('form .form-select-insert').forEach((select) => {
    select.addEventListener('change', (e) => {
        const insertTarget = document.getElementById(e.target.getAttribute("data-insert-target"));
        if (e.target.value == -1) {
            insertTarget.parentElement.classList.remove('d-none');
            insertTarget.parentElement.classList.add('d-block');
            insertTarget.required = true;
        } else {
            insertTarget.parentElement.classList.remove('d-block');
            insertTarget.parentElement.classList.add('d-none');
            insertTarget.required = false;
        }
    })
})