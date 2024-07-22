'use strict';

// document.addEventListener('DOMContentLoaded', function() {
//     const bookmarkLinks = document.querySelectorAll('.bookmark-btn');

//     bookmarkLinks.forEach(link => {
//         link.addEventListener('click', function(event) {
//             event.preventDefault();
//             const icon = this.querySelector('i');
//             console.log('Link clicked:', this);
//             console.log('Icon before:', icon.className);

//             fetch(this.href, {
//                 method: 'GET',
//                 headers: {
//                     'X-Requested-With': 'XMLHttpRequest'
//                 },
//                 credentials: 'same-origin'
//             })
//             .then(response => {
//                 if (response.status === 204) {
//                     if (icon.classList.contains('fa-regular')) {
//                         icon.classList.remove('fa-regular');
//                         icon.classList.add('fa-solid');
//                     } else {
//                         icon.classList.remove('fa-solid');
//                         icon.classList.add('fa-regular');
//                     }
//                     console.log('Icon after:', icon.className);
//                 }
//             })
//             .catch(error => console.error('Error:', error));
//         });
//     });
// });
$(document).ready(function() {
    $('.bookmark-btn').on('click', function() {
        console.log('Bookmark button clicked');
        var postId = $(this).data('id');
        var icon = $(this).find('i');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/bookmark/click/' + postId, 
            type: 'POST',
            success: function(response) {
                if (response.bookmarked) {
                    icon.removeClass('fa-regular fa-bookmark').addClass('fa-solid fa-bookmark');
                } else {
                    icon.removeClass('fa-solid fa-bookmark').addClass('fa-regular fa-bookmark');
                }
            },
            error: function() {
                alert('エラーが発生しました。');
            }
        });        
    });
});