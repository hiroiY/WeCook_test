'use strict';
/* Comment area's Action. If the Edit Button is pushed. */
//The comment's Edit and Save button 
document.addEventListener('DOMContentLoaded', function () 
{
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  const setEditButtonListener = (button)=> 
    {
      button.addEventListener('click', function() 
      {
        const commentBody = this.closest('.comments-owner').querySelector('.comment-body');
        const editForm = this.closest('.comments-owner').querySelector('.edit-form');
        const deleteButton = this.closest('.comments-owner').querySelector('.delete-btn');
        const saveButton = editForm.querySelector('.save-btn');

        // Enable direct editing
        commentBody.setAttribute('contenteditable','true');
        commentBody.focus();

        // Show the form and change button text
        editForm.classList.remove('d-none');
        this.classList.add('cancel-btn');
        this.textContent = 'Cancel';
        saveButton.classList.remove('d-none');
        deleteButton.classList.add('d-none');

        // Add event listener to detect focusout of the comment body
        const handleFocusOut = function() {
          // Disable direct editing
          commentBody.setAttribute('contenteditable', 'false');

          // Hide the form
          editForm.classList.add('d-none');
          deleteButton.classList.remove('d-none');
          button.textContent = 'Edit';
          button.classList.remove('cancel-btn');
          saveButton.classList.add('d-none');

          if (!commentBody || !editForm || !deleteButton || !saveButton) {
            console.error('One or more elements are missing.');
            return;
          }

          // Remove the focusout event listener
          commentBody.removeEventListener('focusout', handleFocusOut);
        };

        commentBody.addEventListener('focusout', handleFocusOut);
    
        // Add event listener for the Cancel button
        this.addEventListener('click', function() 
        {
          if (this.classList.contains('cancel-btn')) 
          {
            // Disable direct editing
            commentBody.setAttribute('contenteditable', 'false');

            // Hide the form
            editForm.classList.add('d-none');
            deleteButton.classList.remove('d-none');
            this.textContent = 'Edit';
            this.classList.remove('cancel-btn');
            saveButton.classList.add('d-none');

            // Remove the focusout event listener
            commentBody.removeEventListener('focusout', handleFocusOut);

            //re-add the event listener for the Edit button
            setEditButtonListener(button);
          }
      });
    });
  };

  document.querySelectorAll('.edit-btn').forEach(button => {
    setEditButtonListener(button);
  });

  document.querySelectorAll('.save-btn').forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();

      const editForm = this.closest('.edit-form');
      const commentBody = this.closest('.comments-owner').querySelector('.comment-body');
      const input = editForm.querySelector('input');

      if (!editForm || !commentBody || !input) {
        console.error('One or more elements are missing.');
        return;
      }

      // Set the edited content to the hidden input
      input.value = commentBody.textContent.trim();

       // Add CSRF token to the form
       const csrfInput = document.createElement('input');
       csrfInput.type = 'hidden';
       csrfInput.name = '_token';
       csrfInput.value = csrfToken;
       editForm.appendChild(csrfInput);

      // Submit the form
      editForm.submit();
    });
  });
});