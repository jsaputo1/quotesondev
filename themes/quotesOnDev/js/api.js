(function ($) {
  const homeQuote = $('.quote-content');
  const authorQuote = $('.author');
  const homeSource = $('.source');
  const sourceLink = $('.source-link');

  // Random quote
  $('#quote-button').on('click', function (e) {
    event.preventDefault();
    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
    }).done(function (data) {
      $(homeQuote).empty();
      $(authorQuote).empty();
      $(homeSource).empty();
      $.each(data, function (index, value) {
        // Wordpress Database Variables
        const quote = value.content.rendered;
        const author = value.title.rendered;
        const source = value._qod_quote_source;
        const sourceURL = value._qod_quote_source_url;
        // HTML
        $(homeQuote).html(quote);
        $(authorQuote).append('— ', author, '');
        if (sourceURL) {
          $(homeSource).append(
            `<a href="${sourceURL}"class="source-link" target="new"><span class="source">${source}</span></a>`
          );
        } else {
          $(homeSource).append(`<span class="source">${source}</span>`);
        }
      }); // Closing for each loop
    }); // Closing done function

  }); // Closing event listener (generate quote)

  // Submit quote
  $('#submit').on('click', function (event) {;
    event.preventDefault();
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
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    })
      .done(function (response) {
        if ($authorToAdd === '' || $quoteToAdd === '') {
          alert(
            'Please check if the name of the author and the quote were filled correctly'
          );
        } else {
          window.location.href = response.link;
        }
      })
      .fail(function (err) {
        alert(err.responseJSON.message);
      });
  }); // Closing event listener (generate quote)


  $('#quote-form').on('input', function () {
    this.style.height = 'auto';

    this.style.height =
      (this.scrollHeight) + 'px';
  });



})(jQuery); // Closing document ready function
