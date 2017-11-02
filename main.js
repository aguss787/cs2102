$('.btn-offer').on('click', () => {
  $('#offer').toggle();
});

  $('.rate').hover(
    function() {
      $( this ).addClass('hovered');
    }, function() {
      $( this ).removeClass('hovered');
    });
/*
$(function() {
  $('.rate').hover(
    function() {
      $(this).css('background-color', 'red');
    }, function() {
      $(this).css('background-color', 'green');
    });
})
*/
