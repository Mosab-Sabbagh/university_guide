<div class="left-sidebar" style="padding: 20px">
    <div class="gpa-widget mb-4 p-3 w-100 sticky"
        style="background:#fff;border-radius:14px;box-shadow:0 2px 8px #0001;">
        <div class="d-flex align-items-center mb-2" style="gap:7px;">
            <i class="fa fa-calculator text-success"></i>
            <span style="font-weight:600;">حاسبة المعدل الفصلي</span>
        </div>
        <form id="gpaForm">
            <div class="mb-2">
                <input type="number" step="0.01" min="0" max="100" class="form-control form-control-sm mb-1"
                    id="currentGpa" placeholder="المعدل الحالي" required>
            </div>
            <div class="mb-2">
                <input type="number" step="0.01" min="0" max="100" class="form-control form-control-sm mb-1"
                    id="targetGpa" placeholder="المعدل المطلوب" required>
            </div>
            <div class="mb-2">
                <input type="number" min="1" class="form-control form-control-sm mb-1" id="totalHours"
                    placeholder="عدد ساعات التخصص الكلية" required>
            </div>
            <div class="mb-2">
                <input type="number" min="0" class="form-control form-control-sm mb-1" id="completedHours"
                    placeholder="عدد الساعات المنجزة" required>
            </div>
            <button type="submit" class="btn btn-success btn-sm w-100">احسب</button>
        </form>
        <div id="gpaResult" class="mt-2 text-center text-success" style="font-size:0.98em;font-weight:600;"></div>
    </div>
    <div class="ai-chat-widget p-3 w-100 sticky-ai"
        style="background:#fff;border-radius:14px;box-shadow:0 2px 8px #0001;">
        <div class="d-flex align-items-center mb-2" style="gap:7px;">
            <i class="fa fa-robot text-primary"></i>
            <span style="font-weight:600;">دردشة مع الذكاء الاصطناعي</span>
        </div>
        <input type="text" class="form-control form-control-sm mb-2" id="aiChatInput" placeholder="اكتب سؤالك...">
        <button class="btn btn-primary btn-sm w-100" onclick="aiChatReply()">إرسال</button>
        <div id="aiChatResult" class="mt-2 text-secondary" style="font-size:0.97em;"></div>
    </div>
</div>
