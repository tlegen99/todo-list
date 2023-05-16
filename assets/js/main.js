document.addEventListener('DOMContentLoaded', () => {
    
    const content = document.querySelector('[data-js="pagination-content"]');
    
    const ajaxForm = async (formData, url) => {
        
        const response = await fetch(url, {
            method: 'POST',
            body: formData,
        });
        if ( ! response.ok) {
            throw new Error(`Ошибка по адресу ${url}, статус ошибки ${response.status}`);
        }
        return await response.text();
    };
    
    const ajaxPagination = async (url) => {
        let response = await fetch(url);

        if ( ! response.ok) {
            throw new Error(`Ошибка по адресу ${url}, статус ошибки ${response.status}`);
        }
        return await response.text();
    };
    
    // добавление задачи без перезагрузки
    if (document.querySelector('[data-js="ajax-form"]')) {
        const forms = document.querySelectorAll('[data-js="ajax-form"]');
        
        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData    = new FormData(this);
                let url           = form.getAttribute('action'),
                    success       = document.querySelector('[data-js="alert-success"]'),
                    modal         = document.getElementById('taskModal'),
                    modalInstance = bootstrap.Modal.getInstance(modal);
                
                ajaxForm(formData, url)
                    .then((response) => {
                        success.classList.add('show');
                        modalInstance.hide();
                        form.reset();
                        ajaxPagination('http://todolist/todo/page-1').then((response) => {
                            content.innerHTML = response;
                        });
                        setTimeout(() => success.classList.remove('show'), 5000);
                    })
                    .catch((err) => console.error(err));
            });
        });
    }
    
    // пагинация без перезагрузки
    if (document.querySelector('[data-js="pagination"]')) {
        const paginations = document.querySelectorAll('[data-js="pagination"]');
        
        paginations.forEach(pagination => {
                let itemPagination = pagination.querySelectorAll('.page-link');

                itemPagination.forEach(item => {
                    item.addEventListener('click', function (e) {
                        e.preventDefault();
                        let url = window.location.href + this.getAttribute('href');

                        ajaxPagination(url).then((response) => {
                            content.innerHTML = response;
                        });
                    });
                })
            },
        );
    }
});
