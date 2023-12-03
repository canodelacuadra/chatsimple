const enviar = document.getElementById('submit')
const info= document.getElementById('info');
const divMensajes =document.getElementById("mensajes");

enviar.addEventListener('click',submitMensaje )

document.addEventListener('DOMContentLoaded', ()=>getMensajes())


function submitMensaje() {
    // Obtener el mensaje del usuario y almacenarlo en una variable
    const remitente = document.getElementById("remitente").value;
    const mensaje = document.getElementById("mensaje").value;
 
if (remitente === ''|| mensaje==='') {
      alert('El nombre no puede estar vacío y tiene que haber un mensaje.');
      return false;
    } 
    // Enviar el mensaje al servicio de mensajería.
    fetch("http://localhost/chatsimple/chatserver/set-mensajes.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        remitente:remitente,
        mensaje: mensaje
      }),
    })
      .then((response) => {
       return response.json()
      })
      .then(function(mensajerespuesta){
        console.log(mensajerespuesta)
        // borramos el mensaje escrito en el input
        document.getElementById("mensaje").value='';
        // actualizamos los mensajes
        getMensajes();
      })
      .catch((error) => {
        // Se produjo un error inesperado.
        // Mostrar un mensaje de error.
        console.log(error);
      });
  }
  function getMensajes() {
      fetch('http://localhost/chatsimple/chatserver/get-mensajes.php')
  .then((response) => {
    return response.json()
  })
  .then((mensajes) => {
    // borramos la lista anterior de mensajes
    divMensajes.innerHTML ='';
   // Mostrar los mensajes actualizados en el ul mensajes.
   mensajes.forEach(function(mensaje){
    const li = document.createElement("li");
    li.innerHTML = `<strong>${mensaje.remitente}</strong>: ${mensaje.mensaje}`;
    li.classList.add("mensaje");
    divMensajes.appendChild(li);

  })
  })
  .catch((err) => {
    // Do something for an error here
    console.log(err)
  })
  }
