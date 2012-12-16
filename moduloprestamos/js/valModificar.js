var frmvalidator  = new Validator("myform");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("idd","req","Por favor introduzca su usuario");
    //frmvalidator.addValidation("usuario","minlength=8","La mimima longitud permitida es 8 digitos");
	//frmvalidator.addValidation("usuario","maxlen=10","La maxima longitud permitida es 10 digitos");
	
	frmvalidator.addValidation("pass","req","Por favor introduzca su contrasenya");
	//frmvalidator.addValidation("password","minlength=8","La mimima longitud permitida es 8 digitos");
	//frmvalidator.addValidation("password","maxlen=10","La maxima longitud permitida es 10 digitos");
	
	frmvalidator.addValidation("nombre","req","Por favor introduzca su nombre");
	//frmvalidator.addValidation("nombre","minlength=9","Debe tener 9 caracteres alfanumericos");
	//frmvalidator.addValidation("nombre","maxlen=9","Debe tener 9 caracteres alfanumericos");

	frmvalidator.addValidation("apellido1","req","Por favor introduzca su primer apellido");
	frmvalidator.addValidation("apellido1","alphabetic","Solo se aceptan caracteres alfabeticos");
	//frmvalidator.addValidation("apellido1","maxlen=10","La mimima longitud permitida es 8 digitos");
	//frmvalidator.addValidation("apellido1","minlength=8","La maxima longitud permitida es 10 digitos");

	frmvalidator.addValidation("apellido2","req","Por favor introduzca su segundo apellido");
	frmvalidator.addValidation("apellido2","alphabetic","Solo se aceptan caracteres alfabeticos");
	//frmvalidator.addValidation("apellido2","minlength=8","La mimima longitud permitida es 8 digitos");
	//frmvalidator.addValidation("apellido2","maxlen=10","La maxima longitud permitida es 10 digitos");

	frmvalidator.addValidation("edad","req","Por favor introduzca su edad");
	frmvalidator.addValidation("edad","numeric","Solo se aceptan caracteres numericos");
	//frmvalidator.addValidation("edad","minlength=1","La mimima longitud permitida es 1 digitos");
	//frmvalidator.addValidation("edad","maxlen=2","La maxima longitud permitida es 2 digitos");
	
	frmvalidator.addValidation("direccion","req","Por favor introduzca su direccion");
	frmvalidator.addValidation("direccion","alphabetic","Solo se aceptan caracteres alfabeticos");
	//frmvalidator.addValidation("direccion","minlength=8","La mimima longitud permitida es 8 digitos");
	//frmvalidator.addValidation("direccion","maxlen=10","La maxima longitud permitida es 10 digitos");


	frmvalidator.addValidation("direccion","req","Por favor introduzca su direccion");
	frmvalidator.addValidation("direccion","alphabetic","Solo se aceptan caracteres alfabeticos");
	//frmvalidator.addValidation("direccion","minlength=8","La mimima longitud permitida es 8 digitos");
	//frmvalidator.addValidation("direccion","maxlen=10","La maxima longitud permitida es 10 digitos");

	frmvalidator.addValidation("telefono","req","Por favor introduzca su telefono");
	frmvalidator.addValidation("telefono","numeric","Solo se aceptan caracteres alfabeticos");
	frmvalidator.addValidation("telefono","minlength=9","Debe de tener 9 careacteres numericos");
	frmvalidator.addValidation("telefono","maxlen=9","Debe de tener 9 careacteres numericos");

	frmvalidator.addValidation("dni","req","Por favor introduzca su dni");
	frmvalidator.addValidation("dni","alphanumeric","Solo se aceptan caracteres alfanumericos");
	frmvalidator.addValidation("dni","minlength=9","Debe de tener 9 careacteres alfanumericos");
	frmvalidator.addValidation("dni","maxlen=9","Debe de tener 9 careacteres alfanumericos");
	
    frmvalidator.addValidation("email","req", "Por favor introduzca su email");
	frmvalidator.addValidation("email","maxlen=50");
    frmvalidator.addValidation("email","email");
    
	frmvalidator.addValidation("confemail","req", "Por favor repita su email");
	frmvalidator.addValidation("confemail","eqelmnt=email","La confirmacion del email no es valida");








