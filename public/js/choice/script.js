document.addEventListener('DOMContentLoaded', function() {
    const selectBtn = document.querySelector('.select-btn');
    const listItems = document.querySelector('.list-items');
    const returnLink = document.querySelector('.return-link');

    selectBtn.addEventListener('click', function() {
        listItems.classList.toggle('active');
        if (returnLink.style.display === 'none') {
            returnLink.style.display = 'block';
        } else {
            returnLink.style.display = 'none';
        }
    });

    listItems.addEventListener('click', function(event) {
        if (event.target.tagName === 'LABEL') {
            listItems.classList.remove('active');
            selectBtn.querySelector('.btn-text').textContent = event.target.textContent;
            if (event.target.textContent === 'Utilisateur') {
                document.getElementById('roleForm').action = '/login';
            } else if (event.target.textContent === 'Administrateur') {
                document.getElementById('roleForm').action = '/admin/login';
            }
            document.getElementById('roleForm').submit();
        }
    });
});
