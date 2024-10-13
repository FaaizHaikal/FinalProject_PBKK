import * as fs from "fs"; // Corrected import statement

const image = fs.readFileSync("adidasa.jpg", {
    encoding: "base64"
});


fetch("https://classify.roboflow.com/shoes-categories/1?api_key=OmssS0x7eCppP0K0FVMU", {
    method: "POST",
    body: image, // assuming `image` is already in a suitable format (e.g., Blob or FormData)
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
    },
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json(); // or response.text() depending on the response type
})
.then(data => {
    console.log(data);
    
})
.catch(error => {
    console.error('There was a problem with the fetch operation:', error.message);
});