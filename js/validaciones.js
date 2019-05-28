/*Contactenos*/
function valida_contactenos(){


	with(document.getElementById('nombre')){
		
		document.getElementById('t1').style.display='none';
		className="";
		if (value.length==0){ 
		   document.getElementById('t1').style.display='block';
		   className="input-error";
		   focus() 
		   return 0; 
		} 
	}	

	
	with(document.getElementById('email')){

		document.getElementById('t2').style.display='none';
		className="";

		if (value.length==0){ 
		    document.getElementById('t2').style.display='block';
		    className="input-error";
			focus();
		   return 0; 
		} else{
			var RegExPattern = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;   
			if ((value.match(RegExPattern)) && (value!='')) {   
			} else {   
			   document.getElementById('t2').style.display='block';
			   className="input-error";
				focus();
				return 0;
		   }    
		}
	}
	


	with(document.getElementById('telefono')){
		
		document.getElementById('t3').style.display='none';
		className="";
		
		if (value.length==0){ 
			document.getElementById('t3').style.display='block';
			className="input-error";
		   focus() 
		   return 0; 
		}else{
			var RegExPattern = /^\d+/;   
			if ((value.match(RegExPattern)) && (value!='')) {   
			} else {   
				document.getElementById('t3').style.display='block';
				className="input-error";
				focus();
				return 0;
		   } 
		}
	}	


		with(document.getElementById('mensaje')){
			
		document.getElementById('t4').style.display='none';	
		className="";
		
		if (value.length==0){ 
			document.getElementById('t4').style.display='block';
			className="input-error";
		   focus() 
		   return 0; 
		} 
	}


    with(document.contactenos.clave_paso){ 

	document.getElementById('t5').style.display='none';
	className="";	
	
	if (document.contactenos.clave_paso.value.length==0){ 
       
		document.getElementById('t5').style.display='block';	   
	   className="input-error";
	   focus() 
       return 0;
	    
    }else{
		if(document.contactenos.clave_paso.value == document.contactenos.control_paso.value){
			
		} else{
			document.getElementById('t5').style.display='block';
			className="input-error";
			focus()
			return 0;
			}
		 
		}	
	}
	
	
   document.getElementById('contactenos').submit(); 


}


/*Reserva*/
function valida_reserva(){

	with(document.getElementById('fecha')){
		
		document.getElementById('t1').style.display='none';
		className="";
		if (value.length==0){ 
		   document.getElementById('t1').style.display='block';
		   className="input-error";
		   focus() 
		   return 0; 
		} 
	}	


	with(document.getElementById('cantidad')){
		
		document.getElementById('t2').style.display='none';
		className="";
		if (value.length==0){ 
		   document.getElementById('t2').style.display='block';
		   className="input-error";
		   focus() 
		   return 0; 
		} 
	}	

	with(document.getElementById('horario')){
		
		document.getElementById('t3').style.display='none';
		className="";
		if (value.length==0){ 
		   document.getElementById('t3').style.display='block';
		   className="input-error";
		   focus() 
		   return 0; 
		} 
	}	


	with(document.getElementById('nombre')){
		
		document.getElementById('t4').style.display='none';
		className="";
		if (value.length==0){ 
		   document.getElementById('t4').style.display='block';
		   className="input-error";
		   focus() 
		   return 0; 
		} 
	}	

	
	with(document.getElementById('email')){

		document.getElementById('t5').style.display='none';
		className="";

		if (value.length==0){ 
		    document.getElementById('t5').style.display='block';
		    className="input-error";
			focus();
		   return 0; 
		} else{
			var RegExPattern = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;   
			if ((value.match(RegExPattern)) && (value!='')) {   
			} else {   
			   document.getElementById('t5').style.display='block';
			   className="input-error";
				focus();
				return 0;
		   }    
		}
	}
	


	with(document.getElementById('telefono')){
		
		document.getElementById('t6').style.display='none';
		className="";
		
		if (value.length==0){ 
			document.getElementById('t6').style.display='block';
			className="input-error";
		   focus() 
		   return 0; 
		}else{
			var RegExPattern = /^\d+/;   
			if ((value.match(RegExPattern)) && (value!='')) {   
			} else {   
				document.getElementById('t6').style.display='block';
				className="input-error";
				focus();
				return 0;
		   } 
		}
	}	


		with(document.getElementById('mensaje')){
			
		document.getElementById('t7').style.display='none';	
		className="";
		
		if (value.length==0){ 
			document.getElementById('t7').style.display='block';
			className="input-error";
		   focus() 
		   return 0; 
		} 
	}

	
   document.getElementById('reserva').submit(); 


}


/*Consulta*/
function valida_consultas(){


	with(document.getElementById('nombre_c')){
		
		document.getElementById('t1c').style.display='none';
		className="";
		if (value.length==0 | value=='Nombre'){ 
		   document.getElementById('t1c').style.display='block';
		   className="input-error";
		   focus() 
		   return 0; 
		} 
	}	

	
	with(document.getElementById('email_c')){

		document.getElementById('t2c').style.display='none';
		className="";

		if (value.length==0 | value=='Email'){ 
		    document.getElementById('t2c').style.display='block';
		    className="input-error";
			focus();
		   return 0; 
		} else{
			var RegExPattern = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;   
			if ((value.match(RegExPattern)) && (value!='')) {   
			} else {   
			   document.getElementById('t2c').style.display='block';
			   className="input-error";
				focus();
				return 0;
		   }    
		}
	}
	


	with(document.getElementById('telefono_c')){
		
		document.getElementById('t3c').style.display='none';
		className="";
		
		if (value.length==0){ 
			document.getElementById('t3c').style.display='block';
			className="input-error";
		   focus() 
		   return 0; 
		}else{
			var RegExPattern = /^\d+/;   
			if ((value.match(RegExPattern)) && (value!='')) {   
			} else {   
				document.getElementById('t3c').style.display='block';
				className="input-error";
				focus();
				return 0;
		   } 
		}
	}	


		with(document.getElementById('mensaje_c')){
			
		document.getElementById('t4c').style.display='none';	
		className="";
		
		if (value.length==0 | value=='Mensaje'){ 
			document.getElementById('t4c').style.display='block';
			className="input-error";
		   focus() 
		   return 0; 
		} 
	}

	
   document.getElementById('consultas').submit(); 


}


/*Newsletter*/
function valida_new(){


	
	with(document.getElementById('email_n')){

		document.getElementById('t1n').style.display='none';
		className="";

		if (value.length==0){ 
		    document.getElementById('t1n').style.display='block';
		    className="input-error";
			focus();
		   return 0; 
		} else{
			var RegExPattern = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;   
			if ((value.match(RegExPattern)) && (value!='')) {   
			} else {   
			   document.getElementById('t1n').style.display='block';
			   className="input-error";
				focus();
				return 0;
		   }    
		}
	}
	


	
   document.getElementById('new').submit(); 


}