// Fetch the api data (console.log)
async function fetchData() {
    try {
        let response = await fetch('https://dummyjson.com/users');
        let data = await response.json();
        return data.users;
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

async function displayRawData() {
    const users = await fetchData();
    console.log(users);
}

displayRawData();

// Create a new array with only name,phone,gender,age (console.log)
async function getUserDetails() {
    const users = await fetchData();
    const userDetails = users.map(({firstName, lastName, phone, gender, age}) => ({
        fullName: `${firstName} ${lastName}`,
        phone,
        gender,
        age 
    }));
    console.log(userDetails)
}

getUserDetails();

// Create a new array with only women (console.log)
async function getOnlyWomen() {
    const users = await fetchData();
    const onlyWomen = users
        .filter(({gender}) => gender === 'female');
    console.log(onlyWomen);
}

getOnlyWomen();


async function getOnlyMen() {
    const users = await fetchData();
    const onlyMen = users.filter(({gender}) => gender === 'male');
    console.log(onlyMen)    
}

getOnlyMen();

// Create a new array with name, phone, gender, age, bloodGroup and eyecolor -> only select the users with blue eyes! (console.log)
async function blueEyes() {
    const users = await fetchData();
    const onlyBlueEyes = users
        .filter(user => user.eyeColor === 'Blue')
        .map(({firstName, lastName, phone, gender, age, bloodGroup, eyeColor}) => ({
            fullName: `${firstName} ${lastName}`,
            phone,
            gender,
            age,
            bloodGroup,
            eyeColor
        }));
    console.log(onlyBlueEyes)
}

blueEyes();

// What's the total combined weight of all the users  (console.log)
async function calcWeight() {
    const users = await fetchData();
    const totalWeight = users.reduce((sum, {weight}) => 
    sum += weight, 0);
    console.log(totalWeight);
}

calcWeight();

// Describe the differences between using map and filter. Why did you choose to use map for transforming the data and filter for creating gender-specific arrays?
    // map wordt gebruikt als transformer waardoor je van een bestaande array een nieuwe array kunt laten maken met enkel de elementen wat je wilt gebruiken
    // filter wordt gebruikt als selector, hiermee kan je een conditie meegeven waardoor enkel de items wat aan deze conditie voldoen gebruikt zullen worden
    // voor de gender specifieke arrays te verkrijgen heb ik filter gebruikt om ervoor te zorgen dat enkel man of vrouw gekozen werd en dan alle andere informatie gedisplayed word zoals het is

// In the context of ES6 features, what benefits did you gain from using arrow functions, destructuring, and other ES6 syntax? Explain how it improved the clarity or functionality of your code.
    // gebruik van arrow function, destructuing en andere ES6 syntax maakt de code compacter en makkelijker te begrijpen, er is geen nood meer de volledige syntax van een function uit te schrijven waardoor de code duidelijk bij mekaar blijft en zo ervoor zorgt dat het beter de begrijpen is. Destructuring zorgt ervoor dat het gemakkelijker wordt om naar een element te verwijzen binnen een data set, en zorgt ervoor dat onnodige herhalen van code worden verminderd. Het zorgt er ook voor dat niet de gehele dataset wordt ingeladen, maar alleen de gewenste informatie, dit zorgt ervoor dat de code sneller zal lopen.