const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const likeBlogBtn = document.getElementById('like-blog-btn');
const likesNmb= document.getElementById('likes-nmb');
const heart = document.getElementById('heart');
const blogId = likeBlogBtn.getAttribute('blogId');

console.log(likeBlogBtn)
likeBlogBtn.addEventListener('click', function() {
    fetch('/like-blog/' + blogId, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            likesNmb.textContent  = data.likes;

            if(data.liked) {
                heart.classList.add('text-red-500');
            }else {
                heart.classList.remove('text-red-500');
            }
        })
})



isBlogLiked();
function isBlogLiked() {
    fetch('/is-blog-liked/' + blogId, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(data => {
            console.log(data)
            if(data.liked) {
                heart.classList.add('text-red-500');
            }else {
                heart.classList.remove('text-red-500');
            }
        })
}
