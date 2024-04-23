const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const likeBlogBtns = document.querySelectorAll('.like-blog-btn');
const likesNmb = document.querySelectorAll('.likes-nmb');

for(const likeBlogBtn of likeBlogBtns) {
    likeBlogBtn.addEventListener('click', function() {
        const blogId = this.getAttribute('blogId');
        fetch('/like-blog/' + blogId, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                areBlogsLiked(blogsIDs);
                console.log(this)
                console.log(data)
                if(data.liked) {
                    this.classList.add('text-red-500');
                }else {
                    this.classList.remove('text-red-500');
                }
            })
    })
}


const blogsIDs = [];
likeBlogBtns.forEach(likeBlogBtn => {
    blogsIDs.push(likeBlogBtn.getAttribute('blogId'));
})


areBlogsLiked(blogsIDs);
function areBlogsLiked(blogsIDs) {
    fetch('/are-blogs-liked', {
        method: 'POST',
        body: JSON.stringify({ blogs: [...blogsIDs] }),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(data => {
            console.log(data)
            for(let i = 0; i < data.length; i++) {
                if(data[i].liked) {
                    likeBlogBtns[i].classList.add('text-red-500');
                } else {
                    likeBlogBtns[i].classList.remove('text-red-500');
                }
                likesNmb[i].textContent = data[i].likes;
            }
        });
}
