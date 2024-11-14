const url = 'http://localhost:3000/leerlingen';
const output = document.getElementById('output')

function fetchData() {
    output.innerHTML = '';
    fetch(url) // , {method: 'GET'} default parameter
    .then(res => res.json())
    .then(
        data => data.forEach(lln => {
            output.innerHTML += `<div class="post-item"><li>id: ${lln.id} | Naam: ${lln.firstName} ${lln.lastName} | Score: ${lln.avgTestGrade}</li>
            <button class="buttons" onclick="deletePost('${lln.id}')">Delete</button>
            <button class="buttons" onclick="updatePost('${lln.id}')">Update</button></div>`;
        })
    )
    .catch(e => console.log(e));
}

fetchData();

const button = document.getElementById('clear');
button.addEventListener('click', fetchData);

function deletePost(id) {
    fetch(`${url}/${id}`, {
        method: 'DELETE'
    })
    .then(() => fetchData())
    .catch(e => console.error('Error deleting post:', e))
}

function addPost() {
    const newPost = {
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        avgTestGrade: parseInt(document.getElementById('avgTestGrade').value)
    }
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(newPost)
    })
    .then(() => fetchData())
    .catch(e => console.error('Error adding post:', e))
}

function updatePost(id) {
    const updatedPost = {
        firstName: document.getElementById('newFirstName').value,
        lastName: document.getElementById('newLastName').value,
        avgTestGrade: parseInt(document.getElementById('newTestGrade').value)
    }
    fetch(`${url}/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(updatedPost)
    })
    .then(() => fetchData())
    .catch(e => console.error('Error updating post:', e))
}