import AssetInput from './AssetInput';


class JSInput extends AssetInput{
    getParentContainer(){
        let allInputs = document.querySelectorAll( '.mt_al_input_url_script' );
        let inputsContainer = document.querySelector('.mt_al_input_url_script').parentNode;
    }

    createComponents(){
        let newContainer = document.createElement('div');
        let newInput = document.createElement( 'input' );
        let newContainerButton = document.createElement( 'div' );
        let buttonForRemove = document.createElement( 'button' );
        
        let howManyInputs = allInputs.length;
    }

    componentAttributes(){
        
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
    }

    putComponentsToDOM(){
        buttonForRemove.appendChild( document.createTextNode( 'Borrar' ) );
    
        newContainerButton.appendChild(buttonForRemove);
        newContainer.appendChild(newInput);
        newContainer.appendChild(newContainerButton);
        
        inputsContainer.appendChild(newContainer);
    }
}

export default JSInput;