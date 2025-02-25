async function testJsonPlaceholder() {
    try {
        // POST ข้อมูลใหม่
        const postResponse = await fetch('https://jsonplaceholder.typicode.com/users', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                id: 11,
                name: 'Ton',
                email: 'ton@example.com'
            })
        });
        const postResult = await postResponse.json();
        console.log('ผลจากการ POST:', postResult);

        // GET ข้อมูลทั้งหมด
        const getResponse = await fetch('https://jsonplaceholder.typicode.com/users');
        const allUsers = await getResponse.json();
        console.log('ข้อมูลผู้ใช้ทั้งหมด:', allUsers);
    } catch (error) {
        console.error('เกิดข้อผิดพลาด:', error);
    }
}

testJsonPlaceholder();