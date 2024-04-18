document.addEventListener('DOMContentLoaded', function() {
    const handleQuestionAction = (id, action, likesContent) => {
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
                likesContent.textContent = data.likes;
            });
    };

    document.querySelectorAll('.like_question, .dislike_question').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('id');
            const action = this.classList.contains('like_question') ? 'like' : 'dislike';
            const questionLikesContent = document.querySelector('.question_likes_content');
            handleQuestionAction(id, action, questionLikesContent);
        });
    });

    document.querySelectorAll('.like_answer, .dislike_answer').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('id');
            const action = this.classList.contains('like_answer') ? 'like' : 'dislike';
            const answerLikesContent = document.querySelector(`[data-answer-id="${id}"].answer_likes_content`);
            handleAnswerAction(id, action, answerLikesContent);
        });
    });

    const handleAnswerAction = (id, action, answerLikesContent) => {
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
                console.log(data.likes);
                if (answerLikesContent) {
                    answerLikesContent.textContent = data.likes;
                }
            });
    };
});
