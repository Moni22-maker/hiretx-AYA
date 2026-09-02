// assets/js/main.js

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. حساب عدد الكلمات في صندوق الإجابة (Textarea) والتحديث الفوري
    const textarea = document.getElementById('task_response');
    const wordCountDisplay = document.querySelector('.word-counter');
    const answeredStatus = document.querySelector('.task-counter-info span:nth-child(2)');

    if (textarea && wordCountDisplay) {
        textarea.addEventListener('input', function() {
            const text = this.value.trim();
            const words = text === '' ? 0 : text.split(/\s+/).length;
            
            // تحديث نص عداد الكلمات
            wordCountDisplay.textContent = words + (words === 1 ? ' word' : ' words');
            
            // تحديث حالة الإجابة في الأعلى
            if (answeredStatus) {
                if (words > 0) {
                    answeredStatus.textContent = '1 answered';
                    answeredStatus.style.color = '#facc15'; // لون مميز عند الإجابة
                } else {
                    answeredStatus.textContent = '0 answered';
                    answeredStatus.style.color = '#94a3b8';
                }
            }
        });
    }

    // 2. العداد التنازلي للوقت (Countdown Timer)
    const timerDisplay = document.querySelector('.timer-display');
    if (timerDisplay) {
        // تعيين الوقت الابتدائي (مثال: 30 دقيقة = 1800 ثانية)
        let totalSeconds = 30 * 60; 

        const countdown = setInterval(function() {
            let minutes = Math.floor(totalSeconds / 60);
            let seconds = totalSeconds % 60;

            // تنسيق الأرقام لتظهر دائماً بصيغة 00:00
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            timerDisplay.textContent = `${minutes}:${seconds}`;

            if (totalSeconds > 0) {
                totalSeconds--;
            } else {
                clearInterval(countdown);
                alert('Time is up! Your simulation will be submitted automatically.');
                // يمكنك هنا توجيه المستخدم لصفحة الإنهاء تلقائياً
                // document.querySelector('.task-form').submit();
            }
        }, 1000);
    }

    // 3. تبديل اللغات (EN / AR) بشكل تجميلي
    const langBtns = document.querySelectorAll('.lang-btn');
    langBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            langBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

});