
var Clients = (function(){

  function Clients(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "clients/datatable";
    this.saveUrl = this.baseUrl + "clients/save";
    this.table = {};
    this.deleteUrl = this.baseUrl + "clients/delete";
  }

  Clients.prototype = Object.create(CRFut.FacturasCR.prototype);
  Clients.prototype.constructor = Clients;

  Clients.prototype.save = function(data){
    $.ajax({
      url:this.saveUrl+"?token="+Cookies.get("token"),
      data:data,
      type:"get",
      dataType:"json",
      success:(function(data){
      this.verifyTokenizedRequest(data);
        if(data.is_success == 1){
          this.alert_success(data.flash);
          $('#createClienteModal').modal('hide');
          this.table.ajax.reload();
        }else{
            this.alert_error(data.flash);
            this.modelErrors(data.error_list);
        }
      }).bind(this)
    });
  }

  Clients.prototype.buildEdit = function(data){

  }

  Clients.prototype.delete = function(data){
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

  return Clients;
})();

CRFut.AdminModules.Clients = Clients;
