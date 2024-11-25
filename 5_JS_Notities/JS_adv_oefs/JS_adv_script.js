const students = [
    { name: "Alice", age: 22, grade: "A", major: "Computer Science" },
    { name: "Bob", age: 20, grade: "B", major: "Mathematics" },
    { name: "Charlie", age: 23, grade: "A", major: "Physics" },
    { name: "Diana", age: 21, grade: "B", major: "Computer Science" },
    { name: "Eve", age: 19, grade: "C", major: "Biology" }
];

let studentNames = students.map(student => student.name);
console.log(studentNames);

let gradeAStudent = students.filter(student => student.grade === "A");
console.log(gradeAStudent);

let avgAge = students.reduce((total, student) =>
    total + student.age, 0) / students.length;
console.log(avgAge);

let studentNamesUpper = studentNames.map(student => student.toUpperCase());
console.log(studentNamesUpper);

function youngestStudent() {
    students.sort((a,b) => a.age - b.age);
    console.log(students[0]);
}
youngestStudent();

const courses = [
    { 
        id: "CS101", 
        title: "Intro to Programming", 
        category: "Computer Science", 
        difficulty: "Beginner", 
        price: 49.99, 
        students: 1500,
        ratings: [4.5, 4.7, 4.2, 4.8, 4.6]
    },
    { 
        id: "MATH202", 
        title: "Advanced Calculus", 
        category: "Mathematics", 
        difficulty: "Advanced", 
        price: 79.99, 
        students: 750,
        ratings: [4.3, 4.1, 4.6, 4.4, 4.5]
    },
    { 
        id: "PHY101", 
        title: "Intro to Physics", 
        category: "Physics", 
        difficulty: "Beginner", 
        price: 39.99, 
        students: 2000,
        ratings: [4.8, 4.9, 4.7, 4.6, 4.5]
    },
    { 
        id: "CS202", 
        title: "Data Structures and Algorithms", 
        category: "Computer Science", 
        difficulty: "Intermediate", 
        price: 59.99, 
        students: 1200,
        ratings: [4.7, 4.8, 4.9, 4.6, 4.7]
    }
];

courses.forEach(course => {
    const averageRating = course.ratings.reduce((total, item) =>  
        total + item, 0) / course.ratings.length;
    console.log(course.id, averageRating);
});

let beginLevel = courses
    .filter(item => item.difficulty == "Beginner")
    .map(item => item.id);
console.log(beginLevel);

courses.sort((a,b) => b.students - a.students);
console.log(courses);

const groupedCategories = Object.groupBy(courses, ({category}) => category);
console.log(groupedCategories);

let totalRev = courses.reduce((total, item) => total + (item.students * item.price),0);
console.log(totalRev);


let avgRateArray = [];
courses.forEach(course => {
    const averageRating = course.ratings.reduce((total, item) =>  
        total + item, 0) / course.ratings.length;
    avgRateArray.push({id: course.id, GPA: averageRating});
    return avgRateArray
});
avgRateArray.sort((a,b) => b.GPA - a.GPA);
console.log(avgRateArray[0].id);
