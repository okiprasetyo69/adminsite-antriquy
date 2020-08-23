
<footer class="main-footer">
	<div class="footer-left">
		<!-- Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> -->
	</div>
	<div class="footer-right">
		<!-- 2.3.0 -->
	</div>
</footer>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>





<!-- JS Libraies -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>


<!-- Template JS File -->
<script src="{{ asset ("/js/override_stisla.js") }}"></script>
<script src="{{ asset ("/js/scripts.js") }}"></script>
<script src="{{ asset ("/js/custom.js") }}"></script>
<!-- <script src="{{ asset ("/js/page/bootstrap-modal.js") }}"></script> -->
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>

<!-- Helper Scripts -->
<script type="text/javascript">
	function IsJsonString(str) {
		try {
			JSON.parse(str);
		} catch (e) {
			return false;
		}
		return true;
	}

	function showLoaderIn(target){
		var loadingElement = '<div class="loader-container text-center">'
        		+ '<div class="loader">'
        		+ '</div>'
        		+ '<div class="loader-text">'
          			+ 'Memproses...'
        		+ '</div>'
			+ '</div>';
		
		target.parent().css("position", "relative");
		target.parent().prepend(loadingElement);
		target.parent().addClass("justify-content-center align-items-center");

		target.css('opacity', '0.5');
		target.children().find("button").attr("disabled", true);
		target.children().find("input").attr("disabled", true);
		target.children().find("select").attr("disabled", true);
	}

	function removeLoaderIn(target){
		target.parent().css("position", "");
		target.parent().children('.loader-container').remove();
		target.parent().removeClass("justify-content-center align-items-center");
		target.css('opacity', '1');
		target.children().find("button").attr("disabled", false);
		target.children().find("input").attr("disabled", false);
		target.children().find("select").attr("disabled", false);
	}
</script>

@yield('pagespecificscripts')

<script type="text/javascript">
	$(document).ajaxStop(function () {
		$('form').on('focus', 'input[type=number]', function (e) {
			$(this).on('wheel.disableScroll', function (e) {
				e.preventDefault()
			})
		})
		$('form').on('blur', 'input[type=number]', function (e) {
			$(this).off('wheel.disableScroll')
		})

		$('.input-nominal').mask('#.##0', {reverse: true});
	});

	$(function(){
		$('form').on('focus', 'input[type=number]', function (e) {
			$(this).on('wheel.disableScroll', function (e) {
				e.preventDefault()
			})
		})
		$('form').on('blur', 'input[type=number]', function (e) {
			$(this).off('wheel.disableScroll')
		})

		$('.input-nominal').mask('#.##0', {reverse: true});
	});

	$(document).change(function(){
		$('.input-nominal').unmask();
		$('.input-nominal').mask('#.##0', {reverse: true});
	});
</script>
