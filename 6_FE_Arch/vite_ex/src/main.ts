import './style.css'

interface User {
  name: {
    first: string;
    last: string;
  };
  email: string;
  location: {
    city: string;
    state: string;
    country: string;
  };
  picture: {
    medium: string;
  };
}

async function fetchData(): Promise<User[]> { 
  try {
    const response = await fetch('https://randomuser.me/api/?results=10');
    const data = await response.json();
    return data.results;
  } catch (error) {
    console.error('Error fetching data:', error);
    return [];
  }
}

async function displayUserData(): Promise<void> {
  const userList = document.getElementById('userList')!;
  userList.innerHTML = ''; 

  try {
    const users = await fetchData();
    users.forEach(user => {
      const listItem = document.createElement('li');
      listItem.innerHTML = `<div class="post-item">
      <ul class="post-content">
        <li><img src="${user.picture.medium}" alt="picture ${user.name.first} ${user.name.last}"></li>
        <li>Name: ${user.name.first} ${user.name.last}</li>
        <li>Email: ${user.email}</li>
        <li>Location: ${user.location.city}, ${user.location.state}, ${user.location.country}</li>
      </ul>
      </div>`;
      userList.appendChild(listItem);
    });
  } catch (error) {
    console.error('Error displaying data:', error);
  }
}

// document.getElementById('fetchButton')!.addEventListener('click', displayUserData);

displayUserData();