<!DOCTYPE html>
<html lang="en">
<?php
require_once __DIR__ . '/config/database.php';
$domain = $_SERVER['HTTP_HOST'];
$domain_only = explode(':', $domain)[0]; // ตัดพอร์ตออก

if ($domain_only === '127.0.0.1' || $domain_only === $IP_NAME_DOMAIN) {
    $thisDomain = "/Action-Plan/";
} elseif ($domain_only === 'action-plans.allwellcenter.com') {
    $thisDomain =  "/";
} else {
    echo "ไม่รู้จักโดเมนนี้";
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/main.css" rel="stylesheet">
    <!-- <link href="/dist/styles.css" rel="stylesheet"> -->
    <link rel= "icon" href ="/assets/images/icon_allwell_2D1.png" type = "image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ERP Sale Report For Allwell</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap');
    .gloria-hallelujah-regular {
    font-family: "Gloria Hallelujah", serif;
    font-weight: 400;
    font-style: normal;
    }
</style>

<body class="text-center" >

    <main class="flex flex-row items-stretch p-10" style="background-color: #F1E1FF;">
        <section class="basis-2/5 self-stretch rounded-l-lg" style="height:100vh; background-color:#FFFFFF; "><img class="mx-auto h-full w-full object-cover" src="<?php echo $thisDomain;?>assets/images/icon_allwell_name_2D.png" alt="Your Company"></section>
        <section class="basis-3/5 self-stretch rounded-r-lg" style="height:100vh; background-color:#FFFFFF; background-size: 20%; background-repeat: no-repeat; background-position: center center; transition: 1s;" id="imageSection">
        <script>
                // อาร์เรย์ของรูปภาพที่ต้องการสลับ
                const images = [
                    // '/assets/images/undraw1.svg',
                    '/assets/images/undraw2.svg',
                    '/assets/images/undraw3.svg',
                    '/assets/images/undraw4.svg',
                    '/assets/images/undraw7.svg',
                    '/assets/images/undraw8.svg'
                ];

                let currentIndex = 0; // ตำแหน่งรูปภาพปัจจุบัน
                const section = document.getElementById('imageSection'); // เลือก section

                // ฟังก์ชันสลับรูปภาพ
                function changeBackgroundImage() {
                    section.style.backgroundImage = `url('${images[currentIndex]}')`;
                    currentIndex = (currentIndex + 1) % images.length; // อัปเดตตำแหน่งรูปภาพ
                }

                // ตั้งเวลาให้สลับรูปภาพทุก 4 วินาที (4000 มิลลิวินาที)
                setInterval(changeBackgroundImage, 4000);

                // เรียกใช้ฟังก์ชันครั้งแรกเพื่อแสดงรูปภาพแรกทันที
                changeBackgroundImage();
            </script>

            <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <font class="gloria-hallelujah-regular text-7xl text-violet-900">ERP Allwell<br> Sale Report </font>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="check_login.php" method="POST">
                        <div>
                            <label for="user_id_login" class="block text-sm/6 font-medium text-gray-900 text-left gloria-hallelujah-regular">Username</label>
                            <div class="mt-2">
                                <input type="text" name="user_id_login" id="user_id_login" required placeholder="Input for username . . ." class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="pass_login" class="block text-sm/6 font-medium text-gray-900 gloria-hallelujah-regular">Password</label>
                                <div class="text-sm"> </div>
                            </div>
                            <div class="mt-2">
                                <input type="password" name="pass_login" id="pass_login" required placeholder="Input for password . . ." class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="gloria-hallelujah-regular flex w-full justify-center rounded-md bg-violet-500 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-violet-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Sign in
                            </button>
                        </div>
                    </form>

                    <p class="mt-10 text-center text-sm/6 text-gray-500 gloria-hallelujah-regular">
                        Not a member?
                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">กรุณาติดต่อเจ้าหน้าที่ It
                            trial</a>
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>