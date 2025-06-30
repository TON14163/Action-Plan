function DetailsDemo() {
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
          description: 'ฟีเจอร์ 1 : รายละเอียดทั้งหมดของแผนงาน'
        }
      },
      {
        element: '#feature2',
        popover: {
          title: 'วันที่', 
          description: 'ฟีเจอร์ 2 : จะใช้เลือกวันที่เพื่อวางแผนงานของคุณสามารถแยกวันได้กรณีที่มีหลายรายการและคนละวันกัน'
        }
      },
      {
        element: '#feature3',
        popover: {
          title: 'แผนงาน',
          description: 'ข้อมูลส่วนนี้จะอ้างอิงข้อมูลมาจากใบก่อนหน้าที่มีการระบุข้อมูลของโรงพยาบาลนี้ หากใบนี้ต้องการระบุรายละเอียดใหม่โปรดแก้ไขข้อมูลส่วนนี้'
        }
      },
      {
        element: '#feature4',
        popover: {
          title: 'บันทึก',
          description: 'หลังจากบันทึกข้อมูลนี้แล้วจะเด้งข้อมูลไปยัง menu Daily Report'
        }
      }
    ];

    // เริ่มต้นทัวร์อัตโนมัติ
    setTimeout(() => {
      driver.defineSteps(steps);
      driver.start();
    }, 1000);

}