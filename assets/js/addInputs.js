
function createInputScript(){
    let allInputs = document.querySelectorAll( '.mt_al_input_url_script' );
    let inputsContainer = document.querySelector('.mt_al_input_url_script').parentNode;
    
    let newContainer = document.createElement('div');
    let newInput = document.createElement( 'input' );
    let newContainerButton = document.createElement( 'div' );
    let buttonForRemove = document.createElement( 'button' );
    
    let howManyInputs = allInputs.length;

    newContainer.classList.add("form-control");
    newContainer.classList.add("mt_al_input_url_script");
    
    newInput.id = 'mt_al_script-'+ howManyInputs;
    newInput.name = 'mt_al_stocked_urls_scripts[mt_al_script-'+howManyInputs+']';
    newInput.setAttribute( 'type', 'text' );
    newInput.classList.add( 'col-8' );
    newInput.value = "";
    
    newContainerButton.classList.add( 'col-4' );
    
    buttonForRemove.classList.add( 'btn' ); 
    buttonForRemove.classList.add( 'btn-lg' ); 
    buttonForRemove.classList.add( 'btn-danger' ); 
    buttonForRemove.classList.add( 'mt_al_btn_remove_input' ); 
    buttonForRemove.appendChild( document.createTextNode( 'Borrar' ) );
    
    newContainerButton.appendChild(buttonForRemove);
    newContainer.appendChild(newInput);
    newContainer.appendChild(newContainerButton);
    
    inputsContainer.appendChild(newContainer);
}
function createInputStyle(){
    let allInputs = document.querySelectorAll( '.mt_al_input_url_style' );
    let inputsContainer = document.querySelector('.mt_al_input_url_style').parentNode;
    
    let newContainer = document.createElement('div');
    let newInput = document.createElement( 'input' );
    let newContainerButton = document.createElement( 'div' );
    let buttonForRemove = document.createElement( 'button' );
    
    let howManyInputs = allInputs.length;

    newContainer.classList.add("form-control");
    newContainer.classList.add("mt_al_input_url_style");
    
    newInput.id = 'mt_al_styles-'+ howManyInputs;
    newInput.name = 'mt_al_stocked_urls_styles[mt_al_script-'+howManyInputs+']';
    newInput.setAttribute( 'type', 'text' );
    newInput.classList.add( 'col-8' );
    newInput.value = "";
    
    newContainerButton.classList.add( 'col-4' );
    
    buttonForRemove.classList.add( 'btn' ); 
    buttonForRemove.classList.add( 'btn-lg' ); 
    buttonForRemove.classList.add( 'btn-danger' ); 
    buttonForRemove.classList.add( 'mt_al_btn_remove_input' ); 
    buttonForRemove.appendChild( document.createTextNode( 'Borrar' ) );
    
    newContainerButton.appendChild(buttonForRemove);
    newContainer.appendChild(newInput);
    newContainer.appendChild(newContainerButton);
    
    inputsContainer.appendChild(newContainer);
}

let addNewScriptButton = document.querySelector( '#mt_al_add_new_script_button' );
let addNewStyleButton = document.querySelector( '#mt_al_add_new_style_button' );

addNewScriptButton.addEventListener( 'click', function(){
    createInputScript();
}, false );

addNewStyleButton.addEventListener( 'click', function(){
    createInputStyle();
},false );