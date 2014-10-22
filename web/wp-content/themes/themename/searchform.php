<?php
/**
 *  Search Form
 */
?>
<form method="get" action="<?php echo home_url('/'); ?>" role="search">
    <label class="visuallyhidden" for="s">Search for:</label>
    <input name="s" id="s" type="search" value="" placeholder="Search <?php bloginfo('name'); ?>">
    <input class="button" type="submit" value="Search">
</form>
