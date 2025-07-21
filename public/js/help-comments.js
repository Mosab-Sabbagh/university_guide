// عرض اسم الملف في نموذج إضافة منشور
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function showPostFileName(input) {
    const fileNameSpan = document.getElementById('postFileName');
    if (input.files && input.files[0]) {
        fileNameSpan.textContent = input.files[0].name;
    } else {
        fileNameSpan.textContent = '';
    }
}

function toggleAddComment(btn) {
    const box = btn.parentElement.nextElementSibling;
    box.classList.toggle('active');
    if (box.classList.contains('active')) {
        box.querySelector('input[type=text]').focus();
    }
}

function submitComment(event, helpRequestId) {
    event.preventDefault();

    const form = event.target;
    const content = form.querySelector('textarea[name="content"]').value;
    const fileInput = form.querySelector('input[name="file"]');
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const formData = new FormData();
    formData.append('content', content);
    if (fileInput && fileInput.files.length > 0) {
        formData.append('file', fileInput.files[0]);
    }

    fetch(`/student/comments/store/${helpRequestId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json',
        },
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // أضف التعليق الجديد
                const commentBox = document.getElementById(`comments-${helpRequestId}`);
                const newComment = document.createElement('div');
                newComment.classList.add('comment-item');
                newComment.innerHTML = `
                <div class="comment-avatar"><i class="fa fa-user"></i></div>
                <div class="comment-body">
                    <span class="comment-author">${data.comment.user.name}:</span>
                        ${data.comment.content}
                        ${data.comment.file ? `<br><a href="${data.comment.file}" target="_blank">📎 مرفق</a>` : ''}
                </div>
                `;
                commentBox.appendChild(newComment);
                form.reset();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

$(document).ready(function () {
    $('.comment-form').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let postId = form.data('post-id');
        let formData = new FormData(this);

        $.ajax({
            url: '/student/help-requests/' + postId + '/comments',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                let editBtn = '';
                let deleteBtn = '';

                if (response.is_owner) {
                    editBtn = `<button class="btn-edit" data-id="${response.comment_id}" data-help-id="${postId}">تعديل</button>`;
                    deleteBtn = `<button class="btn-delete" data-id="${response.comment_id}" data-help-id="${postId}">حذف</button>`;
                }

                let commentHtml = `
        <div class="comment-item d-flex justify-content-between align-items-start" id="comment-${response.comment_id}">
            <div class="d-flex align-items-start">
                <div class="comment-avatar me-2">
                    <i class="fa fa-user text-secondary" style="font-size: 20px;"></i>
                </div>
                <div class="comment-body">
                    <span class="comment-author">${response.user_name}:</span>
                    <span class="comment-content">${response.content}</span>
                </div>
            </div>
            ${response.is_owner ? `
            <div class="dropdown">
                <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <button class="dropdown-item btn-edit" data-id="${response.comment_id}" data-help-id="${postId}">
                            تعديل
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item btn-delete text-danger" data-id="${response.comment_id}" data-help-id="${postId}">
                            حذف
                        </button>
                    </li>
                </ul>
            </div>
            ` : ''}
        </div>
    `;


                $('#comments-' + postId).append(commentHtml);
                form[0].reset(); // تفريغ الحقول

                // ✅ تحديث عداد التعليقات
                let countSpan = $('#comment-count-' + postId);
                let currentCount = parseInt(countSpan.text()) || 0;
                countSpan.text(currentCount + 1);
            },

            error: function (xhr) {
                alert('حدث خطأ أثناء إرسال التعليق.');
            }
        });
    });
});


$(document).ready(function () {
    // حذف تعليق باستخدام SweetAlert2
    $(document).on('click', '.btn-delete', function () {
        let commentId = $(this).data('id');
        let helpRequestId = $(this).data('help-id');

        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لن تتمكن من التراجع بعد الحذف!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'نعم، احذف',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/student/help-requests/${helpRequestId}/comments/${commentId}`,
                    method: 'DELETE',
                    data: { _token: token },
                    success: function () {
                        $('#comment-' + commentId).remove();
                        let countSpan = $('#comment-count-' + helpRequestId);
                        let currentCount = parseInt(countSpan.text());
                        countSpan.text(currentCount - 1);
                        Swal.fire('تم الحذف!', 'تم حذف التعليق بنجاح.', 'success');
                    },
                    error: function () {
                        Swal.fire('خطأ', 'فشل الحذف.', 'error');
                    }
                });
            }
        });
    });

    // تعديل تعليق داخل نفس الحقل (inline editing)
    $(document).on('click', '.btn-edit', function () {
        let commentId = $(this).data('id');
        let helpRequestId = $(this).data('help-id');
        let commentContent = $('#comment-' + commentId + ' .comment-content');

        // منع تكرار التحرير
        if (commentContent.find('input').length) return;

        let currentText = commentContent.text().trim();

        let inputField = $(`<input type="text" class="form-control form-control-sm d-inline w-75" value="${currentText}">`);
        let saveBtn = $(`<button class="btn btn-sm btn-success ms-2">حفظ</button>`);

        commentContent.html('').append(inputField).append(saveBtn);
        inputField.focus();

        // دالة لحفظ التعديل
        const saveEdit = () => {
            let newText = inputField.val();

            if (newText && newText !== currentText) {
                $.ajax({
                    url: `/student/help-requests/${helpRequestId}/comments/${commentId}`,
                    method: 'PATCH',
                    data: {
                        _token: token,
                        content: newText,
                    },
                    success: function (res) {
                        commentContent.text(res.content);
                    },
                    error: function () {
                        Swal.fire('خطأ', 'فشل تعديل التعليق.', 'error');
                        commentContent.text(currentText);
                    }
                });
            } else {
                commentContent.text(currentText); // إرجاع النص الأصلي إن لم يتغير
            }
        };

        // عند الضغط على زر "حفظ"
        saveBtn.on('click', saveEdit);

        // عند الضغط على Enter داخل حقل النص
        inputField.on('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // منع إرسال النموذج الافتراضي
                saveEdit();
            }
        });
    });

});
