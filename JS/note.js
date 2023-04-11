// CHOOSE EACH COMPANY TO RADIO INPUT

const stars = document.querySelectorAll('.star-cb-group');

stars.forEach((star) => {
  const ratingInputs = star.querySelectorAll('input[name="note"]');
  const ratingLabels = star.querySelectorAll('label');

  ratingInputs.forEach((input) => {
    input.addEventListener('click', () => {
      // Remove 'checked' class from all labels
      ratingLabels.forEach((label) => {
        label.classList.remove('checked');
      });

      // Add 'checked' class to selected label
      const selectedLabel = input.nextElementSibling;
      selectedLabel.classList.add('checked');
    });
  });
});