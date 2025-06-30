function actionplanDetails() {
    const driver = new Driver({
      animate: true,
      opacity: 0.8,
      padding: 5
    });

    // กำหนดขั้นตอนการแนะนำ
    const steps = [
      {
        element: '#feature1',
        popover: {
          title: 'ค้นหาลูกค้า',
          description: 'ฟีเจอร์ 1 : จะใช้ค้นหารายการลูกค้าจากฐานข้อมูลของคุณโดยจะแยกตามเขตผู้ใช้งาน'
        }
      },
      {
        element: '#feature2',
        popover: {
          title: 'วันที่', 
          description: 'ฟีเจอร์ 2 : จะใช้เลือกวันที่เพื่อวางแผนงานของคุณ'
        }
      },
      {
        element: '#feature3',
        popover: {
          title: 'Visit',
          description: 'ฟีเจอร์ 3 : จะใช้สำหรับเลือก Plan ได้มากกว่า 1 รายการ'
        }
      },
      {
        element: '#feature4',
        popover: {
          title: 'ส่งข้อมูล',
          description: 'ฟีเจอร์ 4 : ส่วนนี้แนะนำให้ดำเนินการหลังจากดำเนินการ 3 ฟีเจอร์ก่อนหน้าไปแล้ว'
        }
      },
      {
        element: '#feature5',
        popover: {
          title: 'สรุป',
          description: '1.เลือกลูกค้าจากนั้นกดค้นหา 2.เลือกวันที่ 3.เลือกโรงพยาบาล 4.กดส่งข้อมูล'
        }
      }
    ];

    // เริ่มต้นทัวร์อัตโนมัติ
    setTimeout(() => {
      driver.defineSteps(steps);
      driver.start();
    }, 1000);

}