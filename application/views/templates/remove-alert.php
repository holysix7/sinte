
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		setTimeout(function () {
			$('.close').click();
			<?=
				$this->session->set_flashdata('message', ''); ?>
		}, 2000);
	})
</script>