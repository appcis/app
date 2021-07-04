require('./bootstrap');

require('alpinejs');

// Pour tout click sur un element tr possedant un data-action on redirige vers le data-action
for (let el of document.querySelectorAll('tr[data-action]')) {
    el.addEventListener('click', () => window.location.href= el.dataset.action)
}

