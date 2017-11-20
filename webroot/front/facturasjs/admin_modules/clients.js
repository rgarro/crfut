var Clients = (function(){

  function Clients(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "clients/datatable";
    this.saveUrl = this.baseUrl + "clients/save";
    this.table = {};
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
//console.log(data);
      this.verifyTokenizedRequest(data);
        if(data.is_success == 1){
          this.alert_success(data.flash);
          $('#createClienteModal').modal('hide');
          this.table.ajax.reload();
        }else{
          /*for(var i =0;i<data.errors.length;i++){
            this.alert_error(data.errors[i]);
          }*/
            this.alert_error(data.flash);
        }
      }).bind(this)
    });
  }

  return Clients;
})();

CRFut.AdminModules.Clients = Clients;
