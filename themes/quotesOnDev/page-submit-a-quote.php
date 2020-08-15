<?php get_header(); ?>

<div class="submit-a-quote">
  <form>
    <label for="author">Author</label>
    <textarea name="author" id="author-form" name="firstname"></textarea>
    <label for="quote">Quote</label>
    <textarea name="quote" id="quote-form"></textarea>
    <label for="source-form">Where did you find this quote? (e.g. book name)</label>
    <textarea name="source" id="source-form"></textarea>
    <label for="url-form">Provide the URL of the quote source, if available.</label>
    <textarea name="url" id="url-form"></textarea>
    <input type="submit" id="submit" value="Submit Quote" />
  </form>
</div> 

<?php get_footer(); ?>
