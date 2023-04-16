function maskJs(value, pattern) {
	let i = 0;
	let v = value.toString();
	v = v.replace(/\D/g, '');
	return pattern.replace(/#/g, () => v[i++] || '');
	}

function aplicar(value){
	const formatado = maskJs(value, '###.###.###-##');								
	document.getElementById('cpf').value = formatado;
										
}
function number(value){
	const numero = maskJs(value, '(##) #####-####');
	document.getElementById('contato').value = numero;
}
function real(value){
	const royal = maskJs(value, '#,##');
	document.getElementById('valor').value = royal;
}