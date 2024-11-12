const url = 'http://localhost:3000/posts/';
const output = document.getElementById('output')
fetch(url)
.then(res => res.json())
.then(data => {
    for (let i = 0; i < data.length; i++) {
        output.innerHTML += `<li>${data[i].title} ${data[i].views}</li>`
    }
})
.catch(e => console.log(e));