const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const answersContainer = document.getElementById('answers-container');
const questionId = answersContainer.getAttribute('questionId');
const topTarget = document.getElementById('top-target');



getQuestionAnswers();
function getQuestionAnswers() {
    fetch(`/question-answers/${questionId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(answers => {
            console.log(answers)
            answersContainer.innerHTML = '';
            for(const answer of answers) {
                render_answers_cards(answer);
            }
            //
            highlight_code();

            //
            delete_my_answer();

            //
        })
}


function render_answers_cards(answer) {
    answersContainer.innerHTML += `
          <div class="flex flex-col gap-4 mt-10 hover:scale-[1.01] transition duration-300 ease-in-out rounded-xl p-6 bg-gradient-to-r from-gray-900 to-gray-700 backdrop-filter backdrop-blur-lg">
                <div class="flex gap-4 text-gray-700 text-[13px]">
                    <span>Asked yesterday</span>
                    <span>Modified today</span>
                    <span>3 answers</span>
                </div>
                <div class="w-full grid grid-cols-8 border-1 border-solid border-gray-300">
                    <div class="col-span-1">
                        <ul class="flex flex-col items-center gap-2 text-gray-300">
                            <li>
                                <a id="${answer.id}" class="like_answer cursor-pointer hover:text-gray-200">
                                    <ion-icon name="caret-up-circle-outline" class="text-4xl"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <span class="answer_likes_content text-2xl hover:text-gray-200" data-answer-id="{{ $answer->id }}">${answer.likes}</span>
                            </li>

                            <li>
                                <a id="${answer.id}" class="dislike_answer cursor-pointer hover:text-gray-200">
                                    <ion-icon name="caret-down-circle-outline" class="text-4xl"></ion-icon>
                                </a>
                            </li>

                            <li>
                                <a href="">
                                    <ion-icon name="bookmark" class="text-3xl"></ion-icon>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-7 text-gray-200">
                        <p class="answerContent">
                            ${answer.answer}
                        </p>
                    </div>
                </div>
                <div class="w-full flex items-center justify-between">
                    <div class="col-span-7 flex gap-2 text-gray-700 text-[13px] flex items-center gap-4">
                        <!--  share answer  -->
                        <a href="" class="text-blue-500">
                            <ion-icon name="arrow-redo-outline" class="text-2xl"></ion-icon>
                        </a>
                        <!--  update my answer  -->
                        <a href="" class="text-blue-500">
                            <ion-icon name="create-outline" class="text-2xl"></ion-icon>
                        </a>
                        <!--  delete my answer  -->
                        <a answerId="${answer.id}" class="delete-btn text-red-500 cursor-pointer">
                            <ion-icon name="trash-outline" class="text-2xl"></ion-icon>
                        </a>
                    </div>
                    <div class="col-span-7 flex justify-end">
                        <div class="flex items-center justify-end gap-1">
                            <div class="h-[40px] w-[40px] rounded-lg bg-black" style="background-image: url('http://127.0.0.1:8000/storage/${answer.user.image}'); background-size: cover"></div>
                            <a href="" class="text-blue-500 text-[13px]">${answer.user.name}</a>
                        </div>
                    </div>
                </div>
        </div>
    `;
}


/* answer question */
answer_question();
function answer_question() {
    const answerQuestionForm = document.getElementById('answer-question-form');
    const errorContainer = document.getElementById('error-container');
    const answerTextarea = document.getElementById('answer-textarea');
    answerQuestionForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        fetch(`/answer-question/${questionId}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(response => {
                return response.json();
            })
            .then(data => {
                errorContainer.textContent = '';
                console.log(data)
                if (data.errors) {
                    errorContainer.textContent = data?.errors?.answer[0]
                }else {
                    getQuestionAnswers();
                    answerTextarea.value = '';
                    const offsetTop = topTarget.offsetTop;

                    // Scroll to the section with smooth animation
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            })
    });
}


/* delete my answer */
function delete_my_answer() {
    const deleteAnswerOverlay = document.getElementById('delete-answer-overlay');
    const cancelDelete1 = document.getElementById('cancel-delete-1');
    const cancelDelete2 = document.getElementById('cancel-delete-2');

    console.log(cancelDelete1)
    console.log(cancelDelete2)
    cancelDelete1.addEventListener('click', function() {
        deleteAnswerOverlay.classList.add('hidden')
    })
    cancelDelete2.addEventListener('click', function() {
        deleteAnswerOverlay.classList.add('hidden')
    })

    const deleteBtns = document.querySelectorAll('.delete-btn');
    for(const deleteBtn of deleteBtns) {
        deleteBtn.addEventListener('click', function() {
            const answerId = deleteBtn.getAttribute('answerId');

            deleteAnswerOverlay.classList.remove('hidden');

            const deleteAnswerForm = document.getElementById('delete-answer-form');
            deleteAnswerForm.addEventListener('submit', function(event) {
                event.preventDefault();

                fetch(`/delete-answer/${answerId}`, {
                    method : 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);
                        deleteAnswerOverlay.classList.add('hidden');
                        getQuestionAnswers();
                    })
            })
        })
    }
}

function highlight_code() {
    const answersContent = document.querySelectorAll('.answerContent');
    answersContent.forEach(answerContent => {
        let content = answerContent.innerHTML;

        // Match code blocks enclosed within triple backticks
        const codeRegex = /```([^`]+)```/g;

        // Replace code blocks with styled pre elements
        content = content.replace(codeRegex, (match, group) => {
            const code = group.trim();

            // Highlighting keywords and special characters
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
                        // Add a default case to ensure that other matches are wrapped with <span> tags
                        return `<span class="text-yellow-400">${match}</span>`;
                }
            });

            return `<pre class="bg-gray-900 rounded-lg p-4 my-4"><code class="language-c">${highlightedCode}</code></pre>`;
        });

        answerContent.innerHTML = content;
    });
}
