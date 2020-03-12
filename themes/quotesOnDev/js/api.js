(function($) {
  // Variables for random quote generation
  const homeQuote = $('.home-quote');
  const authorQuote = $('.author');
  const homeSource = $('.source');
  const sourceLink = $('.source-link');
  // Variables for adding a quote

  // Random quote
  $('#quote-button').on('click', function(e) {
    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
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
        $(authorQuote).append(author, ' ');
        $(sourceLink).prop('href', sourceURL);
        $(sourceLink).append(source, ' ');
        if (source != '') {
          $(authorQuote).append(', ');
        }
      }); // Closing for each loop
    }); // Closing done function
    $(homeQuote).empty();
    $(authorQuote).empty();
    $(sourceLink).empty();
  }); // Closing event listener (generate quote)

  // Submit quote
  $('#submit').on('click', function(event) {
    event.preventDefault();
    // console.log('test');

    const $authorToAdd = $('#author-form').val();
    const $quoteToAdd = $('#quote-form').val();
    const $sourceToAdd = $('#source-form').val();
    const $sourceUrlToAdd = $('#url-form').val();

    $.ajax({
      method: 'POST',
      url: red_vars.rest_url + 'wp/v2/posts',
      data: {
        content: $quoteToAdd,
        title: $authorToAdd,
        _qod_quote_source: $sourceToAdd,
        _qod_quote_source_url: $sourceUrlToAdd
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    })
      .done(function(response) {
        if ($authorToAdd === '' || $quoteToAdd === '') {
          alert(
            'Please check if the name of the author and the quote were filled correctly'
          );
        } else {
          alert('Success! Your quote has been submitted.');
          $('#author-form').val('');
          $('#quote-form').val('');
          $('#source-form').val('');
          $('#url-form').val('');
        }
      })
      .fail(function(err) {
        alert(
          'Please check if the name of the author and the quote were filled correctly'
        );
      });
  }); // Closing .event listener (generate quote)
})(jQuery); // Closing document ready function
