function calcRequiredGpa(current, target, total, done) {
    // الصيغة: (المعدل المطلوب * الساعات الكلية - المعدل الحالي * الساعات المنجزة) / (الساعات المتبقية)
    const remaining = total - done;
    if (remaining <= 0) return null;
    const required = ((target * total) - (current * done)) / remaining;
    return required;
}
document.getElementById('gpaForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const current = parseFloat(document.getElementById('currentGpa').value);
    const target = parseFloat(document.getElementById('targetGpa').value);
    const total = parseInt(document.getElementById('totalHours').value);
    const done = parseInt(document.getElementById('completedHours').value);
    const resultDiv = document.getElementById('gpaResult');
    if (isNaN(current) || isNaN(target) || isNaN(total) || isNaN(done) || total <= 0 || done < 0 || done > total) {
        resultDiv.textContent = 'يرجى إدخال بيانات صحيحة.';
        resultDiv.classList.remove('text-success');
        resultDiv.classList.add('text-danger');
        return;
    }
    const required = calcRequiredGpa(current, target, total, done);
    if (required === null || required > 100) {
        resultDiv.textContent = 'غير ممكن تحقيق هذا المعدل.';
        resultDiv.classList.remove('text-success');
        resultDiv.classList.add('text-danger');
    } else {
        resultDiv.textContent = `يجب أن تحصل على معدل ${required.toFixed(2)} في الساعات المتبقية.`;
        resultDiv.classList.remove('text-danger');
        resultDiv.classList.add('text-success');
    }
});
function aiChatReply() {
    const input = document.getElementById('aiChatInput').value.trim();
    const resultDiv = document.getElementById('aiChatResult');
    if (!input) {
        resultDiv.textContent = '';
        return;
    }
    // رد افتراضي فقط
    //
    resultDiv.textContent = '🤖: شكراً لسؤالك! هذه مجرد واجهة تجريبية.';
}