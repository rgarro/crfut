var Login = (function(){

  function Login(){
    this.parentVars();
    //this.authUrl = this.baseUrl + "users/auth";
    this.authUrl = this.baseUrl + "contester/test_service";
  }

  Login.prototype = Object.create(CRFut.FacturasCR.prototype);
  Login.prototype.constructor = Login;

  Login.prototype.submitAuth = function(data){
    data.password = SHA1(data.password);
    $.ajax({
      url:this.authUrl,
      data:data,
      type:"GET",
      dataType:"json",
      success:(function(data){
        console.log(this.authUrl);
        console.log(data);
        this.alert_success("se conecto al tester ...");
        /*CRContactos_Manager.check_errors(data);
        if(data.invalid_form == 1){
          CRContactos_Manager.noty_form_errors(data.error_list);
        }
        if(data.is_success == 1){
          var n = noty({text: data.flash,layout:'topLeft',type:'success','timeout':5000});
          Clientes.lista();
        }*/
      }).bind(this)
    });
  }

  return Login;
})();
CRFut.Login = Login;
