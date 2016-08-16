</content>
<footer>
	<div class="ui container">
		<div class="ui center aligned container">
			<div class="ui stackable grid">
	<div class="four wide column logo-footer">
		<a href="<?php echo site_url('app'); ?>">
<img src="<?php echo asset_url();?>images/logo.png" alt="" />
</a>
</div>
	<div class="eight wide column">
<div class="ui horizontal inverted small divided link list menu-footer">
	<a class="item" onclick="modal_termos()">Termos de Uso</a>
	<a class="item" onclick="modal_politica()">Política de Privacidade</a>
	<a class="item" href="<?php echo site_url('app/perguntas_frequentes'); ?>">Perguntas Frequentes</a>
	<a class="item" href="mailto:contato@lavamosnos.co">Contato</a>
</div>
</div>
	<div class="four wide column">
<ul class="social">
<li><a href=""><i class="facebook icon"></i></a></li>
<li><a href=""><i class="twitter icon"></i></a></li>
<li><a href=""><i class="whatsapp icon"></i></a></li>
<li><a href=""><i class="instagram icon"></i></a></li>
</ul>
</div>
</div>
</div>
	<div class="copyright">
			<p>© 2016 LavamosNós. Todos os direitos reservados</p>
	</div>
</div>
</footer>


<div class="ui modal termos">
  <div class="header">Termos de Uso</div>
  <div class="content">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet in lectus ut efficitur. Vivamus sit amet metus enim. Nulla id faucibus eros, in convallis lacus. Proin pharetra accumsan nibh laoreet pellentesque. Aliquam ullamcorper aliquam egestas. Pellentesque tempus lacus tellus, id volutpat arcu facilisis sed. In at ex posuere, commodo eros eget, porta sapien. Nullam laoreet tellus odio, vitae rutrum libero suscipit a. Cras justo nibh, egestas ac erat eu, bibendum volutpat nisi. Suspendisse sed porttitor purus, sed consectetur arcu. Duis id malesuada sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
	</p>
			<p>
		Proin at neque eget eros aliquet imperdiet ac eget lectus. Suspendisse accumsan erat vitae volutpat ultricies. Nulla auctor enim quis dolor lobortis, a varius nisl tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris placerat felis et feugiat mollis. Nunc mattis rhoncus lacinia. Fusce efficitur ex sapien, at tempus odio semper volutpat. Praesent ac risus ante. Nam sodales neque a fringilla ultricies.
	</p>
			<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie tempor lacinia. Nulla sagittis luctus ipsum, ut elementum erat semper in. Quisque vel condimentum arcu. In suscipit arcu eu nunc vestibulum, a hendrerit lacus tempor. Integer sed est efficitur, placerat risus vitae, luctus nulla. Nullam vulputate semper sodales.
	</p>
  </div>
  <div class="actions">
    <button class="ui positive right labeled icon button">
      Entendi
<i class="checkmark icon"></i>
    </button>
  </div>
</div>



<div class="ui modal politica">
  <div class="header">Política de Privacidade</div>
  <div class="content">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet in lectus ut efficitur. Vivamus sit amet metus enim. Nulla id faucibus eros, in convallis lacus. Proin pharetra accumsan nibh laoreet pellentesque. Aliquam ullamcorper aliquam egestas. Pellentesque tempus lacus tellus, id volutpat arcu facilisis sed. In at ex posuere, commodo eros eget, porta sapien. Nullam laoreet tellus odio, vitae rutrum libero suscipit a. Cras justo nibh, egestas ac erat eu, bibendum volutpat nisi. Suspendisse sed porttitor purus, sed consectetur arcu. Duis id malesuada sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
	</p>
			<p>
		Proin at neque eget eros aliquet imperdiet ac eget lectus. Suspendisse accumsan erat vitae volutpat ultricies. Nulla auctor enim quis dolor lobortis, a varius nisl tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris placerat felis et feugiat mollis. Nunc mattis rhoncus lacinia. Fusce efficitur ex sapien, at tempus odio semper volutpat. Praesent ac risus ante. Nam sodales neque a fringilla ultricies.
	</p>
			<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie tempor lacinia. Nulla sagittis luctus ipsum, ut elementum erat semper in. Quisque vel condimentum arcu. In suscipit arcu eu nunc vestibulum, a hendrerit lacus tempor. Integer sed est efficitur, placerat risus vitae, luctus nulla. Nullam vulputate semper sodales.
	</p>
  </div>
  <div class="actions">
    <button class="ui positive right labeled icon button">
      Entendi
<i class="checkmark icon"></i>
    </button>
  </div>
</div>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='https://www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>
<script src="<?php echo asset_url();?>js/vendor.js"></script>
<script src="<?php echo asset_url();?>js/jquery.mask.js"></script>
<script src="<?php echo asset_url();?>js/jquery.input-stepper.js"></script>
<script src="<?php echo asset_url();?>js/semantic.min.js"></script>
<script src="<?php echo asset_url();?>js/main.js"></script>
</body>
</html>
