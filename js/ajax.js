function ajax(url, data) {
	return new Promise((resolve, reject) => {
		let xhr = new XMLHttpRequest();
		xhr.open("POST", url, true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4) {
				if (xhr.status >= 200 && xhr.status < 300 || xhr.status === 304) {
					let data = xhr.responseText;
					resolve(JSON.parse(data));
				} else {
					reject("Error");
				}
			}
		}
		xhr.send(data);
	});
}
async function fn1(url, data) {
	let res = await ajax(url, data);
	return res;
}