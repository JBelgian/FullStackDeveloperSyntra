const url = 'http://localhost:3000/posts';
const output = document.getElementById('output');
const savedOutput = document.getElementById('savedPosts');

function fetchData() {
    output.innerHTML = '';
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const sortedData = data.sort((a, b) => a.timestamp - b.timestamp);
            sortedData.forEach(post => {
                output.innerHTML += `<div class="post-item"><li>id: ${post.id} | Naam: ${post.firstName} ${post.lastName} | Score: ${post.avgTestGrade}</li>
                <button onclick="deletePost('${post.id}')">Delete</button>
                <button onclick="saveToLocal('${post.id}')">Update</button></div>`;
            });
        })
        .catch(error => console.error(error));
}

fetchData();