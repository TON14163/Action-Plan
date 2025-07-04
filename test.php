<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
    </head>
    <body>
        <p>Before</p>

        <ul id="list">
        <li>Item 1</li>
        <li>
            Item 2
            <ul>
            <li>Item 2.1</li>
            <li>
                Item 2.2
                <ul id="nestedList">
                <li>Item 2.2.1</li>
                <li>Item 2.2.2</li>
                <li>Item 2.2.3</li>
                </ul>
            </li>
            <li>Item 2.3</li>
            </ul>
        </li>
        <li>Item 3</li>
        </ul>

        <p>After</p>

        <script>
        const list = document.getElementById('list');
        console.log('.getElementById(list)', list)
        console.log('.firstElementChild', list.firstElementChild)
        console.log('.lastElementChild', list.lastElementChild)
        console.log('.previousElementSibling', list.previousElementSibling)
        console.log('.nextElementSibling', list.nextElementSibling)

        const nestedList = document.getElementById('nestedList');
        console.log('.getElementById(nestedList)', nestedList)
        console.log('.firstElementChild', nestedList.firstElementChild)
        console.log('.lastElementChild', nestedList.lastElementChild)
        console.log('.previousElementSibling', nestedList.previousElementSibling)
        console.log('.nextElementSibling', nestedList.nextElementSibling)
        console.log('.parentElement', nestedList.parentElement)
        console.log('.parentElement.parentElement', nestedList.parentElement.parentElement)
        </script>
    </body>
</html>