require('jquery');
var tooltip = require('tooltip')
var config  = {
  showDelay: 100,
  style: {
    padding: 5
  }
}
 
tooltip(config);

document.addEventListener('livewire:load', () => {
    Livewire.on('collapse', function (tipo,cod) {
        var objeto = tipo+'-'+cod;
        var elemento = document.getElementById(objeto)
        elemento.classList.add('show');
    });
    
    
  

})

//import WOW from 'wowjs'
/*
window._ = require('lodash');
//const WOW = require('wowjs');

window.wow = new WOW.WOW({
    live: false
});

window.wow.init();*/