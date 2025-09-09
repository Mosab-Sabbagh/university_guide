
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة دليلي الجامعي</title>
    {{--
    <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="{{asset('js/tailwind.js')}}"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        cairo: ['Cairo', 'sans-serif']
                    },
                    colors: {
                        primary: '#256D3A',
                        secondary: '#F0FDF4'
                    }
                }
            }
        }
    </script>
    <link href="{{asset('font/cairo.css')}}" rel="stylesheet">
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet"> --}}
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="bg-[#FAFAF5] text-gray-800 scroll-smooth">

    <!-- Header -->
    <header class="bg-white shadow-md py-4 px-6 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <h1 class="text-2xl font-bold text-primary animate__animated animate__fadeInDown">
                <span>
                    <img src="{{asset('images/logo.png')}}" alt="شعار المنصة" style="width:30px;  display: inline ;">
                    </a></span>
                منصة دليلي الجامعي
            </h1>

            <!-- Mobile menu button -->
            <button id="menu-toggle" class="md:hidden text-primary focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>


            <!-- Navigation Links -->

            @if (Route::has('login'))
                <nav id="nav-menu" class="hidden md:flex flex-wrap gap-2">
                    <div class="space-x-4 space-x-reverse">
                        @auth
                            @php
                                $userType = Auth::user()->user_type;
                            @endphp

                            @if ($userType === 'super_admin')
                                <a href="{{ route('super_admin.dashboard') }}" class="text-primary font-semibold hover:underline">
                                    لوحة التحكم
                                </a>
                            @elseif ($userType === 'student')
                                <a href="{{ route('student.help_requests.index') }}"
                                    class="text-primary font-semibold hover:underline">
                                    دخول المنصة
                                </a>
                            @else
                                <span class="text-danger font-semibold">نوع مستخدم غير معروف</span>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">تسجيل الدخول</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="bg-primary text-white px-4 py-2 rounded-md hover:bg-green-800 transition">
                                    إنشاء حساب
                                </a>
                            @endif
                        @endauth

                    </div>
                </nav>
            @endif
        </div>

        <!-- Mobile Menu Content -->
        <div id="mobile-menu" class="md:hidden hidden px-4 mt-4">
            <a href="{{route('login')}}" class="block py-2 text-primary font-semibold hover:underline">تسجيل الدخول</a>
            <a href="{{route('register')}}"
                class="block py-2 bg-primary text-white px-4 py-2 rounded-md hover:bg-green-800 transition">إنشاء
                حساب</a>
        </div>

        <script>
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        </script>
    </header>

    <!-- Hero -->
    <section class="text-center py-28 px-4 bg-gradient-to-br from-green-100 to-white relative overflow-hidden">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-primary mb-6 animate__animated animate__fadeInUp">ابدأ رحلتك
                الجامعية بثقة وذكاء 🎓</h2>
            <p class="text-lg md:text-xl text-gray-700 animate__animated animate__fadeInUp animate__delay-1s">
                منصة "دليلي الجامعي" تساعدك في الوصول إلى كل ما تحتاجه من ملخصات، مساقات، سوق الكتب، والذكاء الاصطناعي
                الأكاديمي، لتنجح في رحلتك الجامعية. </p>
            <div class="mt-10 flex justify-center gap-4 flex-wrap animate__animated animate__zoomIn animate__delay-2s">
                {{-- <a href="{{route('register')}}"
                    class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-green-800 transition">ابدأ
                    الآن</a> --}}
                {{-- <a href="{{route('login')}}"
                    class="border border-primary text-primary px-6 py-3 rounded-lg font-medium hover:bg-primary hover:text-white transition">

                    تسجيل

                    الدخول</a> --}}
                @auth
                    @php
                        $userType = Auth::user()->user_type;
                    @endphp

                    @if ($userType === 'super_admin')
                        <a href="{{ route('super_admin.dashboard') }}"
                            class="border border-primary text-primary px-6 py-3 rounded-lg font-medium hover:bg-primary hover:text-white transition">
                            لوحة التحكم
                        </a>
                    @elseif ($userType === 'student')
                        <a href="{{ route('student.help_requests.index') }}"
                            class="border border-primary text-primary px-6 py-3 rounded-lg font-medium hover:bg-primary hover:text-white transition">
                            دخول المنصة
                        </a>
                    @else
                        <span class="text-danger font-semibold">نوع مستخدم غير معروف</span>
                    @endif
                @else

                    <a href="{{route('register')}}"
                        class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-green-800 transition">ابدأ
                        الآن</a>
                    <a href="{{route('login')}}"
                        class="border border-primary text-primary px-6 py-3 rounded-lg font-medium hover:bg-primary hover:text-white transition">

                        تسجيل
                        الدخول
                    </a>
                @endauth

            </div>
        </div>
        <div class="absolute -bottom-10 left-10 w-40 h-40 bg-green-200 rounded-full blur-3xl opacity-30 animate-pulse">
        </div>
        <div class="absolute top-10 right-10 w-32 h-32 bg-green-300 rounded-full blur-2xl opacity-30 animate-bounce">
        </div>
    </section>

    <!-- من نحن -->
    <section class="py-24 px-6 bg-white" id="about">
        <h3 class="text-3xl font-bold text-center text-primary mb-6">من نحن</h3>
        <p class="max-w-3xl mx-auto text-center text-gray-700 text-lg leading-relaxed">
            "دليلي الجامعي" هي منصة تعليمية تهدف إلى دعم الطلاب الجامعيين في حياتهم الأكاديمية، من خلال توفير أدوات
            ذكية، مصادر تعليمية، تبادل الكتب ، توفير الملخصات والشروحات وتواصل مجتمعي بين الطلاب. </p>
    </section>

    <!-- الخدمات -->
    <section class="py-24 px-6 bg-secondary" id="services">
        <h3 class="text-3xl font-bold text-center text-primary mb-12">خدماتنا</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto text-center">
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <h4 class="text-xl font-bold text-primary mb-2">المساعدة الأكاديمية</h4>
                <p class="text-gray-600">منشورات تفاعلية لطرح الأسئلة والإجابة عليها بين الطلاب والمدرسين.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <h4 class="text-xl font-bold text-primary mb-2">سوق الكتب</h4>
                <p class="text-gray-600">منصة لتبادل وشراء الكتب الدراسية بين الطلاب بسهولة.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <h4 class="text-xl font-bold text-primary mb-2">الملخصات الدراسية</h4>
                <p class="text-gray-600">أرشيف من الملخصات المصنفة حسب التخصصات والمواد.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <h4 class="text-xl font-bold text-primary mb-2">دليل المساقات</h4>
                <p class="text-gray-600">استعراض مواد كل تخصص ومشاركة الآراء حولها.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <h4 class="text-xl font-bold text-primary mb-2">حاسبة المعدل</h4>
                <p class="text-gray-600">أداة لحساب المعدل الفصلي والتراكمي بدقة وسهولة.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <h4 class="text-xl font-bold text-primary mb-2">الذكاء الاصطناعي</h4>
                <p class="text-gray-600">روبوت يجيب على أسئلتك الدراسية بدقة وسرعة.</p>
            </div>
        </div>
    </section>

    <!-- سكشن الإحصائيات -->
    <section class="bg-white text-primary py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-12 text-primary">أرقام تتحدث عن نفسها</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                <!-- إحصائية 1 -->
                <div>
                    <div class="text-5xl mb-2 text-primary">💡</div>
                    <p class="text-4xl font-bold counter text-primary" data-target="{{ $post_count }}">0</p>
                    <p class="mt-2 text-primary">منشور ومنتفع</p>
                </div>
                <!-- إحصائية 2 -->
                <div>
                    <div class="text-5xl mb-2">📖</div>
                    <p class="text-4xl font-bold counter" data-target="{{ $summary_count }}">0</p>
                    <p class="mt-2">مساق ملخص</p>
                </div>
                <!-- إحصائية 3 -->
                <div>
                    <div class="text-5xl mb-2">👥</div>
                    <p class="text-4xl font-bold counter" data-target="{{ $student_count }}">0</p>
                    <p class="mt-2">طالب مسجل</p>
                </div>
            </div>
        </div>
    </section>

    <!-- سلايدر الجامعات -->
    <!-- سلايدر الجامعات -->
    <section class="bg-white py-16 px-4" id="university-slider">
        <h2 class="text-3xl font-bold text-center text-primary mb-10">الجامعات المشاركة</h2>
        <div class="relative">
            <button id="scroll-left"
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-primary text-white p-2 rounded-full z-10 shadow-md hidden md:block hover:bg-green-800">▶</button>
            <button id="scroll-right"
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-primary text-white p-2 rounded-full z-10 shadow-md hidden md:block hover:bg-green-800">◀</button>

            <div class="flex overflow-x-auto scroll-smooth gap-6 pb-4 px-2 scrollbar-hide" id="university-carousel">
                @foreach($universities as $university)
                    <div
                        class="shrink-0 bg-gray-50 shadow-md rounded-lg p-4 min-w-[200px] text-center flex items-center space-x-4">
                        @if($university->logo)
                            <img src="{{ route('university.logo', ['filename' => basename($university->logo)]) }}"
                                alt="{{ $university->name_ar }}" class="w-16 h-16"
                                onerror="this.onerror=null;this.src='{{ asset('images/default-logo.png') }}'">
                        @else
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-xs text-gray-500">لا يوجد شعار</span>
                            </div>
                        @endif
                        <p class="text-primary font-semibold whitespace-nowrap">{{ $university->name_ar }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <!-- CTA -->
    <section class="py-20 bg-gradient-to-r from-primary to-green-700 text-white text-center">
        <h3 class="text-3xl font-bold mb-4">سجّل الآن وابدأ مستقبلك الأكاديمي معنا</h3>
        <a id="register" href="{{route('register')}}"
            class="inline-block mt-6 bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">إنشاء
            حساب جديد</a>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6 text-center text-sm text-gray-500">
        جميع الحقوق محفوظة © {{ date('Y') }} - دليلي الجامعي
    </footer>

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
                route: 'general',

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
</body>

</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.counter');
        const options = { threshold: 0.5 };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        const increment = Math.ceil(target / 100);

                        if (count < target) {
                            counter.innerText = count + increment;
                            setTimeout(updateCount, 30);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                    observer.unobserve(counter);
                }
            });
        }, options);

        counters.forEach(counter => observer.observe(counter));
    });
</script>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const carousel = document.getElementById('university-carousel');
        const rightBtn = document.getElementById('scroll-left');
        const leftBtn = document.getElementById('scroll-right');

        let scrollAmount = 0;
        let autoScroll = setInterval(() => {
            scrollAmount += 210;
            if (scrollAmount >= carousel.scrollWidth - carousel.clientWidth) {
                scrollAmount = 0;
            }
            carousel.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        }, 1500);

        carousel.addEventListener('mouseenter', () => clearInterval(autoScroll));
        carousel.addEventListener('mouseleave', () => {
            autoScroll = setInterval(() => {
                scrollAmount += 210;
                if (scrollAmount >= carousel.scrollWidth - carousel.clientWidth) {
                    scrollAmount = 0;
                }
                carousel.scrollTo({ left: scrollAmount, behavior: 'smooth' });
            }, 1500);
        });

        leftBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -210, behavior: 'smooth' });
        });

        rightBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: 210, behavior: 'smooth' });
        });
    });
</script>