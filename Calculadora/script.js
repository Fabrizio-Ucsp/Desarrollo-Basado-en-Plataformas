window.onload = function(){
	pantalla=document.getElementById("textoPantalla");
}
NumeroEnPantalla="0"; 
ExisteNumeroEscrito=1;
coma=0;
PrimerNumero=0; 
Operacion="no"; 
function numero(NumeroEscrito) {
	if (NumeroEnPantalla=="0" || ExisteNumeroEscrito==1  ) {
		pantalla.innerHTML=NumeroEscrito;
	    NumeroEnPantalla=NumeroEscrito;
        if (NumeroEscrito==".") { 
		    pantalla.innerHTML="0."; 
		    NumeroEnPantalla=NumeroEscrito; 
		    coma=1; 
		}
	}
	else {
		if (NumeroEscrito=="." && coma==0) {
		    pantalla.innerHTML+=NumeroEscrito;
		    NumeroEnPantalla+=NumeroEscrito;
		    coma=1; 
		}
		else if (NumeroEscrito=="." && coma==1) {} 	 
		else {
			pantalla.innerHTML+=NumeroEscrito;
			NumeroEnPantalla+=NumeroEscrito
		}
	}
   	ExisteNumeroEscrito=0 
}
function operar(s) {
	Igual()
	PrimerNumero=NumeroEnPantalla 
	Operacion=s; 
	alert(s);
	ExisteNumeroEscrito=1; 
}	
function Igual() {
	if (Operacion=="no") { 
		pantalla.innerHTML=NumeroEnPantalla;
	}
	else { 
		sl=PrimerNumero+Operacion+NumeroEnPantalla; 
		Respuesta=eval(sl)
		pantalla.innerHTML=Respuesta 
		NumeroEnPantalla=Respuesta;
		Operacion="no"; 
		ExisteNumeroEscrito=1;
	}
}
function Negativo() { 
    NumeroTemporal=Number(NumeroEnPantalla);
    NumeroTemporal=-NumeroTemporal;
    NumeroEnPantalla=String(NumeroTemporal);
    pantalla.innerHTML=NumeroEnPantalla;
}
function borradoTotal() {
	pantalla.innerHTML=0;
	NumeroEnPantalla="0";
	coma=0;
	PrimerNumero=0
	Operacion="no"
}
function crearbotones() {
    var div = document.getElementById("calc");
    cont=0;
    for (var i=1; i<11; i++) {
        var btn = document.createElement("BUTTON");
        btn.innerHTML = i-1;
        btn.onclick = function() {
        	numero(this.innerText)
        };
        div.appendChild(btn);
    }  
}
function main() {
	crearbotones()
}
