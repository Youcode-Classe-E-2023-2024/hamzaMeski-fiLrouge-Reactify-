document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const askForm = document.getElementById('askForm');
    const title = document.getElementById('title');
    const description = document.getElementById('description');
    const descriptionError = document.getElementById('descriptionError');
    const tagsError = document.getElementById('tagsError');
    const titleError = document.getElementById('titleError');
    const overlay = document.getElementById('overlay');


    clearInputs();
    storeQuestion();
    function storeQuestion() {
        askForm.addEventListener('submit', function (event) {
            event.preventDefault();

            overlay.classList.remove('hidden');
            clearWarnings();

            const formData = new FormData(this);
            fetch('ask-question/store', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    if(data.errors) {
                        overlay.classList.add('hidden');

                        descriptionError.textContent = data.errors.description;
                        tagsError.textContent = data.errors.tags;
                        titleError.textContent = data.errors.title;
                    }else{
                        overlay.classList.add('hidden');
                        clearInputs();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: `Your question has generated successfully`,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
        })
    }

    function clearWarnings() {
        descriptionError.textContent = '';
        tagsError.textContent = '';
        titleError.textContent = '';
    }

    function clearInputs() {
        title.value = '';
        description.value = '';
    }
});
