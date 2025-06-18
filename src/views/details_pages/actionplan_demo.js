function da1() {
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
          title: 'ฟีเจอร์แรก',
          description: 'เรียนรู้เพิ่มเติมเกี่ยวกับฟีเจอร์แรกของเรา'
        }
      },
      {
        element: '#feature2',
        popover: {
          title: 'ฟีเจอร์ที่สอง', 
          description: 'ดูรายละเอียดเกี่ยวกับฟีเจอร์ที่สองของเรา'
        }
      },
      {
        element: '#feature3',
        popover: {
          title: 'เริ่มต้นใช้งาน',
          description: 'คลิกที่นี่เพื่อเริ่มต้นใช้งาน'
        }
      }
    ];

    // เริ่มต้นทัวร์อัตโนมัติ
    setTimeout(() => {
      driver.defineSteps(steps);
      driver.start();
    }, 1000);

}