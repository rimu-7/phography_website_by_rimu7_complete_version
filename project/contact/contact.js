// comments.js - JavaScript for retrieving and displaying comments

// Fetch comments from the server (AJAX request)
fetch('/api/comments')
    .then(response => response.json())
    .then(comments => {
        // Render comments on the page
        const commentsContainer = document.getElementById('comments-container');
        comments.forEach(comment => {
            const commentElement = document.createElement('div');
            commentElement.className = 'comment';
            commentElement.textContent = comment.text;
            commentsContainer.appendChild(commentElement);
        });
    })
    .catch(error => console.error('Error fetching comments:', error));
