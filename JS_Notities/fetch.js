const url = 'https://jsonplaceholder.typicode.com/todos/';

fetch(url)
.then(res => res.json())
.then(data => {
    const output2 = document.getElementById('output')
    for (let i = 0; i < data.length; i++) {
        output2.innerHTML += `<li>${data[i].title}</li>`
    }
    return output2.innerHTML
})
.catch(e => console.log(e));

// HTTP VERB (GET) (POST, DELETE, PUT)

