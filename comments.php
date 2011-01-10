<?php // Do not delete these lines

        if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

                die ('Please do not load this page directly. Thanks!');



        if (!empty($post->post_password)) { // if there's a password

                if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie

                        ?>



                        <p class="nocomments"><?php _e('Enter your password to view comments.'); ?></p>



                        <?php

                        return;

                }

        }



        /* This variable is for alternating comment background */

        $oddcomment = 'class="alt" ';

?>



<!-- You can start editing here. -->

<?php if ($comments) : ?>

<h2 id="comment-header"><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?> for <em><?php the_title(); ?></em></h2>

<?php foreach ($comments as $comment) : ?>

<div class="comment clearfix <?php if ($comment->user_id) echo 'author-comment'; ?>" id="comment-<?php comment_ID() ?>">

            <?php if ($comment->comment_approved == '0') : ?>

                                <em>Your comment is awaiting moderation.</em>

                    <?php endif; ?>

			<?php echo get_avatar( $comment, 48 ); ?>
                    	<p class="comment-details"><?php if ($comment->user_id) echo 'Author comment by '; ?><em><?php comment_author_link() ?></em> | <?php comment_date() ?> at <?php comment_time() ?></p>

                    		

            		<div class="comment-text">

                    		<?php comment_text() ?>

            		</div>

</div>
<div class="clear"></div>

        <?php endforeach; /* end for each comment */ ?>

 <?php else : // this is displayed if there are no comments so far ?>

        <?php if ('open' == $post->comment_status) : ?>

                <p><h3 id="no-comments"><?php _e('No comments yet.'); ?></h3></p>

         <?php endif; ?>


<?php endif; ?>
<!-- comment form -->

<?php if ('open' == $post->comment_status) : ?>

<h2 id="respond"><?php _e('Leave a comment!'); ?></h2>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p class="alert"><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>

<?php else : ?>

<div id="commentform">

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>

<?php else : ?>
<!-- comment author -->

<div id="commentfbconnect"><img src="http://www.sbca.org.uk/wp-content/themes/jq/img/comment-orline.png" /><div id="commentfbconnectbutton"><fb:login-button v="2" size="large" onlogin="window.location.reload(true);">Login with Facebook</fb:login-button></div></div>

<label for="author"><span class="user-name info-icon"><?php _e('Name'); ?><?php if ($req) _e('*'); ?></span></label>

<input type="text" name="author" id="name" class="text" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<!-- commentator's email -->

<label for="email"><span class="user-mail info-icon"><?php _e('Mail');?><?php if ($req) _e('*'); ?> (will not be published)</span></label>

<input type="text" name="email" id="email" class="text" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<!-- commentator's website -->

<label for="url"><span class="user-url info-icon"><?php _e('Website'); ?></span></label>

<input type="text" name="url" id="website" class="text" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />


<?php endif; ?>
<!-- comment text -->

<label for="message"><span class="user-comment info-icon"><?php _e('Comment'); ?></span></label>

<textarea name="comment" id="message" tabindex="4"></textarea>
<!-- submit button -->

<p><input name="submit" type="submit" class="submit" tabindex="5" value="<?php echo attribute_escape(__('Submit Comment')); ?>" /></p>

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>

</form>

</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
