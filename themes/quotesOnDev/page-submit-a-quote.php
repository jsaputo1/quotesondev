<?php get_header(); ?>

<div class="submit-a-quote">
  <form>

    <label for="author">Author</label>
    <input type="text" id="author-form" name="firstname">

    <label for="quote">Quote</label>
    <input type="text" id="quote-form">

    <label for="source-form">Where did you find this quote? (e.g. book name)</label>
    <input type="text" id="source-form">

    <label for="url-form">Provide the URL of the quote source, if available.</label>
    <input type="text" id="url-form">


    <input type="submit" id="submit" value="Submit Quote" />

  </form>
</div> 

<?php get_footer(); ?>
