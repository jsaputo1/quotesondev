<form role type="search" name="s" action="<?php echo home_url('/')?>"> 
    <fieldset>
        <label class="search-field">
            <input placeholder="SEARCH..." type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" class="search-input">
            <button class="search-submit"><i class="fa fa-search"></i></button>
        </fieldset>
</form>
