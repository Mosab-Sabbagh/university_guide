<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="d-flex align-items-center justify-content-around p-4">
                <h5 class="modal-title" id="addPostModalLabel">إضافة عرض كتاب </h5>
                <button type="button" class="btn-close btn-close-red" data-bs-dismiss="modal" aria-label="إغلاق"
                    style="filter: invert(41%) sepia(94%) saturate(7497%) hue-rotate(353deg) brightness(97%) contrast(104%);"></button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal-body">
                <form id="addSummaryForm" action="{{route('student.book_post.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">عنوان</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">وصف</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="أدخل وصفًا للكتاب و معلومات اضافية للتواصل في حال تم التوصل لاتفاق"
                            required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">نوع العرض</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_free" id="free_radio" value="1" {{ old('is_free', 1) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="free_radio">
                                مجاني
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_free" id="paid_radio" value="0" {{ old('is_free') === '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="paid_radio">
                                مقابل سعر
                            </label>
                        </div>
                    </div>

                    <div class="mb-3" id="price_field" style="{{ old('is_free', 1) == 1 ? 'display: none;' : '' }}">
                        <label class="form-label">السعر</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" min="0"
                                step="0.01" placeholder="0.00">
                            <span class="input-group-text">شيكل</span>
                        </div>
                    </div>

                    <script>
                        document.querySelectorAll('input[name="is_free"]').forEach(radio => {
                            radio.addEventListener('change', function () {
                                const priceField = document.getElementById('price_field');
                                if (document.getElementById('free_radio').checked) {
                                    priceField.style.display = 'none';
                                    document.querySelector('[name="price"]').value = '';
                                } else {
                                    priceField.style.display = 'block';
                                }
                            });
                        });
                    </script>

                    <button type="submit" class="btn btn-success">نشر</button>
                </form>
            </div>
        </div>
    </div>
</div>