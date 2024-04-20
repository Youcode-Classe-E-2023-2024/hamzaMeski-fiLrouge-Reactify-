const likeQstBtn = document.getElementById('like_question');
const qstLikesNmb = document.getElementById('question_likes_nmb');
const saveQstBtn = document.getElementById('save_question');
const QstId = likeQstBtn.getAttribute('questionId');


like_question();
save_question();

function like_question() {
    likeQstBtn.addEventListener('click', function() {
        fetch(`/like-question/${QstId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                qstLikesNmb.textContent = data.likes;
            })
    })
}

function save_question() {
    saveQstBtn.addEventListener('click', function() {
        fetch(`/save-question/${QstId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'saved') {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Question saved successfully",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }else {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Question has been unsaved",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
    })
}
