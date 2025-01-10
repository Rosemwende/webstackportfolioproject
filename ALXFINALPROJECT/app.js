document.addEventListener("DOMContentLoaded", function() {
    // Fetch and display courses dynamically
    fetchCourses();
});

function fetchCourses() {
    fetch('api/courses.php') // Replace with your PHP backend endpoint
        .then(response => response.json())
        .then(data => {
            let courseList = document.getElementById("course-list");
            data.courses.forEach(course => {
                let courseCard = document.createElement("div");
                courseCard.className = "course-card";
                courseCard.innerHTML = 
                    <h3>${course.title}</h3>
                    <p>${course.description}</p>
                    <button onclick="enroll(${course.id})">Enroll</button>
                ;
                courseList.appendChild(courseCard);
            });
        });
}

function enroll(courseId) {
    let userId = 1; // Assume logged-in user id
    fetch('api/enroll.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ user_id: userId, course_id: courseId })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    });
}
