   
    <script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>public/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.bundles.min.js"></script>
    
    <?php if ($this->uri->segment(1)=='equipos') {?>
				<script src="<?= base_url() ?>public/js/equipos.js"></script>
	<?php
		  } ?>	

  </body>

</html>