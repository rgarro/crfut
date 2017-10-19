var FacturasCR = (function(){

  function FacturasCR(){}

  FacturasCR.prototype.parentVars = function(){
    //this.baseUrl = "http://localhost:8766/";
    this.baseUrl = "http://crfut.com/";
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
