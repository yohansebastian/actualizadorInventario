function autocompletar(){
    const inputnombre=document.querySelector('#nombre');
    let indexFocus= -1;

    inputnombre.addEventListener('input',function(){
        const nombre = this.value;

        if(!nombre) return false;
        cerrarLista();
        // Lista de referencias
        const divList = document.createElement('div');
        divList.setAttribute('id',this.id + '-lista-autocompletar');
        divList.setAttribute('class','listaAutocompletarNombres');
        this.parentNode.appendChild(divList);

        // conexion a base de datos de

        httpRequest('controller.php?nombre='+ nombre,function(){
            //console.log(this.responseText);
           const arreglo = JSON.parse(this.responseText);
            //console.log(arreglo);
            // Validar el arreglo vs el input
            if(arreglo.length == 0 ) return false;
            arreglo.forEach(item => {
                if(item.substr(0,nombre.length)==nombre){
                const elementoLista = document.createElement('div');
                elementoLista.innerHTML = `<strong>${item.substr(0,nombre.length)}</strong>${item.substr(nombre.length)}`;
                elementoLista.addEventListener('click',function(){
                    inputnombre.value = this.innerText;
                        cerrarLista();
                    return false;
                })
                divList.appendChild(elementoLista);
                }
            });
        });

 
    });
    inputnombre.addEventListener('keydown', function(e){
        const divList = document.querySelector('#' + this.id + '-lista-autocompletar');
        let items;

        if(divList){
            items = divList.querySelectorAll('div'); 

            switch (e.keyCode) {
                case 40: //abajo
                    indexFocus++;
                    if(indexFocus > items.length-1) indexFocus = items.length - 1;
                    break;
                case 38: //arriba
                    indexFocus--;
                    if(indexFocus < 0) indexFocus = 0;
                    break;
                case 13: //enter
                    e.preventDefault();
                    items[indexFocus].click();
                    indexFocus = -1;
                    break;
                default:
                    break;
            }
            seleccionar(items, indexFocus);
            return false;
        }
    });

    document.addEventListener('click', function(){
        cerrarLista();
    })
}

function seleccionar(items, indexFocus){
    if(!items || indexFocus == -1) return false;
    items.forEach(x =>{x.classList.remove('autocompletarActivo')});
    items[indexFocus].classList.add("autocompletarActivo");
}

function cerrarLista(){
    const items = document.querySelectorAll ('.listaAutocompletarNombres');
    items.forEach(item=>{
        item.parentNode.removeChild(item);
    });
    indexFocus=-1;
}

function httpRequest(url,callback){
    const http= new XMLHttpRequest();
    http.open('GET',url);
    http.send();

    http.onreadystatechange= function(){
        if(this.readyState==4 && this.status==200){
            callback.apply(http);
        }
    }
}

autocompletar();    