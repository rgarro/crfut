var Clients = (function(){

  function Clients(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "clients/datatable";
  }

  Clients.prototype = Object.create(CRFut.FacturasCR.prototype);
  Clients.prototype.constructor = Clients;

  Clients.prototype.save = function(){

  }

  return Clients;
})();

CRFut.AdminModules.Clients = Clients;
