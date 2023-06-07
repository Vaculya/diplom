const chips = function(message, style) {

  let chips = document.querySelector('.chips');

  if(!chips) {
    chips = document.createElement('div');
    chips.classList.add('chips');
    document.body.append(chips);
  }

  let chip = document.createElement('div');
  chip.classList.add('chip', style);
  chip.textContent = message;

  chips.append(chip);

  setTimeout(() => {

    chip.remove();
    if(chips.childElementCount == 0) chips.remove();

  }, 3000);

}