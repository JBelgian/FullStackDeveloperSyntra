const url = 'http://localhost:3000/leerlingen/';
const output = document.getElementById('output')
fetch(url)
.then(res => res.json())
.then(data => {
    for (let i = 0; i < data.length; i++) {
        output.innerHTML += `<li>${data[i].firstName} ${data[i].lastName}</li>`
    }
})
.catch(e => console.log(e));