function verifica(){
    senha = document.getElementById("senha").value;
    forca = 0;
    mostra = document.getElementById("mostra");

	var senha = senha.replace(/\s/g,''); 
	var lowerCase = senha.search(/[a-z]/);
	var upperCase = senha.search(/[A-Z]/);
	var numbers = senha.search(/[0-9]/);
  	var specialChars = senha.search(/[@!#$%&*+=?|-]/);
  	var aLowerCase = senha.split(/[a-z]/);
	var aUpperCase = senha.split(/[A-Z]/);
	var aNumbers = senha.split(/[0-9]/);
  	var aSpecialChars = senha.split(/[@!#$%&*+=?|-]/) ;

    if (senha.length!=0) {
    	if (lowerCase>=0) {forca += 10;}
    	if (upperCase>=0) {forca += 10;} 
    	if (numbers>=0) {forca += 10;}
		if (specialChars>=0) {forca += 10;}

		if (aLowerCase.length>2) {forca += 5;}
		if (aUpperCase.length>2) {forca += 5;}
		if (aNumbers.length>2) {forca += 5;}
		if (aSpecialChars.length>2) {forca += 10;}
	    
	    if (senha.length >= 4) {forca += 5;}
      	if (senha.length >= 6) {forca += 10;}
        if (senha.length > 8) {forca += 20;}
    }
    return mostra_res();
}
function mostra_res(){
    if(forca < 30){
        mostra.innerHTML = '<tr><td background-color="red" width="'+forca+'"></td><td>Fraca </td></tr>';
    }else if((forca >= 30) && (forca < 60)){
        mostra.innerHTML = '<tr><td background-color="yellow" width="'+forca+'"></td><td>Média </td></tr>';;
    }else if((forca >= 60) && (forca < 85)){
        mostra.innerHTML = '<tr><td bgcolor="blue" width="'+forca+'"></td><td>Forte</td></tr>';
    }else{
        mostra.innerHTML = '<tr><td bgcolor="green" width="'+forca+'"></td><td>Excelente</td></tr>';
    }
}
