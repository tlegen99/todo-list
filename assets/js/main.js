document.addEventListener('DOMContentLoaded', () => {
    
    let sortTaskSelect = document.querySelector('[data-js="sort-task-select"]');

    sortTaskSelect.addEventListener('change', (event) => {
        window.location.href = event.target.value;
    })
});