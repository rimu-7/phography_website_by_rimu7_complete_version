const newCommentPopup = document.getElementById('newComment');
        if (newCommentPopup) {
            newCommentPopup.style.display = 'block';
            setTimeout(() => {
                newCommentPopup.style.display = 'none';
            }, 5000); // Hide the pop-up after 5 seconds
        }