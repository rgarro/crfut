var Companies = (function(){

  function Companies(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "companies/datatable";
    this.table = {};
  }

  Companies.prototype = Object.create(CRFut.FacturasCR.prototype);
  Companies.prototype.constructor = Companies;

  Companies.prototype.save = function(data){
console.log(data);
  }

  return Companies;
})();

CRFut.AdminModules.Companies = Companies;
