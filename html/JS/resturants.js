// fetch to API then get the response as an object.
async function getResturants(url) {
	let req = await fetch(url);
	let res = await req.json();
	return res;
}
// the API response image string is converted back to an image
function decode_logo(logo_string) {
	// Extracting the base64-encoded logo.
	const base64_logo = logo_string;
	// Decode base64 string to binary data.
	const byte_characters = atob(base64_logo);
	const byte_characters_len = byte_characters.length;
	const byte_numbers = new Array(byte_characters_len);
	for (let i = 0; i < byte_characters_len; i++) {
		byte_numbers[i] = byte_characters.charCodeAt(i);
	}
	const byte_array = new Uint8Array(byte_numbers);
	// Create blob from binary data and display it as image.
	const blob = new Blob([byte_array], { type: 'image/png' });
	// image_url is the value of html image tag src attribute.
	const image_url = URL.createObjectURL(blob);
	return image_url;
}

const resturantObject = getResturants('http://localhost:8999/Server/admin_contr/retrieveItem.php');
// the box that contains all of resturants (childs).
const container = document.getElementById("resturants");
resturantObject.then(resturants => {
	resturants.forEach((element, index) => {
		container.insertAdjacentHTML('beforeend',
			`<div class="resturant">
				<div class="restLogo"></div>
				<div class="description">
					<h3>${element['name']}</h3>
					<p>${element['description']}</p>
					<button style="align-self: flex-end; font-size: large;" onclick="goTo(${++index})">
						<span class="box">
							View
						</span>
					</button>
				</div>
			</div>
	`
		);
	}); 
	const rest_array = document.querySelectorAll('.restLogo');
	for (let index in resturants) {
		let image_url = decode_logo(resturants[index]['logo']);
		rest_array[index].style.backgroundImage = `url(${image_url})`;
		console.log(image_url);
	}
})