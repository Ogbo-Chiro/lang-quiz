
$(document).ready(function() {
  //change colour when radio is selected
  $('#question1 input:radio').change(function() {
    // Only remove the class in the specific `box` that contains the radio
    $('div.highlight').removeClass('highlight');
    $(this).closest('.form-check').addClass('highlight');
  });
});

$(document).ready(function() {
  //change colour when radio is selected
  $('#question2 input:radio').change(function() {
    // Only remove the class in the specific `box` that contains the radio
    $('div.highlight1').removeClass('highlight1');
    $(this).closest('.form-check').addClass('highlight1');
  });
});

$(document).ready(function() {
  //change colour when radio is selected
  $('#question3 input:radio').change(function() {
    // Only remove the class in the specific `box` that contains the radio
    $('div.highlight2').removeClass('highlight2');
    $(this).closest('.form-check').addClass('highlight2');
  });
});

$(document).ready(function() {
  //change colour when radio is selected
  $('#question4 input:radio').change(function() {
    // Only remove the class in the specific `box` that contains the radio
    $('div.highlight3').removeClass('highlight3');
    $(this).closest('.form-check').addClass('highlight3');
  });
});

