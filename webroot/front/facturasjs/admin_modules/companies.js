var Companies = (function(){

  function Companies(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "companies/datatable";
    this.table = {};
    this.saveUrl = this.baseUrl + "companies/save";
    this.BaseLogoUrl = this.baseUrl + "files/cialogos/";
    this.deleteUrl = this.baseUrl + "companies/delete";
  }

  Companies.prototype = Object.create(CRFut.FacturasCR.prototype);
  Companies.prototype.constructor = Companies;

  Companies.prototype.save = function(data){

  }

  Companies.prototype.delete = function(data){
    $.ajax({
      url:this.deleteUrl+"?token="+Cookies.get("token"),
      data:data,
      type:"post",
      dataType:"json",
      success:(function(data){
      this.verifyTokenizedRequest(data);
        if(data.is_success == 1){
          this.alert_success(data.flash);
          this.table.ajax.reload();
        }else{
            this.alert_error(data.flash);
            this.modelErrors(data.error_list);
        }
      }).bind(this)
    });
  }

  Companies.prototype.getLogoUrl = function(CompanyID,Logo){
    return this.BaseLogoUrl + CompanyID + "/" + Logo;
  }

  return Companies;
})();

CRFut.AdminModules.Companies = Companies;
