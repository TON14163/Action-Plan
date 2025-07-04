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
        title: "วันที่แก้ไขล่าสุด",
        description:
          "ส่วนนี้จะแสดงวันที่ล่าสุดที่แก้ไขเอกสารนี้",
      },
    },
    {
      element: "#feature2",
      popover: {
        title: "ข้อมูลลูกค้า",
        description: "รายละเอียดข้อมูลลูกค้าที่ใช้ใน Plan นี้",
      },
    },
    {
      element: "#feature3",
      popover: {
        title: "ดูข้อมูลตึกใหม่",
        description: "ในส่วนนี้จะใช้ในการแก้ไขข้อมูลลูกค้า , เพิ่มรายละเอียดการสร้างตึกใหม่",
      },
    },
    {
      element: "#feature4",
      popover: {
        title: "ระดับลูกค้า",
        description:
          "มีทั้งหมด 3 ระดับ ( Normal,VIP,VVIP) ถ้าหากไม่ได้เลือกไว้แต่แรกจะแสดงเป็น ( ไม่ได้ระบุ )",
      },
    },
    {
      element: "#feature5",
      popover: {
        title: "Copy แผลนงานเดิม",
        description:
          "หากใช้ feature นี้ จะทำการ Copy ใบเอกสารนี้เพื่อไปออกใบใหม่ สถานะที่ได้จะเป็น งานที่ Copy งานเดิม และในส่วนนี้ต้องระบุแผนงานทุกครั้ง !!",
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
        title: "เพิ่มเติมข้อมูลลูกค้า",
        description: "กรณีที่ข้อมูลลูกค้ามีเยอะให้ใส่เพิ่มที่ส่วนนี้",
      },
    },
    {
      element: "#feature8",
      popover: {
        title: "เลือกสินค้า",
        description: "หากทำการเลือกรายการไหน แสดงมีส่วนที่เด้งมาให้เลือก 2 อย่าง พูดคุยนำเสนอ,แจก Catalog",
      },
    },
    {
      element: "#feature9",
      popover: {
        title: "แผนงาน",
        description: "ข้อมูลส่วนนี้จะมาจากส่วนของการออก Action Plan ในช่วงแรก ( ส่วนนี้ไม่สามารถแก้ไขได้ )",
      },
    },
    {
      element: "#feature10",
      popover: {
        title: "ประมาณการขาย",
        description: "feature หลักๆ : ไปยังลิ้งค์เอกสารต่างๆ,ออกประมาณการขายใหม่,เพิ่มวันที่ติดตาม,ปรับเปอร์เซ็น,สลับ Plan",
      },
    },
    {
      element: "#feature11",
      popover: {
        title: "Demo ทดลองสินค้า",
        description: "feature หลักๆ : ไปยังลิ้งค์เอกสารต่างๆ,เพิ่มรายละเอียดรายการสินค้าทดสอลใช้งานสามารถเพิ่มได้หลายรายการในส่วนนี้",
      },
    },
    {
      element: "#feature12",
      popover: {
        title: "ออกบูธ (Group Presentation)",
        description: "feature หลักๆ : ไปยังลิ้งค์เอกสารต่างๆ,ใส่รายละเอียดที่ไปออกบูธ",
      },
    },
    {
      element: "#feature13",
      popover: {
        title: " ข้อมูลคู่แข่ง",
        description: "feature หลักๆ : เพิ่มข้อมูลคู่แข่ง สามารถเพิ่มได้หลายคู่แข่งพร้อมกัน (ส่วนของการแนบไฟล์สามารถเพิ่มได้หลายไฟล์แต่หากต้องการแก้ไขต้องลบคู่แข่งคนนั้นทิ้งแล้วเพิ่มเข้าไปใหม่)",
      },
    },
  ];

  // เริ่มต้นทัวร์อัตโนมัติ
  setTimeout(() => {
    driver.defineSteps(steps);
    driver.start();
  }, 1000);
}
