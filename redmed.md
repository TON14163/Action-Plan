/project-name
├── /assets          # เก็บไฟล์静态 (static files) เช่น รูปภาพ, CSS, JS
│   ├── /css
│   ├── /js
│   └── /images
├── /config          # เก็บไฟล์การตั้งค่า เช่น การเชื่อมต่อฐานข้อมูล
├── /src             # เก็บโค้ดหลักของโปรเจค (source code)
│   ├── /controllers # ตัวควบคุม logic ของแอป
│   ├── /models      # โมเดลสำหรับจัดการข้อมูล
│   └── /views       # ไฟล์แสดงผล เช่น HTML template
├── /vendor          # เก็บ library หรือ dependency จาก Composer
├── /uploads         # เก็บไฟล์ที่ผู้ใช้ upload (ถ้ามี)
├── index.php        # ไฟล์เริ่มต้นของโปรเจค
└── .htaccess        # (ถ้าใช้ Apache) สำหรับกำหนด routing



คำอธิบาย:
assets: เก็บไฟล์ที่ใช้ในฝั่ง front-end
config: เก็บการตั้งค่าทั่วไป เช่น database connection
src: แยกโค้ดตาม MVC (Model-View-Controller) ถ้าใช้ pattern นี้
vendor: ถ้าใช้ Composer จะถูกสร้างอัตโนมัติ
uploads: เก็บไฟล์ที่ผู้ใช้อัปโหลด (เช่น รูปภาพ, PDF)





