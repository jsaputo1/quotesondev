<form role type="search" name="s" action="<?php echo home_url('/')?>"> 
    <fieldset>
        <a href="#" class="search-toggle">
        <i class="fas fa-search"></i>
        </a>
        <label class="search-field">
            <input placeholder="Type and hit enter" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" class="search-input">
        </fieldset>
</form>
