document.addEventListener('DOMContentLoaded', () => {
    // переход по ссылкам в sort-task-select
    let sortTaskSelect = document.querySelector('[data-js="sort-task-select"]');
    sortTaskSelect.addEventListener('change', (event) => {
        window.location.href = event.target.value;
    });
    
    // проверка полей в попап-форме
    let formValidate = document.querySelectorAll('[data-js="form-validate"]');
    
    function removeError(form) {
        let errors = form.querySelectorAll('.error');
        
        for (var i = 0; i < errors.length; i++) {
            errors[i].remove();
        }
    }
    
    formValidate.forEach(form => {
        form.addEventListener('submit', function (e) {
            
            let name   = form.querySelector('input[data-validate="name"]'),
                email  = form.querySelector('input[data-validate="email"]'),
                desc   = form.querySelector('textarea[data-validate="description"]'),
                fields = [name, email, desc];
            
            removeError(form);
            
            for (var i = 0; i < fields.length; i++) {
                let fieldVal = fields[i].value.trim();
                if ( ! fieldVal) {
                    e.preventDefault();
                    let error         = document.createElement('div');
                    error.className   = 'error text-danger';
                    error.innerHTML   = '*Заполните поле ' + '"' + fields[i].previousElementSibling.textContent + '"';
                    fields[i].parentElement.insertBefore(error, fields[i].nextSibling);
                }
            }
        });
    });
});