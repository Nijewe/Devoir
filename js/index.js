$(function(){
        var buttons = document.querySelectorAll('#v-pills-tab > button'),
                button = document.querySelector('#v-pills-tab .active')
                tabs = document.querySelectorAll('#v-pills-tabContent > div'); 
                tab = document.querySelector('#v-pills-tabContent .active');
                
        function active_link(){
                var active = localStorage.getItem('active');  
                if(active){
                        for(let i=0; i < buttons.length; i++){
                                buttons[i].classList.remove('active'); 
                                tabs[i].classList.remove('show'); 
                                tabs[i].classList.remove('active'); 
                        }
                        buttons[active].classList.add('active'); 
                        tabs[active].classList.add('show'); 
                        tabs[active].classList.add('active'); 
                }
                else{
                        buttons[0].classList.add('active'); 
                        tabs[0].classList.add('show'); 
                        tabs[0].classList.add('active'); 
                }
        }

        for(let i=0; i < buttons.length; i++){
                buttons[i].addEventListener('click', function(event){
                        localStorage.setItem('active', i); 
                }); 
        }
        window.addEventListener('load', active_link); 

}); 
