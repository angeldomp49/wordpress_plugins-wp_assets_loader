import InputFactory from './InputFactory';
import CSSInput from './CSSInput';
import JSInput from './JSInput';

let inputFactory = new InputFactory();
let cssInput = new CSSInput();
let JSI


inputFactory.addInput( cssInput );

let addNewScriptButton = document.querySelector( '#mt_al_add_new_script_button' );
let addNewStyleButton = document.querySelector( '#mt_al_add_new_style_button' );

addNewScriptButton.addEventListener( 'click', function(){
    inputFactory.addInput( new JSInput() );
}, false );

addNewStyleButton.addEventListener( 'click', function(){
    createInputStyle();
},false );