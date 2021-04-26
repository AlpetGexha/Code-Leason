<div class="comment-wrapper">
	<div class="comments">
		<?php
		if (!have_comments()) {
			echo "Leave a comments";
		} else {
			get_comments_number() . "Comments";
		}
		?>
	</div>

</div>
<div class="replay">
	<?php
	if (comments_open()) {
		comment_form(array(
			'class_form' => '',
			'title_replay_before' => 'id="replay_title",class="comment_reply_title","title_replay_after"=>""'
		));
	}
	?>
</div>