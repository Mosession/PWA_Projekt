document.addEventListener('DOMContentLoaded', function () {
    const currentPath = window.location.pathname.split('/').pop();
    const navLinks = {
        'index.php': 'homeLink',
        'sport.php': 'sportLink',
        'politics.php': 'politicsLink',
        'administration.php': 'adminLink',
        'login.php': 'loginLink',
        'registration.php': 'registerLink',
        'enter_news.php': 'enterNewsLink'
    };

    const linkId = navLinks[currentPath];
    if (linkId) {
        document.getElementById(linkId).classList.add('active');
    }

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'success-message';
        messageDiv.textContent = 'New record created successfully!';
        document.body.prepend(messageDiv);
    }

    fetch('php/fetch_news.php')
        .then(response => response.json())
        .then(newsItems => {
            const newsSection = document.getElementById('news');
            newsSection.innerHTML = '';

            let filteredItems = newsItems;
            if (currentPath === 'sport.php') {
                filteredItems = newsItems.filter(item => item.category === 'sport');
            } else if (currentPath === 'politics.php') {
                filteredItems = newsItems.filter(item => item.category === 'politics');
            }

            filteredItems.forEach(item => {
                const article = document.createElement('article');
                const title = document.createElement('h3');
                title.textContent = item.title;

                const summary = document.createElement('p');
                summary.textContent = item.summary.substring(0, 100) + '...';

                const link = document.createElement('a');
                link.href = `article.php?id=${item.id}`;
                link.textContent = 'Read more';

                article.appendChild(title);
                article.appendChild(summary);
                article.appendChild(link);
                newsSection.appendChild(article);
            });
        });

    document.getElementById('newsForm').onsubmit = function(event) {
        event.preventDefault();
        let valid = true;

        const title = document.getElementById('title').value;
        const titleMessage = document.getElementById('porukaTitle');
        if (title.length < 5 || title.length > 30) {
            titleMessage.textContent = 'Title must be between 5 and 30 characters!';
            document.getElementById('title').style.border = '1px dashed red';
            valid = false;
        } else {
            titleMessage.textContent = '';
            document.getElementById('title').style.border = '1px solid green';
        }

        const about = document.getElementById('about').value;
        const aboutMessage = document.getElementById('porukaAbout');
        if (about.length < 10 || about.length > 100) {
            aboutMessage.textContent = 'Summary must be between 10 and 100 characters!';
            document.getElementById('about').style.border = '1px dashed red';
            valid = false;
        } else {
            aboutMessage.textContent = '';
            document.getElementById('about').style.border = '1px solid green';
        }

        const content = document.getElementById('content').value;
        const contentMessage = document.getElementById('porukaContent');
        if (content.length === 0) {
            contentMessage.textContent = 'Content must be entered!';
            document.getElementById('content').style.border = '1px dashed red';
            valid = false;
        } else {
            contentMessage.textContent = '';
            document.getElementById('content').style.border = '1px solid green';
        }

        const pphoto = document.getElementById('image').value;
        const pphotoMessage = document.getElementById('porukaSlika');
        if (pphoto.length === 0) {
            pphotoMessage.textContent = 'Image must be uploaded!';
            document.getElementById('image').style.border = '1px dashed red';
            valid = false;
        } else {
            pphotoMessage.textContent = '';
            document.getElementById('image').style.border = '1px solid green';
        }

        const category = document.getElementById('category');
        const categoryMessage = document.getElementById('porukaKategorija');
        if (category.selectedIndex === 0) {
            categoryMessage.textContent = 'Category must be selected!';
            document.getElementById('category').style.border = '1px dashed red';
            valid = false;
        } else {
            categoryMessage.textContent = '';
            document.getElementById('category').style.border = '1px solid green';
        }

        if (valid) {
            document.getElementById('newsForm').submit();
        }
    };
});
