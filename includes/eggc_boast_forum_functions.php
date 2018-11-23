<?php

// Hook to the 'init' action, which is called after WordPress is finished loading the core code
add_action( 'init', 'add_Cookie' );
 
// Set a cookie with the current time of day
function add_Cookie() {
  setcookie("last_visit_time", date("r"), time()+60*60*24*30, "/");
}

// Add dashboard menu and own page.
add_action('admin_menu', 'boast_forum_admin_menu_option');

function boast_forum_admin_menu_option ()
{
    add_menu_page(
        'Boast Forum List Items', // Title of the page
        'Boast Forum', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'boastforum-admin-menu', // The 'slug' - text to display when clicking the link
        'boastforum_setting_page', 
        '', 150
    );
}

function validate($data)
{
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    $data = trim($data);
    return $data;
}

function boastforum_setting_page ()
{
    if (array_key_exists('submit-item', $_POST)) {

        // global $post, $wpdb;

        // $body = array(
        //     'game_name-'. validate($_POST['gameName']),
        //     'date-'. validate($_POST['date']),
        //     'bet-'. validate($_POST['bet']),
        //     'winning-'. validate($_POST['winning']),
        //     'coin-'. validate($_POST['coin']),
        //     'allocation-'. validate($_POST['allocation']),
        //     'imglink-'. $_POST['imgLink'],
        //     'created_at'. date('Y-m-d H:i:s')
        // );

        // $time = current_time('mysql');

        // $data = array(
        //     'comment_post_ID' => $post->ID,
        //     'comment_content' => implode(',', $body),
        //     'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
        //     'comment_date' => $time,
        //     'comment_approved' => 1,
        // );
        // var_dump($data);
        // wp_insert_comment($data);

        ?>

        <!-- <div id="setting-error-settings_updated" class="udpated settings-error notice is-dismissible">
            <strong>List item has been added!</strong>
        </div> -->

        <?php
    }

    include plugin_dir_path(__FILE__) . 'assets/css/styles.php'
    
    ?>

    <div class="wrap eggc-forum">

        <h1>EGGC Boast Forum</h1>

        <button id="myBtn" class="button is-primary">New Item</button>
        <hr>

        <div id="myModal" class="modal">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 style="color: #fff">ADD NEW FORUM ITEM</h2>
                    <span class="close">&times;</span>
                </div>
                
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="field">
                            <label class="label">Game Name</label>
                            <div class="control">
                                <input class="input" name="gameName" type="text" placeholder="Ex. Book of Dead" value="<?= $game_name ?>" required autofocus>
                            </div>
                            <p class="help"></p>
                        </div>
                        <div class="field">
                            <label class="label">Date Created</label>
                            <div class="control">
                                <input class="input" name="date" type="date" placeholder="Ex. 11/19/18" value="<?= $date ?>" required>
                            </div>
                            <p class="help"></p>
                        </div>
                        <div class="field">
                            <label class="label">Bet Amount</label>
                            <div class="control">
                                <input class="input" name="bet" type="number" placeholder="Ex. 2,000" value="<?= $bet ?>" required>
                            </div>
                            <p class="help"></p>
                        </div>
                        <div class="field">
                            <label class="label">Winning Amount</label>
                            <div class="control">
                                <input class="input" name="winning" type="number" placeholder="Ex. 1,000,000" value="<?= $winning ?>" required>
                            </div>
                            <p class="help"></p>
                        </div>
                        <div class="field">
                            <label class="label">Coin Value</label>
                            <div class="control">
                                <input class="input" name="coin" type="number" placeholder="Ex. 2,000" value="<?= $coin ?>" required>
                            </div>
                            <p class="help"></p>
                        </div>
                        <div class="field">
                            <label class="label">Allocation</label>
                            <div class="control">
                                <input class="input" name="allocation" type="number" placeholder="Ex. 5,000" value="<?= $allocation ?>" required>
                            </div>
                            <p class="help"></p>
                        </div>
                        <div class="field">
                            <label class="label">Image Link</label>
                            <div class="control">
                                <input class="input" name="imgLink" type="text" placeholder="Ex. https://domain.com/wp-content/uploads/2018/11/sample.jpg" value="<?= $img_link ?>" required>
                            </div>
                            <p class="help"></p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="submit-item" class="button is-link">Submit</button>
                    </div>
                </form>

            </div>
        </div>
        <hr>

        <?php include plugin_dir_path(__FILE__) . 'assets/js/script.php' ?>

    </div>

    <?php
}

function boastforum_form_submit()
{
    global $post, $wpdb;

    if (array_key_exists('submit-item', $_POST)) {
        $body = array(
            'game_name-'. validate($_POST['gameName']),
            'date-'. validate($_POST['date']),
            'bet-'. validate($_POST['bet']),
            'winning-'. validate($_POST['winning']),
            'coin-'. validate($_POST['coin']),
            'allocation-'. validate($_POST['allocation']),
            'imglink-'. $_POST['imgLink'],
            'created_at'. date('Y-m-d H:i:s')
        );

        // $time = current_time('mysql');

        // $data = array(
        //     'comment_post_ID' => $post->ID,
        //     'comment_content' => implode(',', $body),
        //     'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
        //     'comment_date' => $time,
        //     'comment_approved' => 1,
        // );
        // var_dump($data);
        // wp_insert_comment($data);

        $insertData = $wpdb->get_results("INSERT INTO wp_boast_forum(forum_data, created_at) VALUES('$body')");
    }
}
add_action('wp_head', 'boastforum_form_submit');

// CONTACT FORM
// function boastforum_form ()
// {
//     $content = "";
//     $content .= "<form method='post' action='http://localhost/boast-forum/thank-you/'>";
    
//         $content .= "<input type='text' name='fullname' placeholder='Enter your full name here ..' />";
//         $content .= "<br />";

//         $content .= "<input type='text' name='email' placeholder='Enter your email address here ..' />";
//         $content .= "<br />";

//         $content .= "<input type='number' name='phone_number' placeholder='Enter your phone number here ..' />";
//         $content .= "<br />";

//         $content .= "<textarea name='sms'></textarea>";
//         $content .= "<br />";

//         $content .= "<button type='submit' name='submit_info'>Submit</button>";
//         $content .= "<br />";

//     $content .= "</form>";
//     return $content;
// }
// add_shortcode('boastforum-form', 'boastforum_form');

// function set_html_content_type()
// {
//     return "text/html";
// }

// function validate($data)
// {
//     $data = htmlspecialchars($data);
//     $data = stripcslashes($data);
//     $data = trim($data);
//     return $data;
// }