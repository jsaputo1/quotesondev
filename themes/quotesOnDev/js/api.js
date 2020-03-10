(function($) {
  $('.quote-button').on('click', function(e) {
    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
    }).done(function(data) {
      $.each(data, function(index, value) {
        console.log(value, 'value');
        let quote = value.content.rendered;

        $('.random-generated').append(quote);
      }); // Closing for each loop
    }); // Closing done function
    $('.random-generated').empty();
  }); // Closing event listener (random quote)
})(jQuery); // Closing document ready function
