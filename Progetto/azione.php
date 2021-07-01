
<script type='text/javascript'>
			function SubmitForm()
			{
				if(document.forms['contactus'].onsubmit())
				{
					showResultDiv();
					document.forms['contactus'].action='NuovoNodo.py';
					document.forms['contactus'].target='frame_result1';
					document.forms['contactus'].submit();

					document.forms['contactus'].action='upload_file.php';
					document.forms['contactus'].target='frame_result2';
					document.forms['contactus'].submit();

				}
				return true;
			}
			
		</script>
		