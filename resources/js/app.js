require('./bootstrap');

require('alpinejs');

// Pour tout click sur un element tr possedant un data-action on redirige vers le data-action
for (let el of document.querySelectorAll('tr[data-action]')) {
    el.addEventListener('click', () => window.location.href = el.dataset.action)
}

for (let button of document.querySelectorAll('button[data-agent]')) {
    button.addEventListener('click', () => {
        JSON.parse(button.dataset.agent).forEach(el => {
            document.querySelector('input[name="agents[]"][value="' + el + '"]').checked = 'checked'
        })
    })
}

document.querySelector('button#clear').addEventListener('click', () => {
    document.querySelectorAll('input[name="agents[]"]')
        .forEach(el => el.checked = false);
})
