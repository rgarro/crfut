var Login = (function(){

  function Login(){
    this.parentVars();
    this.authUrl = this.baseUrl + "login/auth";
    this.signoutUrl = this.baseUrl + "/login/signout";
  }

  Login.prototype = Object.create(CRFut.FacturasCR.prototype);
  Login.prototype.constructor = Login;

  Login.prototype.signout = function(){
    var token = Cookies.get('token');
    $.ajax({
      url:this.signoutUrl,
      data:{token:token},
      type:"GET",
      dataType:"json",
      success:(function(data){
          this.alert_success("Login Out ...");
          Cookies.remove('Session');
          Cookies.remove('User');
          Cookies.remove('token');
          window.location = "index.html";
      }).bind(this)
    });
  }

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
