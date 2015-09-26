$(function(){
  $('.flash_message').fadeOut(3000, function(){

  });

  $('.menuButton').click(function(){
    $('.headerNav').slideToggle();
  });

  $('.postForm').on('submit', function(form){
    //form.preventDetault();
  })
})
