var Login = (function(){

  function Login(){
    this.parentVars();
    this.authUrl = this.baseUrl + "login/auth";
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
        this.checkTimedOut(data);        
        if(data.invalid_form == 1){
          this.alert_warning(data.flash);
        }else{
          this.alert_success(data.flash);
          Cookies.set('Session', data.Session);
          Cookies.set('User', data.User);
          Cookies.set('token', data.token);
          window.location = "dashboard.html";
        }
      }).bind(this)
    });
  }

  return Login;
})();
CRFut.Login = Login;
