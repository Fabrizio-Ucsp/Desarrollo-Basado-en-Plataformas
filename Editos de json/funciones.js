function verResultado() {
      var out = document.getElementById("output");
      out.innerHTML = "";
      var table = document.createElement("TABLE");
      var trNombre = document.createElement("TR");
      var trEdad = document.createElement("TR");
      var trCursos = document.createElement("TR");

      table.border = "1";

      var td1 = document.createElement("TD");
      var td2 = document.createElement("TD");
      td1.innerText = "Nombre:";
      td2.innerText = alumno.nombre;
      trNombre.appendChild(td1);
      trNombre.appendChild(td2);

      td1 = document.createElement("TD");
      td2 = document.createElement("TD");
      td1.innerText = "Edad:";
      td2.innerText = alumno.edad;
      trEdad.appendChild(td1);
      trEdad.appendChild(td2);

      td1 = document.createElement("TD");
      td2 = document.createElement("TD");
      td1.innerText = "Cursos:\n\n";

      var ulCursos = document.createElement("UL");
      for (var i=0; i<alumno.cursos.length; i++) {
      	var liCurso = document.createElement("LI");
      	var aCurso = document.createElement("A");
      	
      	var buttonDelete = document.createElement("BUTTON");
      	buttonDelete.type = "button";
        buttonDelete.innerText = " x ";
      	buttonDelete.id = i;
      	buttonDelete.addEventListener("click", function(){
          delCurso(this.id);
        } ,false);

      	aCurso.innerHTML = alumno.cursos[i].nombre;
      	aCurso.href = '#';
      	aCurso.id = i;
      	aCurso.addEventListener("click", function(){
      		showForm(this.id);
      	}, false);

      	liCurso.appendChild(aCurso);
      	liCurso.appendChild(buttonDelete);
      	ulCursos.appendChild(liCurso);
      	liCurso.id = "curso-" + i;
      }
      td2.appendChild(ulCursos);
      trCursos.appendChild(td1);
      trCursos.appendChild(td2);

      table.appendChild(trNombre);
      table.appendChild(trEdad);
      table.appendChild(trCursos);
      out.innerHTML = "";
      out.appendChild(table);
    }

    function mod_Curso(i, cod, nom){
    	alumno.cursos[i].codigo = cod;
    	alumno.cursos[i].nombre = nom;
    	verResultado();
    }

    function delCurso(n){
    	alumno.cursos.splice(n,1)
    	verResultado();
    }

    function showForm(n){
      var out = document.getElementById("output");
      var form = document.createElement("FORM");
      var cuadro = document.createElement("TABLE");
      var titulo = document.createElement("TR");
      var inputCod = document.createElement("INPUT");
      var inputName = document.createElement("INPUT");
      var buttonSubmit = document.createElement("BUTTON");
      var buttonCancel = document.createElement("BUTTON");

      cuadro.border = "1";
      
      var aCod = document.createElement("A"); var aNom =
      document.createElement("A"); var br1 = document.createElement("BR"); var
      br2 = document.createElement("BR"); out.innerHTML = ""; verResultado();

      titulo.innerText = "Editar";
      aCod.innerText = "\nCodigo Curso:\n";
      aNom.innerText = "\n\nNombre Curso:\n";
      inputCod.type = "text";
      inputCod.name = "codigo";
      inputCod.value = alumno.cursos[n].codigo;
      inputName.type = "text";
      inputName.name = "nombre_curso";
      inputName.value = alumno.cursos[n].nombre;

      buttonSubmit.type = "button";
      buttonSubmit.innerText = "Guardar";
      buttonSubmit.addEventListener("click", function(){
      		mod_Curso(n, inputCod.value, inputName.value);
    	}, false);

      buttonCancel.type = "button";
      buttonCancel.innerText = "Cancelar";
      buttonCancel.addEventListener("click", function(){
    		verResultado();
    	}, false);
      cuadro.appendChild(titulo);
      cuadro.appendChild(aCod);
      cuadro.appendChild(inputCod);
      cuadro.appendChild(aNom);
      cuadro.appendChild(inputName);
      cuadro.appendChild(br2);
      cuadro.appendChild(br1);
      cuadro.appendChild(buttonSubmit);
      cuadro.appendChild(buttonCancel);
      form.appendChild(cuadro);
      out.appendChild(form);
    }