var Invoices = (function(){

  function Invoices(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "invoices/datatable";
    this.dataCountUrl = this.baseUrl + "invoices/getcount";
  }

  Invoices.prototype = Object.create(CRFut.FacturasCR.prototype);
  Invoices.prototype.constructor = Invoices;

  Invoices.prototype.save = function(){

  }

  return Invoices;
})();

CRFut.AdminModules.Invoices = Invoices;
