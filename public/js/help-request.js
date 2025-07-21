        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-post-btn');
            const form = document.getElementById('addPostForm');
            const titleInput = document.getElementById('postTitle');
            const contentInput = document.getElementById('postText');
            const fileInput = document.getElementById('postFile');
            const modalTitle = document.getElementById('addPostModalLabel');
            const submitButton = form.querySelector('button[type="submit"]');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const postId = this.dataset.id;
                    const title = this.dataset.title;
                    const content = this.dataset.content;
                    const updateUrl = this.dataset.updateUrl;

                    // تغيير عنوان المودال
                    modalTitle.innerText = 'تعديل المنشور';

                    // تعبئة البيانات
                    titleInput.value = title;
                    contentInput.value = content;

                    // تغيير طريقة الإرسال لـ PUT 
                    form.action = updateUrl;
                    if (!form.querySelector('input[name="_method"]')) {
                        const methodInput = document.createElement('input');
                        methodInput.setAttribute('type', 'hidden');
                        methodInput.setAttribute('name', '_method');
                        methodInput.setAttribute('value', 'PUT');
                        form.appendChild(methodInput);
                    } else {
                        form.querySelector('input[name="_method"]').value = 'PUT';
                    }

                    // تغيير نص الزر
                    submitButton.innerText = 'تحديث';

                    // فتح المودال
                    new bootstrap.Modal(document.getElementById('addPostModal')).show();
                });
            });
        });

document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-post-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const postId = this.dataset.id;
            const url = this.dataset.url;

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
                    fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("فشل في الحذف من السيرفر");
                            }
                            return response.json();
                        })
                        .then(data => {
                            const postElement = document.getElementById(`post-${postId}`);
                            if (postElement) {
                                postElement.remove();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'تم الحذف!',
                                    text: data.message || 'تم حذف المنشور بنجاح.',
                                    confirmButtonText: 'تم'
                                });
                            } else {
                                console.error(`لم يتم العثور على العنصر post-${postId}`);
                            }
                        })
                        .catch(error => {
                            console.error('حدث خطأ أثناء الحذف:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'خطأ',
                                text: 'حدث خطأ أثناء الحذف، حاول مرة أخرى.',
                                confirmButtonText: 'حسنًا'
                            });
                        });
                }
            });
        });
    });
});

