document.addEventListener('DOMContentLoaded', function() {
    /* like question logic */
    const handleQuestionAction = (id, action) => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(`/${action}-question/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                question_likes_content.textContent = data.likes;
            });
    };

    const question_likes_content = document.querySelector('.question_likes_content');

    document.querySelectorAll('.like_question, .dislike_question').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('id');
            const action = this.classList.contains('like_question') ? 'like' : 'dislike';
            handleQuestionAction(id, action);
        });
    });


    /* like answer logic */
    const handleAnswerAction = (id, action) => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(`/${action}-answer/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                // Find the closest '.answer_likes_content' element relative to the clicked button
                const answerLikesContent = document.getElementById(id).closest('.grid').querySelector('.answer_likes_content');
                if (answerLikesContent) {
                    answerLikesContent.textContent = data.likes;
                }
            });
    };

    document.querySelectorAll('.like_answer, .dislike_answer').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('id');
            const action = this.classList.contains('like_answer') ? 'like' : 'dislike';
            handleAnswerAction(id, action);
        });
    });

});
