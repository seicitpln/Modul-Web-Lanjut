
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$('.btn-edit').on('click', function(){
		$.ajax({
			url: "<?= BASE_URL.'home/getId/'?>"+$(this).attr('data'),
			type: 'get',
			dataType: 'json',
			// data:{'id': $(this).attr('data')},
			success: function (result) {
				console.log(result);
				$('.name').val(result.name);
				$('.price').val(result.price);
				$('.deskripsi').html(result.description);
				$('.edit').attr('action', '<?= BASE_URL.'home/edit/'?>'+result.product_id);
			}
		});
	});
</script>
</body>
</html>