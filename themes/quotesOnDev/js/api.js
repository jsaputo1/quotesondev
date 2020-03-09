(function($) {
  $('.randomQuote').on('click', function(e) {
    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]rand&filter[posts_per_page]=10'
    }).done(function(data) {
      $.each(data, function(index, value) {
        console.log(value, 'value');
        let test = value.content.rendered;
        console.log(test);
        $('random-generated').append(test);
      });
    }); // Closing done function
  }); // Closing event listener (random quote)
})(jQuery); // Closing document ready function
