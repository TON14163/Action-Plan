<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Kanit', 'Prompt', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        
        .container {
            text-align: center;
            color: white;
        }
        
        .loading-text {
            font-size: 2.5rem;
            margin-bottom: 30px;
            position: relative;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .loading-text:after {
            content: "...";
            position: absolute;
            width: 20px;
            text-align: left;
            animation: dots 1.5s infinite;
        }
        
        .spinner {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            position: relative;
        }
        
        .spinner div {
            position: absolute;
            width: 16px;
            height: 16px;
            background-color: white;
            border-radius: 50%;
            animation: spinner 1.2s linear infinite;
        }
        
        .spinner div:nth-child(1) {
            top: 0;
            left: 32px;
            animation-delay: 0s;
        }
        
        .spinner div:nth-child(2) {
            top: 8px;
            right: 8px;
            animation-delay: -0.1s;
        }
        
        .spinner div:nth-child(3) {
            right: 0;
            top: 32px;
            animation-delay: -0.2s;
        }
        
        .spinner div:nth-child(4) {
            bottom: 8px;
            right: 8px;
            animation-delay: -0.3s;
        }
        
        .spinner div:nth-child(5) {
            bottom: 0;
            left: 32px;
            animation-delay: -0.4s;
        }
        
        .spinner div:nth-child(6) {
            bottom: 8px;
            left: 8px;
            animation-delay: -0.5s;
        }
        
        .spinner div:nth-child(7) {
            left: 0;
            top: 32px;
            animation-delay: -0.6s;
        }
        
        .spinner div:nth-child(8) {
            top: 8px;
            left: 8px;
            animation-delay: -0.7s;
        }
        
        .sub-text {
            font-size: 1rem;
            opacity: 0.8;
            margin-top: 10px;
        }
        
        .progress-bar {
            width: 250px;
            height: 6px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            margin: 20px auto;
            overflow: hidden;
        }
        
        .progress {
            height: 100%;
            width: 0%;
            background-color: white;
            border-radius: 10px;
            animation: progress 3s ease-in-out infinite;
        }
        
        @keyframes spinner {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.3;
            }
        }
        
        @keyframes dots {
            0%, 20% {
                content: ".";
            }
            40% {
                content: "..";
            }
            60%, 100% {
                content: "...";
            }
        }
        
        @keyframes progress {
            0% {
                width: 0%;
            }
            50% {
                width: 70%;
            }
            100% {
                width: 100%;
            }
        }
        
        /* เพิ่มเอฟเฟกต์พาร์ติเคิลพื้นหลัง */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            width: 5px;
            height: 5px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: particleFloat 8s infinite ease-in-out;
        }
        
        @keyframes particleFloat {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(20px);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h1 class="loading-text"> <?php if($text != ''){ echo $text; } else { echo $text = 'กำลังดำเนินการ';}?></h1>
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
        <p class="sub-text">กรุณารอสักครู่ ระบบกำลังประมวลผล</p>
    </div>

    <script>
        // สร้างพาร์ติเคิลพื้นหลัง
        const particlesContainer = document.getElementById('particles');
        const particleCount = 30;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            // สุ่มตำแหน่งและการหน่วงเวลา
            const size = Math.random() * 6 + 2;
            const left = Math.random() * 100;
            const delay = Math.random() * 5;
            const duration = Math.random() * 8 + 6;
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${left}%`;
            particle.style.bottom = `-${size}px`;
            particle.style.animationDelay = `${delay}s`;
            particle.style.animationDuration = `${duration}s`;
            
            particlesContainer.appendChild(particle);
        }
    </script>
</body>
</html>