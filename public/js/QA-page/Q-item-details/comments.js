document.addEventListener('DOMContentLoaded', function() {
    /* commenting on an answer process */
    const commentsForms = document.querySelectorAll('.commentsForm');
    const errorContainers = document.querySelectorAll('.errorContainer');
    const commentsContainers = document.querySelectorAll('.commentsContainer');

    commentsForms.forEach((commentsForm, index) => {
        commentsForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            const answerId = this.getAttribute('id');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/comment-on-answer/${answerId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(response => response.json())
                .then(data => {
                    const errorContainer = errorContainers[index];
                    const commentsContainer = commentsContainers[index];

                    if (data.errors) {
                        if (data.errors.comment !== undefined) {
                            errorContainer.textContent = data.errors.comment[0];
                        }
                    } else {
                        let html = '';
                        for (const comment of data.comments) {
                            html += `
                            <section class="w-full relative flex items-center justify-center antialiased bg-white bg-gray-100">
                                <div class="container px-0 mx-auto sm:px-5">
                                    <div class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
                                        <div class="flex flex-row">
                                            <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="Noob master's avatar"
                                                src="${'http://127.0.0.1:8000/storage/' + comment.user.image}">
                                            <div class="flex-col mt-1">
                                                <div class="flex items-center flex-1 px-4 font-bold leading-tight">${comment.user.name}
                                                    <span class="ml-2 text-xs font-normal text-gray-500">${comment.created_at}</span>
                                                </div>
                                                <div class="comment_textContent flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">${comment.comment}</div>
                                                <!-- update form start -->
                                                <form id="${comment.id}" class="update_comment_form hidden">
                                                    <input type="text" name="comment" value="${comment.comment}" class="border border-gray-700">
                                                    <div class="errorUpdateContainer text-red-500 h-[20px]"></div>
                                                    <button type="submit">update</button>
                                                </form>
                                                <!-- update form end -->
                                                <div class="flex items-center gap-4 p-2">
                                                    <!--like-->
                                                    <ion-icon name="heart-outline" class="like_comment cursor-pointer text-xl"></ion-icon>
                                                     <!--modify-->
                                                    <ion-icon name="create-outline" class="edit_comment cursor-pointer text-xl"></ion-icon>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        `;
                        }

                        commentsContainer.innerHTML = html;
                        errorContainer.textContent = ''; // Clear error message

                        edit(commentsContainer, index); // Call the edit function here and pass required parameters
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    /* get comments of each anwser item */
    commentsForms.forEach((commentsForm, index) => {
        const answerId = commentsForm.getAttribute('id');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/comments-of-answer/${answerId}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(response => response.json())
            .then(data => {
                const commentsContainer = commentsContainers[index];
                let html = '';
                for (const comment of data.comments) {
                    html += `
                        <section class="w-full relative flex items-center justify-center antialiased bg-white bg-gray-100">
                            <div class="container px-0 mx-auto sm:px-5">
                                <div class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
                                    <div class="flex flex-row">
                                        <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="Noob master's avatar"
                                            src="${'http://127.0.0.1:8000/storage/' + comment.user.image}">
                                        <div class="flex-col mt-1">
                                            <div class="flex items-center flex-1 px-4 font-bold leading-tight">${comment.user.name}
                                                <span class="ml-2 text-xs font-normal text-gray-500">${comment.created_at}</span>
                                            </div>
                                            <div class="comment_textContent flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">${comment.comment}</div>
                                            <!-- update form start -->
                                            <form id="${comment.id}" class="update_comment_form hidden">
                                                <input type="text" name="comment" value="${comment.comment}" class="border border-gray-700">
                                                <div class="errorUpdateContainer text-red-500 h-[20px]"></div>
                                                <button type="submit">update</button>
                                            </form>
                                            <!-- update form end -->
                                            <div class="flex items-center gap-4 p-2">
                                                <!--like-->
                                                <ion-icon name="heart-outline" class="like_comment cursor-pointer text-xl"></ion-icon>
                                                 <!--modify-->
                                                <ion-icon name="create-outline" class="edit_comment cursor-pointer text-xl"></ion-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    `;
                }

                commentsContainer.innerHTML = html;
                edit(commentsContainer, index); // Call the edit function here and pass required parameters
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    /**************************************************************************************************************/
    function edit(commentsContainer, index) { // Pass commentsContainer and index as parameters
        /* update a comment process start */
        const editIcons = commentsContainer.querySelectorAll('.edit_comment');
        editIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const update_comment_form = icon.parentElement.parentElement.querySelector('.update_comment_form');
                const comment_textContent_div = icon.parentElement.parentElement.querySelector('.comment_textContent');
                const errorUpdateContainer =  update_comment_form.querySelector('.errorUpdateContainer');

                update_comment_form.classList.toggle('hidden');
                comment_textContent_div.classList.toggle('hidden');

                /**********************************************************/
                update_comment_form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);
                    const commentId = this.getAttribute('id');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch(`/update-comment/${commentId}`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.errors) {
                                if (data.errors.comment !== undefined) {
                                    errorUpdateContainer.textContent = data.errors.comment[0];
                                }
                            } else {
                                let html = '';
                                for (const comment of data.comments) {
                                    html += `
                                            <section class="w-full relative flex items-center justify-center antialiased bg-white bg-gray-100">
                                                <div class="container px-0 mx-auto sm:px-5">
                                                    <div class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
                                                        <div class="flex flex-row">
                                                            <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="Noob master's avatar"
                                                                src="${'http://127.0.0.1:8000/storage/' + comment.user.image}">
                                                            <div class="flex-col mt-1">
                                                                <div class="flex items-center flex-1 px-4 font-bold leading-tight">${comment.user.name}
                                                                    <span class="ml-2 text-xs font-normal text-gray-500">${comment.created_at}</span>
                                                                </div>
                                                                <div class="comment_textContent flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">${comment.comment}</div>
                                                                <!-- update form start -->
                                                                <form id="${comment.id}" class="update_comment_form hidden">
                                                                    <input type="text" name="comment" value="${comment.comment}" class="border border-gray-700">
                                                                    <div class="errorUpdateContainer text-red-500 h-[20px]"></div>
                                                                    <button type="submit">update</button>
                                                                </form>
                                                                <!-- update form end -->
                                                                <div class="flex items-center gap-4 p-2">
                                                                    <!--like-->
                                                                    <ion-icon name="heart-outline" class="like_comment cursor-pointer text-xl"></ion-icon>
                                                                     <!--modify-->
                                                                    <ion-icon name="create-outline" class="edit_comment cursor-pointer text-xl"></ion-icon>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        `;
                                }

                                commentsContainer.innerHTML = html;
                                errorUpdateContainer.textContent = ''; // Clear error message
                                update_comment_form.classList.toggle('hidden');

                                edit(commentsContainer);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
                /**********************************************************/
            });
        });
        /* update a comment process end */
    }
});
