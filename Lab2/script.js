function addCourse() {

    let row = document.createElement("div");
    row.className = "course-row";

    row.innerHTML =
        '<label>Course:</label>' +
        '<input type="text" name="course[]" required>' +

        '<label>Credits:</label>' +
        '<input type="number" name="credits[]" min="1" required>' +

        '<label>Grade:</label>' +
        '<select name="grade[]">' +
            '<option value="4.0">A</option>' +
            '<option value="3.0">B</option>' +
            '<option value="2.0">C</option>' +
            '<option value="1.0">D</option>' +
            '<option value="0.0">F</option>' +
        '</select>';

    document.getElementById("courses").appendChild(row);
}

function validateForm() {

    let courses = document.querySelectorAll('[name="course[]"]');
    let credits = document.querySelectorAll('[name="credits[]"]');

    for (let i = 0; i < courses.length; i++) {
        if (courses[i].value.trim() === "") {
            alert("Course name is required!");
            return false;
        }
    }

    for (let j = 0; j < credits.length; j++) {
        if (credits[j].value <= 0 || isNaN(credits[j].value)) {
            alert("Credits must be a positive number!");
            return false;
        }
    }

    return true;
}
