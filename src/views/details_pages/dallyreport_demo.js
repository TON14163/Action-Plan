function DetailsDemo() {
  const driver = new Driver({
    animate: true,
    opacity: 0.8,
    padding: 5,
  });

  // กำหนดขั้นตอนการแนะนำ
  const steps = [
    {
      element: "#feature1",
      popover: {
        title: "วันที่",
        description:
          "คำอธิบาย 1 : เลือกวันที่แล้วกด Search เพื่อค้นหาแผนงานของคุณตามวันที่นั้นๆ",
      },
    },
    {
      element: "#feature2",
      popover: {
        title: "Plan Status",
        description: "คำอธิบาย 2 : หัวข้อแผนงานทั้งหมดจะถูกแยกด้วย 6 สถานะนี้",
      },
    },
    {
      element: "#feature3",
      popover: {
        title: "งานที่ plan ไว้แล้ว",
        description: "สถานะนี้มาจากการเปิด Plan จาก Menu Action Plan",
      },
    },
    {
      element: "#feature4",
      popover: {
        title: "งานที่ไม่ได้ plan ไว้",
        description:
          "สถานะนี้มาจากการเปิด Plan จากปุ่ม Add สีเขียวๆตามหน้าต่างๆ",
      },
    },
    {
      element: "#feature5",
      popover: {
        title: "งานที่ Sup เพิ่มให้",
        description:
          "สถานะนี้มาจากการเปิด Plan จาก Menu Action Plan และเป็นผู้ที่มีสิทธิ์เป็น ( Sup/หัวหน้าเขต ) ผู้ออกนี้สามารถออกกำหนดแผนให้ผู้ที่อยู่ภายใต้ได้",
      },
    },
    {
      element: "#feature6",
      popover: {
        title: "งานที่สร้างจากประมาณการขาย",
        description:
          "ในส่วนนี้จะเข้าไปดำเนินการได้สังเกต Column Edit หลังจากกดเข้าไปจะพบปุ่ม  + เพิ่มประมาณการขายใหม่ หากออกส่วนนี้ข้อมูลจะเข้าสถานะนี้",
      },
    },
    {
      element: "#feature7",
      popover: {
        title: "งานที่ Sup ไปแล้ว",
        description: "เป็นงานที่ sup ดำเนินการ",
      },
    },
    {
      element: "#feature8",
      popover: {
        title: "งานที่ Copy งานเดิม",
        description: "ในส่วนนี้จะเข้าไปดำเนินการได้สังเกต Column Edit หลังจากกดเข้าไปจะพบปุ่ม  + Copy แผลนงานเดิม",
      },
    },
    {
      element: "#feature9",
      popover: {
        title: " + งานที่ไม่ได้ plan ไว้",
        description: "สถานะนี้มาจากการเปิด Plan จากปุ่ม Add สีเขียวๆตามหน้าต่างๆ",
      },
    },
    {
      element: "#feature10",
      popover: {
        title: "Edit",
        description: "เข้าไปดำเนินการในส่วนของ",
      },
    },
  ];

  // เริ่มต้นทัวร์อัตโนมัติ
  setTimeout(() => {
    driver.defineSteps(steps);
    driver.start();
  }, 1000);
}
