(function($) {
  const homeQuote = $('.home-quote');
  const authorQuote = $('.author');
  const homeSource = $('.source');
  const sourceLink = $('.source-link');
  $('#quote-button').on('click', function(e) {
    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1&filter'
    }).done(function(data) {
      $.each(data, function(index, value) {
        // console.log(value, 'value');

        // Variables
        let quote = value.content.rendered;
        let author = value.title.rendered;
        let source = value._qod_quote_source;
        let sourceURL = value._qod_quote_source_url;

        // HTML
        $(homeQuote).html(quote);
        $(authorQuote).append(author);
        $(sourceLink).prop('href', sourceURL);
        $(sourceLink).append(source);
        if (source != '') {
          $(authorQuote).append(',');
        }
      }); // Closing for each loop
    }); // Closing done function
    $(homeQuote).empty();
    $(authorQuote).empty();
    $(sourceLink).empty();
  }); // Closing event listener (random quote)
})(jQuery); // Closing document ready function
