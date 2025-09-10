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
    {{-- <div class="ai-chat-widget p-3 w-100 sticky-ai"
        style="background:#fff;border-radius:14px;box-shadow:0 2px 8px #0001;">
        <div class="d-flex align-items-center mb-2" style="gap:7px;">
            <i class="fa fa-robot text-primary"></i>
            <span style="font-weight:600;">دردشة مع الذكاء الاصطناعي</span>
        </div>
        <input type="text" class="form-control form-control-sm mb-2" id="aiChatInput" placeholder="اكتب سؤالك...">
        <button class="btn btn-primary btn-sm w-100" onclick="aiChatReply()">إرسال</button>
        <div id="aiChatResult" class="mt-2 text-secondary" style="font-size:0.97em;"></div>
    </div> --}}
    <!-- AI Chat Widget (Floating) -->
    <div id="chat-widget-fab" style="position: fixed; bottom: 20px; left: 20px; z-index: 1001; display: flex; align-items: center; flex-direction: row-reverse;">
        <button id="chat-widget-button" style="
            background: linear-gradient(135deg, #28a745, #7de67e);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);">
                <i class="fa fa-robot"></i>
                </button>
        <span id="chat-widget-tooltip" style="
            opacity:0;
            visibility:hidden;
            transition:opacity 0.2s,visibility 0.2s;
            background: linear-gradient(135deg, #28a745, #7de67e);
            color:#fff;
            padding:7px 16px;
            border-radius:8px;
            margin-left:10px;
            font-size:15px;
            white-space:nowrap;
            pointer-events:none;">
                دردش مع شات المنصة
        </span>
    </div>
    <div id="chat-widget-container" style="position: fixed; bottom: 20px; left: 20px; width: 350px; height: 500px; background: #fff; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); display: none; flex-direction: column; z-index: 1000; overflow: hidden; border: 1px solid #e0e0e0;">
    <div id="chat-widget-header" style="
        background: linear-gradient(135deg, #28a745, #7de67e);
        color: white;
        padding: 20px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 18px;
        border-bottom: 1px solid #e0e0e0;">        
            <span>دردش مع شات المنصة الذكي</span>
            <button onclick="closeChatWidget()" style="background: none; border: none; color: white; font-size: 18px; cursor: pointer;"><i class="fas fa-times"></i></button>
        </div>
        <div id="chat-widget-body" style="flex: 1; padding: 20px; overflow-y: auto; background: #f8f9fa;">
            <p style="margin-bottom: 20px; color: #198754;"><strong>مرحبا ! 👋 كيف يمكنني مساعتدك اليوم ؟</strong></p>
        </div>
        <div id="chat-widget-footer" style="padding: 12px; border-top: 1px solid #e0e0e0; display: flex; gap: 10px; background: #fff;">
            <input type="text" id="chat-widget-input" placeholder="Type your message here..." style="flex: 1; padding: 8px; border: 1px solid #e0e0e0; border-radius: 8px; outline: none;">
            <button id="chat-widget-send" type="button" style="
                background: linear-gradient(135deg, #28a745, #7de67e);
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 8px;
                cursor: pointer;">
                Send</button>
        </div>
    </div>
    <!-- Chat Widget Script -->
    <script>
        // Tooltip hover logic
        const chatBtn = document.getElementById("chat-widget-button");
        const tooltip = document.getElementById("chat-widget-tooltip");
        chatBtn.addEventListener("mouseenter", function() {
            tooltip.style.opacity = 1;
            tooltip.style.visibility = "visible";
        });
        chatBtn.addEventListener("mouseleave", function() {
            tooltip.style.opacity = 0;
            tooltip.style.visibility = "hidden";
        });
        window.ChatWidgetConfig = {
            webhook: {
                url: 'https://zyadshehab.app.n8n.cloud/webhook/19674da7-939a-4b23-9843-0fe0cb661364/chat',
                route: 'general'
            },
            style: {
                primaryColor: '#198754',
                secondaryColor: '#28a745',
                position: 'left',
                backgroundColor: '#ffffff',
                fontColor: '#333333'
            }
        };

        // Function to generate or retrieve a unique chat ID
        function getChatId() {
            let chatId = sessionStorage.getItem("chatId");
            if (!chatId) {
                chatId = "chat_" + Math.random().toString(36).substr(2, 9); // Unique ID
                sessionStorage.setItem("chatId", chatId);
            }
            return chatId;
        }

        // Show chat widget and hide bubble
        document.getElementById("chat-widget-button").addEventListener("click", function() {
            document.getElementById("chat-widget-container").style.display = "flex";
            document.getElementById("chat-widget-button").style.display = "none";
        });

        // Close chat widget and show bubble
        function closeChatWidget() {
            document.getElementById("chat-widget-container").style.display = "none";
            document.getElementById("chat-widget-button").style.display = "flex";
        }

        // Send message to n8n webhook (refactored)
        function sendChatMessage() {
            let message = document.getElementById("chat-widget-input").value;
            if (message.trim() === "") return;

            let chatBody = document.getElementById("chat-widget-body");
            let newMessage = document.createElement("p");
            newMessage.textContent = message;
            newMessage.style.color = "#333";
            newMessage.style.background = "#f1f1f1";
            newMessage.style.marginBottom = "15px";
            newMessage.style.padding = "12px";
            newMessage.style.borderRadius = "8px";
            newMessage.style.fontSize = "14px";
            newMessage.style.wordWrap = "break-word";
            newMessage.style.border = "1px solid #e0e0e0";
            chatBody.appendChild(newMessage);

            let chatId = getChatId(); // Retrieve the session chat ID

            fetch(window.ChatWidgetConfig.webhook.url, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    chatId: chatId,  // Attach chat ID for memory tracking
                    message: message,
                    route: window.ChatWidgetConfig.webhook.route
                })
            })
            .then(response => response.json())
            .then(data => {
                let botMessage = document.createElement("p");
                botMessage.innerHTML = data.output || "Sorry, I couldn't understand that.";
                botMessage.style.color = "#fff";
                botMessage.style.background = "linear-gradient(90deg, #198754 60%, #28a745 100%)";
                botMessage.style.marginTop = "10px";
                botMessage.style.marginBottom = "15px";
                botMessage.style.padding = "12px";
                botMessage.style.borderRadius = "8px";
                botMessage.style.fontSize = "14px";
                botMessage.style.wordWrap = "break-word";
                botMessage.style.border = "1px solid #198754";
                chatBody.appendChild(botMessage);
            })
            .catch(error => console.error("Error:", error));

            document.getElementById("chat-widget-input").value = "";
        }
        document.getElementById("chat-widget-send").addEventListener("click", function(e) {
            e.preventDefault();
            sendChatMessage();
        });
        document.getElementById("chat-widget-input").addEventListener("keydown", function(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                sendChatMessage();
            }
        });
    </script>
</div>
