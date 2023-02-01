require('jquery');
var tooltip = require('tooltip')
var config  = {
  showDelay: 100,
  style: {
    padding: 5
  }
}
 
tooltip(config);
function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        //console.log(haystack[i]+ ' | '+needle)
        if(haystack[i] == needle){
            return true;           
        } 
    }
    //return false;
}
document.addEventListener('livewire:load', () => {
    Livewire.on('collapse', function (tipo,cod) {
        var objeto = tipo+'-'+cod;
        var elemento = document.getElementById(objeto)
        elemento.classList.add('show');
    });
    Livewire.on('filterAreaDoConhecimento',function(filter=false){        
        console.log(filter.length);
        var card = document.getElementsByClassName('filter-area-conhecimento');        
        if(filter.length > 0){            
            if(card){
                var total = card.length;
                let search;
                var length = filter.length;
                for(let i = 0; i< total ; i++){ 
                    for(var k = 0; k < length; k++) {
                        //console.log(haystack[i]+ ' | '+needle)
                        if(filter[k] == card[i].dataset.areaconhecimento){
                            search =  true;           
                        } 
                    } 
                    if(search){                         
                        card[i].classList.remove('d-none');                        
                    }
                    else{                        
                        card[i].classList.add('d-none');
                    }
                    search = false;
                }
            }
        }else{   
            
            if(card){
                var total = card.length;
                for(let i = 0; i< total ; i++){                    
                    card[i].classList.remove('d-none');
                }
                
                
            }
        }


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