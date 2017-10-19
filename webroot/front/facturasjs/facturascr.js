var FacturasCR = (function(){

  function FacturasCR(){

  }

  FacturasCR.prototype.p = function(){
    this.baseUrl = "http://localhost:8000/";
    //this.baseUrl = "http://crfut.com/";
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
