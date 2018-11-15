<?php

/**
 * Plugin Name: EGGC Boast Forum
 * Description: EGGC's Daily Winners grid post.
 * Author: John Yonard Pauly
**/

function boast_forum_function ()
{
    $content = "";
    $content .= "<h1>This is test beginning.</h1>";
    $content .= "<h2>This is test middle.</h2>";
    $content .= "<h3>This is test end.</h3>";

    return $content;
}
add_shortcode('ebf-show', 'boast_forum_function');

function boast_forum_admin_menu_option ()
{
    add_menu_page('Header and Footer Scripts', 'Site Scripts', 'manage_options', 'boastforum-admin-menu', 'boastforum_scripts_page', '', 150);
}
add_action('admin_menu', 'boast_forum_admin_menu_option');

function boastforum_scripts_page ()
{
    if (array_key_exists('submit_scripts', $_POST)) {
        update_option('bf_header_script', $_POST['header_script']);
        update_option('bf_footer_script', $_POST['footer_script']);

        ?>

        <div id="setting-error-settings_updated" class="udpated settings-error notice is-dismissible">
            <strong>Scripts has been updated!</strong>
        </div>

        <?php
    }
    $header_script = get_option('bf_header_script', 'aa');
    $footer_script = get_option('bf_footer_script', 'aa');

    ?>
    
    <div class="wrap">
        <h2>Update Scripts.</h2>
        <form action="" method="post">
            <div>
                <label for="head">Header Script</label>
                <input type="text" class="large-text" name="header_script" id="head" value="<?= $header_script ?>">
            </div>
            <div>
                <label for="foot">Footer Script</label>
                <input type="text" class="large-text" name="footer_script" id="foot" value="<?= $footer_script ?>">
            </div>
            <div>
                <button type="submit" class="button button-primary" name="submit_scripts">Submit Scripts</button>
            </div>
        </form>
    </div>

    <?php
}

// DISPLAY HEADER SCRIPTS
function boastforum_display_header_scripts()
{
    $header_script = get_option('bf_header_script', 'NOTHING');
    echo $header_script;
}
add_action('wp_head', 'boastforum_display_header_scripts');

// DISPLAY FOOTER SCRIPTS
function boastforum_display_footer_scripts()
{
    $footer_script = get_option('bf_footer_script', 'NOTHING');
    echo $footer_script;
}
add_action('wp_footer', 'boastforum_display_footer_scripts');