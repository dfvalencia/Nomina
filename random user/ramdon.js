
class Usuarios{
  constructor(card){
    this.card=card;
    this.imagen=card.querySelector(' .card-img-top');
    this.nombre=card.querySelector('.nombre');
    this.apellido=card.querySelector('.apellido');
    this.genero=card.querySelector('.genero');
    this.telefono=card.querySelector('.telefono');
    this.ciudad=card.querySelector('.ciudad');

    this.eliminar=card.querySelector('.eliminar');
  
    this.eliminar.addEventListener('click', () => this.eliminarUsuario());

}
  obtenerUsuario(){
    fetch('https://randomuser.me/api/')
    .then(Response=> Response.json())
    .then(data=>{
      const usuario=data.results[0];
      this.mostarUsuario(usuario);
    })
    .catch(error=>{
      console.log('error al obtener el usuario', error);
    });
  }
  mostarUsuario(usuario){
    this.imagen.src=usuario.picture.large;
    this.nombre.textContent=usuario.name.first;
    this.apellido.textContent=usuario.name.last;
    this.genero.textContent=usuario.gender;
    this.telefono.textContent=usuario.phone;
    this.ciudad.textContent=usuario.location.city;
  }
  eliminarUsuario(){
    this.card.remove();
  }

}

const tarjetas= document.querySelectorAll('.card');
const Usuario1=Array.from(tarjetas).map(tarjeta=> new Usuarios(tarjeta));

Usuario1.forEach(Usuarios=>Usuarios.obtenerUsuario());
const mongoose = require ('mongoose');

mongoose.connect('mongodb://localhost:27017/nombre-de-tu-base-de-datos', { useNewUrlParser: true, useUnifiedTopology: true });

