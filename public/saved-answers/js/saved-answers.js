const answersContent = document.querySelectorAll('.answer');
answersContent.forEach(answerContent => {
    let content = answerContent.innerHTML;

    const codeRegex = /```([^`]+)```/g;

    content = content.replace(codeRegex, (match, group) => {
        const code = group.trim();

        const highlightedCode = code.replace(/\b(int|char|let|var|const|print|printf|console\.log|#|include)\b/g, match => {
            switch(match) {
                case '{':
                case '}':
                    return `<span class="text-red-500">${match}</span>`;
                case ';':
                    return `<span class="text-yellow-500">${match}</span>`;
                case '[':
                case ']':
                    return `<span class="text-green-500">${match}</span>`;
                default:
                    return `<span class="text-yellow-400">${match}</span>`;
            }
        });

        return `<pre class="bg-gray-900 rounded-lg p-4 my-4"><code class="language-c">${highlightedCode}</code></pre>`;
    });

    answerContent.innerHTML = content;
});




const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const likeAnswerBtns = document.querySelectorAll('.like_answer');
const answerLikesNmbs = document.querySelectorAll('.answer_likes_nmb');
const saveAnswerBtns = document.querySelectorAll('.save_answer');

/* like, unlike and save */
likeAnswerBtns.forEach(likeBtn => {
    likeBtn.addEventListener('click', function() {
        const AnswerId = likeBtn.getAttribute('answerId');
        fetch(`/like-answer/${AnswerId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                const index = Array.from(likeAnswerBtns).indexOf(likeBtn);
                answerLikesNmbs[index].textContent = data.likes;
                getLikes();
            });
    });
});

saveAnswerBtns.forEach(saveBtn => {
    saveBtn.addEventListener('click', function() {
        const AnswerId = saveBtn.getAttribute('answerId');
        fetch(`/save-answer/${AnswerId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'saved') {
                    saveBtn.innerHTML = '<ion-icon name="bookmark"></ion-icon>';
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Answer saved successfully",
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else if(data.status === 'unsaved') {
                    saveBtn.innerHTML = '<ion-icon name="bookmark-outline"></ion-icon>';
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Answer has been unsaved",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
    });
});










getLikes();
// fetch likes
function getLikes() {
    let AnswerIDs = [];
    answerLikesNmbs.forEach(answerLikesNmb => {
        AnswerIDs.push(answerLikesNmb.getAttribute('answerId'));
    })


    const formData = new FormData();
    formData.append('AnswerIDs', JSON.stringify(AnswerIDs));
    fetch(`/get-answers-likes`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(data => {
            answerLikesNmbs.forEach((answerLikesNmb, i) => {
                answerLikesNmb.textContent = data[i].savedAnswer[0].answer.likes;
                if(data[i].isLiked){
                    likeAnswerBtns[i].classList.add('dark:text-blue-500');
                }else {
                    likeAnswerBtns[i].classList.remove('dark:text-blue-500');
                }
            })
        })
}
