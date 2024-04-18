document.addEventListener('DOMContentLoaded', function() {
    const tagContainer = document.getElementById('tagContainer');
    const tagsContainer = document.getElementById('tags');
    const form = document.getElementById('askForm');

    // Event listener for clicking on a tag
    tagsContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('tag')) {
            const tagId = event.target.getAttribute('id'); // Get the id attribute value
            const tagName = event.target.dataset.tag;
            // Move the clicked tag into the tag container div
            const newTagDiv = document.createElement('span');
            newTagDiv.classList.add('tagName', 'text-[13px]', 'text-blue-600', 'bg-blue-200', 'py-1', 'px-2', 'rounded-md', 'mr-1', 'cursor-pointer');
            newTagDiv.textContent = tagName;
            newTagDiv.setAttribute('data-id', tagId); // Add data-id attribute to the span for identification
            tagContainer.appendChild(newTagDiv);
            // Remove the clicked tag from the tags section
            event.target.remove();
        }
    });

    // Event listener for clicking on a tag in the tag container to move it back to tags section
    tagContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('tagName')) {
            const tagId = event.target.dataset.id; // Get the data-id attribute value
            const tagName = event.target.textContent;
            // Create a new span for the removed tag and append it back to the tags container
            const newTagDiv = document.createElement('span');
            newTagDiv.id = tagId; // Assign the tag ID
            newTagDiv.classList.add('tag', 'text-[13px]', 'text-blue-600', 'bg-blue-200', 'py-1', 'px-2', 'rounded-md', 'mr-1', 'cursor-pointer');
            newTagDiv.setAttribute('data-tag', tagName);
            newTagDiv.textContent = tagName;
            tagsContainer.appendChild(newTagDiv);
            // Remove the clicked tag from the tag container div
            event.target.remove();
        }
    });

    // Event listener for form submission
    form.addEventListener('submit', function(event) {
        // Remove any existing hidden input fields with name="tags[]" before adding new ones
        form.querySelectorAll('input[name="tags[]"]').forEach(function(input) {
            input.remove();
        });
        // Create hidden input fields for each tag in the tagContainer and append them to the form
        tagContainer.querySelectorAll('.tagName').forEach(function(tag) {
            const tagId = tag.getAttribute('data-id'); // Get the id attribute value
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'tags[]';
            hiddenInput.value = tagId; // Set the value to the id attribute of the span
            form.appendChild(hiddenInput);
        });
    });
});
