var frmvalidator  = new Validator("myform");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("idd","req","Por favor introduzca su usuario");
    frmvalidator.addValidation("idd","minlength=4","La minima longitud permitida es 4 caracteres");
	
	frmvalidator.addValidation("codLibro","req","Por favor introduzca codigo del libro");
	frmvalidator.addValidation("codLibro","numeric","Solo se aceptan caracteres numericos");

	frmvalidator.addValidation("datepicker","req","Por favor introduzca la fecha del prestamo");









