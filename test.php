<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แสดงวันที่ภาษาไทยในช่อง Input</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <form action="#" method="get">
        <label for="dateInput">เลือกวันที่:</label>
        <input type="text" id="dateInput" name="dateInput" placeholder="เลือกวันที่...">
        <button type="submit">asdasd</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>
    <script>
        flatpickr("#dateInput", {
            locale: "th", // ใช้ locale ภาษาไทย
            dateFormat: "d F Y", // รูปแบบ: 23 มิถุนายน 2568
            onChange: function(selectedDates, dateStr, instance) {
                // แสดงวันที่ในรูปแบบ Y-m-d ใน console
                if (selectedDates.length > 0) {
                    const ymd = instance.formatDate(selectedDates[0], "Y-m-d");
                    console.log(selectedDates);
                }
                console.log("วันที่ที่เลือก (d F Y): " + dateStr);
            }
        });
    </script>
</body>
</html>