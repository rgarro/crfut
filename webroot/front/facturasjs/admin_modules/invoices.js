var Invoices = (function(){

  function Invoices(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "invoices/datatable";
  }

  Invoices.prototype = Object.create(CRFut.FacturasCR.prototype);
  Invoices.prototype.constructor = Invoices;

  Invoices.prototype.save = function(){

  }

  return Invoices;
})();

CRFut.AdminModules.Invoices = Invoices;
