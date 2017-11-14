var Companies = (function(){

  function Companies(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "companies/datatable";
  }

  Companies.prototype = Object.create(CRFut.FacturasCR.prototype);
  Companies.prototype.constructor = Companies;

  Companies.prototype.save = function(){

  }

  return Companies;
})();

CRFut.AdminModules.Companies = Companies;
