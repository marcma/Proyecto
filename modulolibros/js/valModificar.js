var frmvalidator  = new Validator("myform");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("titulo","req","Por favor introduzca el titulo");
	frmvalidator.addValidation("titulo","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("titulo","maxlen=45","La maxima longitud permitida es 45 caracteres");
	frmvalidator.addValidation("titulo","alphabetic_space","Solo se aceptan caractereses alfabeticos");
	
	frmvalidator.addValidation("nombreAutor","req","Por favor introduzca el nombre de autor");
	frmvalidator.addValidation("nombreAutor","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("nombreAutor","maxlen=30","La maxima longitud permitida es 30 caracteres");
	frmvalidator.addValidation("nombreAutor","alphabetic_space","Solo se aceptan caractereses alfabeticos");
	
	frmvalidator.addValidation("apellido1Autor","req","Por favor introduzca el primer apellido del autor");
	frmvalidator.addValidation("apellido1Autor","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("apellido1Autor","maxlen=30","Debe tener como maximo 30 caracteres");
	frmvalidator.addValidation("apellido1Autor","alphabetic_space","Solo se aceptan caractereses alfabeticos");	

	frmvalidator.addValidation("apellido2Autor","req","Por favor introduzca el segundo apellido del autor");
	frmvalidator.addValidation("apellido2Autor","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("apellido2Autor","maxlen=30","Debe tener como maximo 30 caracteres");
	frmvalidator.addValidation("apellido2Autor","alphabetic_space","Solo se aceptan caractereses alfabeticos");

	frmvalidator.addValidation("tema","req","Por favor introduzca el tema");
	frmvalidator.addValidation("tema","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("tema","maxlen=30","Debe tener como maximo 30 caractereses alfanumericos");
	frmvalidator.addValidation("tema","alphabetic_space","Solo se aceptan caractereses alfabeticos");

	frmvalidator.addValidation("unidades","req","Por favor introduzca las unidades");
	frmvalidator.addValidation("unidades","numeric","Solo se aceptan caracteres numericos");
	frmvalidator.addValidation("unidades","maxlen=30","La maxima longitud permitida es 30 caracteres");
	
	frmvalidator.addValidation("isbn","req","Por favor introduzca el segundo apellido del autor");
	frmvalidator.addValidation("isbn","minlength=2","La minima longitud permitida es 2 caracteres");
	frmvalidator.addValidation("isbn","maxlen=30","Debe tener como maximo 30 caracteres");	
	
	frmvalidator.addValidation("numPaginas","req","Por favor introduzca el numero de paginas");
	frmvalidator.addValidation("numPaginas","numeric","Solo se aceptan caracteres numericos");
	frmvalidator.addValidation("numPaginas","maxlen=30","La maxima longitud permitida es 30 caracteres");

	//frmvalidator.addValidation("descripcion","req","Por favor introduzca la descripcion");
	//frmvalidator.addValidation("descripcion","minlength=2","La minima longitud permitida es 2 caracteres");
	//frmvalidator.addValidation("descripcion","maxlen=1000","La maxima longitud permitida es 30 caracteres");














