<style type="text/css">
	.content {
		padding: 30px;
		margin: 40px;
		background-color: lightblue;
		text-align: center;
		border-radius: 10px;
	}

	.title {
		font-size: 40px;
		font-style: normal;
	}

	table {
		font-family: Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	table td,
	table th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	table tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	table tr:hover {
		background-color: #ddd;
	}

	table th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}

	.table-container {
		display: flex;
		flex-direction: row;
		justify-content: center;
	}
</style>

<?php
get_header(); ?>
<article class="content">
	<div class="title">
		<?php the_title(); ?>
	</div>
	<br>
	<?php the_content(); ?>
</article>
<?php get_footer(); ?>