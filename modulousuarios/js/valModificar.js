var frmvalidator  = new Validator("myform");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("idd","req","Por favor introduzca su usuario");
    frmvalidator.addValidation("idd","minlength=4","La minima longitud permitida es 4 caracteres");
	frmvalidator.addValidation("idd","maxlen=30","La maxima longitud permitida es 30 caracteres");
	
	frmvalidator.addValidation("pass","req","Por favor introduzca su contrasena");
	frmvalidator.addValidation("pass","minlength=4","La minima longitud permitida es 4 caracteres");
	frmvalidator.addValidation("pass","maxlen=30","La maxima longitud permitida es 30 caracteres");
	
	frmvalidator.addValidation("nombre","req","Por favor introduzca su nombre");
	frmvalidator.addValidation("nombre","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("nombre","maxlen=30","Debe tener como maximo 30 caractereses alfanumericos");	

	frmvalidator.addValidation("apellido1","req","Por favor introduzca su primer apellido");
	frmvalidator.addValidation("apellido1","alphabetic","Solo se aceptan caractereses alfabeticos");
	frmvalidator.addValidation("apellido1","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("apellido1","maxlen=30","La maxima longitud permitida es 30 caracteres");

	frmvalidator.addValidation("apellido2","req","Por favor introduzca su segundo apellido");
	frmvalidator.addValidation("apellido2","alphabetic","Solo se aceptan caractereses alfabeticos");
	frmvalidator.addValidation("apellido2","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("apellido2","maxlen=30","La maxima longitud permitida es 30 caracteres");

	frmvalidator.addValidation("edad","req","Por favor introduzca su edad");
	frmvalidator.addValidation("edad","numeric","Solo se aceptan caractereses numericos");
	frmvalidator.addValidation("edad","minlength=1","La minima longitud permitida es 1 caracteres");
	frmvalidator.addValidation("edad","maxlen=2","La maxima longitud permitida es 2 caracteres");
	
	frmvalidator.addValidation("direccion","req","Por favor introduzca su direccion");
	frmvalidator.addValidation("direccion","minlength=4","La minima longitud permitida es 4 caracteres");
	frmvalidator.addValidation("direccion","maxlen=40","La maxima longitud permitida es 40 caracteres");

	frmvalidator.addValidation("telefono","req","Por favor introduzca su telefono");
	frmvalidator.addValidation("telefono","numeric","Solo se aceptan caractereses numericos");
	frmvalidator.addValidation("telefono","minlength=9","Debe de tener 9 careacteres numericos");
	frmvalidator.addValidation("telefono","maxlen=9","Debe de tener 9 careacteres numericos");

	frmvalidator.addValidation("dni","req","Por favor introduzca su dni");
	frmvalidator.addValidation("dni","alphanumeric","Solo se aceptan caractereses alfanumericos");
	frmvalidator.addValidation("dni","minlength=9","Debe de tener 9 careacteres alfanumericos");
	frmvalidator.addValidation("dni","maxlen=9","Debe de tener 9 careacteres alfanumericos");
	
    frmvalidator.addValidation("email","req", "Por favor introduzca su email");
	frmvalidator.addValidation("email","maxlen=50");
    frmvalidator.addValidation("email","email");
    
	frmvalidator.addValidation("confemail","req", "Por favor repita su email");
	frmvalidator.addValidation("confemail","eqelmnt=email","La confirmacion del email no es valida");








