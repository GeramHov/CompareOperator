// SHOWING FEEDBACKS HIDDEN WINDOW

const btns = document.querySelectorAll('#showfeedbackbtn');
const feedbackAreas = Array.from(document.querySelectorAll('#feedback'));

btns.forEach((btn) => {
    btn.addEventListener('click', function() {
        feedbackAreas.forEach((element) => {
            element.style.display = 'block';
        });
    });
});