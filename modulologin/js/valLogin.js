 var frmvalidator  = new Validator("myform");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("login","req","Por favor introduzca su usuario");

	
	frmvalidator.addValidation("password","req","Por favor introduzca su contrasenya");









