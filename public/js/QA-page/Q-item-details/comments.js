document.addEventListener('DOMContentLoaded', function() {
    const commentsForm = document.querySelector('.commentsForm');
    const errorContainer = document.querySelector('.errorContainer');
    const commentsContainer = document.querySelector('.commentsContainer');
    console.log('ok')
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
                if (data.errors) {
                    if (data.errors.comment !== undefined) {
                        errorContainer.textContent = data.errors.comment[0];
                    }
                } else {
                    // console.log(data);
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
                                            <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">${comment.comment}</div>
                                            <div class="flex items-center gap-4 p-2">
<!--                                                <ion-icon name="arrow-undo-outline" class="replay_comment cursor-pointer text-xl"></ion-icon>-->
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
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
