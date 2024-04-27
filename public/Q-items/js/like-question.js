const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const likeBtns = document.querySelectorAll('.like-btn');
const likesNmb = document.querySelectorAll('.likes-nmb');

for(const likeBtn of likeBtns) {
    likeBtn.addEventListener('click', function() {
        const questionId = this.getAttribute('questionId');
        fetch('/like-question/' + questionId, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                areBlogsLiked(questionsIDs);
                // console.log(this)
                // console.log(data)
                if(data.liked) {
                    this.classList.add('text-red-500');
                }else {
                    this.classList.remove('text-red-500');
                }
            })
    })
}

const questionsIDs = [];
likeBtns.forEach(likeBtn => {
    questionsIDs.push(likeBtn.getAttribute('questionId'));
})


areBlogsLiked(questionsIDs);
function areBlogsLiked(questionsIDs) {
    fetch('/are-questions-liked', {
        method: 'POST',
        body: JSON.stringify({ questions: [...questionsIDs] }),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(data => {
            for(let i = 0; i < data.length; i++) {
                if(data[i].liked) {
                    console.log(likeBtns[i]);
                    console.log(data[i].liked);
                    likeBtns[i].classList.add('text-blue-600');
                    likeBtns[i].classList.remove('text-gray-300');
                } else {
                    likeBtns[i].classList.remove('text-blue-600');
                    likeBtns[i].classList.add('text-gray-300');
                }
                likesNmb[i].textContent = data[i].likes;
            }
        });
}
