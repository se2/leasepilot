var MaskManagerInterface = (function(){

	function MaskInterface(mask, data){
		this._mask = mask;
		this._data = data;
	}
	Object.defineProperty(MaskInterface.prototype, 'maskPath', {
        get: function(){
                if(this._mask.prop.k){
                    this._mask.prop.getValue();
                }
                return this._mask.prop;
            }
        });

	var MaskManager = function(maskManager, elem){
		var _maskManager = maskManager;
		var _elem = elem;
		var _masksInterfaces = createSizedArray(maskManager.viewData.length);
		var i, len = maskManager.viewData.length;
		for(i = 0; i < len; i += 1) {
			_masksInterfaces[i] = new MaskInterface(maskManager.viewData[i], maskManager.masksProperties[i]);
		}

		var maskFunction = function(name){
			i = 0;
		    while(i<len){
		        if(maskManager.masksProperties[i].nm === name){
		            return _masksInterfaces[i];
		        }
		        i += 1;
		    }
		};
		return maskFunction;
	};
	return MaskManager;
}());
