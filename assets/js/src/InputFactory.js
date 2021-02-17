import AssetInput from './AssetInput';

class InputFactory{

    addInput( assetInput ){
        assetInput.getParentContainer();
        assetInput.createComponents();
        assetInput.putComponentsToDOM();
    }
}

export default InputFactory;