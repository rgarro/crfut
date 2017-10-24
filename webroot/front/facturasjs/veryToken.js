var VeryToken = (function(){

  function VeryToken(){
    this.parentVars();
    this.veryTokenUrl = this.baseUrl + "login/checksession";
    this.token = "";
    this.token_is_set = false;
    this.session_is_alive = false;
  }

  VeryToken.prototype = Object.create(CRFut.FacturasCR.prototype);
  VeryToken.prototype.constructor = VeryToken;

  VeryToken.prototype.setToken = function(token){
    this.token = token;
    this.token_is_set = true;
  }

  VeryToken.prototype.checksession = function(){
    if(this.token_is_set){
      $.ajax({
        url:this.veryTokenUrl,
        data:{token:this.token},
        type:"GET",
        dataType:"json",
        success:(function(data){          
          //this.checkTimedOut(data);
          if(data.is_alive){
            //this.alert_warning(data.flash);
            this.session_is_alive = true;
          }else{
            this.session_is_alive = false;
            this.alert_success("La Sesion ha finalizado");
            Cookies.remove('Session');
            Cookies.remove('User');
            Cookies.remove('token');
            window.location = "index.html";
          }
        }).bind(this)
      });
    }else{
     this.alert_error("token must be set");
    }
  }

  return VeryToken;
})();
CRFut.VeryToken = VeryToken;
