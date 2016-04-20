
<link rel="stylesheet" href="../css/bootstrap-select.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../js/bootstrap-select.js"></script>

<select class="selectpicker asd" id="slc" data-live-search="true" multiple>
  <option>One</option>
  <option>Two</option>
  <option>Three</option>
  <option>Four</option>
  <option>Five</option>
</select>

				<script>
				$('.asd').val(['One','Two']);
				$('#slc').on('changed.bs.select', function (e) {
					  alert($('#slc').val());
					});
				//$('.selectpicker').selectpicker('selectAll');
				</script>