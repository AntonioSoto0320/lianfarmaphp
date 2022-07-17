window.addEventListener('load',()=>{

//login del administrador

//vamos a recuperar el formulario 

let formulario = document.getElementById('formulario');
let alertaDiv=document.getElementById('alert');

function data(){
    
    console.log('me diste un click')

    let datos = new FormData(formulario);

    console.log(datos.get('user'))
    console.log(datos.get('passwordd'))
    

    fetch('http://localhost:80/lianfarma/administrador/manejo_login.php',{
        method:'POST',
        body:datos

    }).then(resp => resp.json())
    .then(({respuestaLoginAdmin}) => {
        if(respuestaLoginAdmin===1){
            location.href='http://localhost:80/lianfarma/administrador/inicio.php';
        }else if(respuestaLoginAdmin===0){
            alerta();
        }
        
    });  
 
}


function alerta(){

    alertaDiv.innerHTML = "<div class='alert alert-danger' role='alert'><p>Contraseña o Usuario incorrecto</p></div>";

}


formulario.addEventListener('submit',(e) =>{
    e.preventDefault();
    data();
});



});


