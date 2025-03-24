
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>HTML5 datalist styling demonstration</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<script type="module" src="node_modules/datalist-css/dist/datalist-css.min.js"></script>
<style>
*, *::before, *::after {
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
  font-size: 100%;
  color: #222;
  background-color: #fafafe;
  margin: 1em;
}

label, button {
  display: block;
  margin-top: 1em;
}

/* <datalist> and <option> styling */
datalist {
  position: absolute;
  max-height: 20em;
  border: 0 none;
  overflow-x: hidden;
  overflow-y: auto;
}

datalist option {
  font-size: 0.8em;
  padding: 0.3em 1em;
  background-color: #ccc;
  cursor: pointer;
}

datalist option:hover, datalist option:focus {
  color: #fff;
  background-color: #036;
  outline: 0 none;
}
</style>
</head>
<body>

  <h1>HTML5 datalist styling demonstration</h1>

  <form id="autoform">

    <!-- must be first element after input and use <option>value</option> format -->
    <label for="browser">browser:</label>
    <input list="browserdata" id="browser" name="browser" size="50" autocomplete="off" />
    <datalist id="browserdata">
    </datalist>

  </form>

<script type="module">
(() => {

  // stop form submission and output field names/values to console
  const form = document.getElementById('autoform');

  form.addEventListener('submit', e => {

    e.preventDefault();
    console.log('Submit disabled. Data:');

    const data = new FormData(form);
    for (let nv of data.entries()) {
      console.log(`  ${ nv[0] }: ${ nv[1] }`);
    }

  });

})();
</script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>

<script>
    // ใช้ fetch API เพื่อดึงข้อมูลจาก API
    fetch('https://testpr-wr.allwellcenter.com/customers_json')
        .then(response => response.json())
        .then(data => {
            var selectElement = document.getElementById('browserdata');
            
            data.forEach(function(customer) {
                var option = document.createElement('option');
                option.value = customer.customer_name;
                option.textContent = customer.customer_name;
                selectElement.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
</script>



</body>
</html>
