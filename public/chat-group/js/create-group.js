const createGroupButton = document.getElementById('create-group-button');
const createFormOverlay =  document.getElementById('create-form-overlay');
const createGroupForm = document.getElementById('create-group-form');
const cancelForm = document.getElementById('cancel-form');


createGroupButton.addEventListener('click', function() {
    createFormOverlay.classList.remove('hidden');
})

cancelForm.addEventListener('click', function() {
    createFormOverlay.classList.add('hidden');
})


createGroupForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    fetch('/create-group' , {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.text())
        .then(data => {
            console.log(data);
            Swal.fire({
                position: "center",
                icon: "success",
                title: `Group created successfully`,
                showConfirmButton: false,
                timer: 1500
            });
        })
})

