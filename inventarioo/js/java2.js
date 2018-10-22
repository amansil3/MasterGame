function validacion() {
	var z=new Number(0);
	if (document.form.nombre.value.length>=3) {
		z=z+1;
		}
	else {
		document.getElementById("advertencia").innerHTML=" Nombre inválido (Mínimo de 3 caracteres)";
		}
	if(z==1){
		document.form.submit();
		}
}