var FacturasCR = (function(){

  function FacturasCR(){
    this.mesh = null;
    this.gameIsSet = false;
  }

  FacturasCR.prototype.loadModel = function(modelUrl){

  }

  FacturasCR.UrlVars = function() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
    });
    return vars;
  }

  return FacturasCR;
})();
CRFut.FacturasCR = FacturasCR;
