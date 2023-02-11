window._ = require('lodash');
require('jquery');

import Inputmask from 'inputmask';
import Swal from 'sweetalert2';

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 8000,
    timerProgressBar: true,
    Open: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
document.addEventListener('livewire:load', () => {
    Livewire.on('swal', function (message,type,id=null,acTrigger=false) {
        /**
         * message = Mensagem a ser exibieda para o usuário
         * type = Tipo do message
         * id = Se form um aviso de excusão esse é o ID a ser excuido
         * acTrigger = Caso a mensagem a ser exibida precise chamar um função no livewire especifica execute
         */
        console.log(message);
        console.log(type);
        console.log(id);
        Swal.fire({
            icon: type == 'delete' ? 'question' : type,
            text: message,
            showCancelButton: true,
        }).then(function (result) {
            if (result.isConfirmed) {
                if(type=='delete')
                    if(acTrigger){
                        console.log('Entrou: '+acTrigger);
                        livewire.emit(acTrigger,id);
                    }
                    else{
                        console.log('NÃO Entrou: '+acTrigger);
                        livewire.emit('delete',id);

                    }
                else if(type=='question')
                    livewire.emit('confirm')
            }
        })
    });
    Livewire.on('toast', (message,type) => {
        Toast.fire({
            icon: type,
            title: message,
          })      
    });
   

  

})
function telefone()
        {
           
            var phone=$('.telefone');
            let inp = new Inputmask('(99) 9 9999-9999',{
                onBeforeMask: function (value, opts) {
                    if(null === value){
                        value= '*'
                    }
                    return value;
                }
            });
            if(phone.val() != null){
                inp.mask(phone);
            }
        }
