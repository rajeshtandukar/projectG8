
</div>
<script type="text/javascript">


	function validation(){
		var forms = document.forms;
		var frm = forms[0];
		var errorDiv = document.getElementById('error_div'); 
		var errorMessage ='';

		
		if( frm.name.value == ''){
			frm.name.style.border = '1px solid red';
			errorMessage = 'Name can not be left empty<br>';
		}else{
			frm.name.style.border = '1px solid #ccc';
		}


		if(errorMessage==''){
			return true;
		}else{
			errorDiv.innerHTML = errorMessage;
			errorDiv.style.display='block';
			document.getElementById('username').focus();
			return false;
		}


	}


	function validation_bkp(){

		var name = document.getElementById('name');
		var username = document.getElementById('username');
		var password = document.getElementById('password');
		var errorDiv = document.getElementById('error_div'); 
		var errorMessage ='';

		if( name.value == ''){
			name.style.border = '1px solid red';
			errorMessage = 'Name can not be left empty<br>';
		}else{
			name.style.border = '1px solid #ccc';
		}

		if( username.value == ''){
			username.style.border = '1px solid red';
			errorMessage =  errorMessage+ 'Username can not be left empty<br>';
			
		}
		else{
			username.style.border = '1px solid #ccc';
		}


		if( password.value == ''){
			password.style.border = '1px solid red';
			errorMessage += 'Password can not be left empty';
			
		}else{
			password.style.border = '1px solid #ccc';
		}


		if(errorMessage==''){
			return true;
		}else{
			errorDiv.innerHTML = errorMessage;
			errorDiv.style.display='block';
			document.getElementById('username').focus();
			return false;
		}

	}
</script>
</body>
</html>