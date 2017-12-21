var Companies = (function(){

  function Companies(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "companies/datatable";
    this.table = {};
    this.saveUrl = this.baseUrl + "companies/save";
    this.BaseLogoUrl = this.baseUrl + "files/cialogos/";
  }

  Companies.prototype = Object.create(CRFut.FacturasCR.prototype);
  Companies.prototype.constructor = Companies;

  Companies.prototype.save = function(data){

  }

  Companies.prototype.delete = function(data){
    console.log(data);
  }

  Companies.prototype.getLogoUrl = function(CompanyID,Logo){
    return this.BaseLogoUrl + CompanyID + "/" + Logo;
  }

  return Companies;
})();

CRFut.AdminModules.Companies = Companies;
