var restaurantBellSnd ="restaurantBellSnd";
var errSnd = "errSnd";
var changeRouteSnd = "changeRouteSnd";
//createjs.Sound.registerSound("/css/alarm_beep.wav", notySnd);
createjs.Sound.registerSound("wavs/buzzer3_x.wav", errSnd);
createjs.Sound.registerSound("wavs/221515__alaskarobotics__service-bell-ring.wav", restaurantBellSnd);
createjs.Sound.registerSound("wavs/Mechanic-Public_D-139_hifi.mp3", changeRouteSnd);

var FacturasCR = (function(){

  function FacturasCR(){}

  FacturasCR.prototype.parentVars = function(){
    //this.baseUrl = "http://localhost:8766/";
    this.baseUrl = "http://crfut.com/";
  }

  FacturasCR.UrlVars = function() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
    });
    return vars;
  }


  FacturasCR.prototype.alert_warning = function(msg){
    var s = createjs.Sound.play(restaurantBellSnd);
    s.volume = 0.05;
    new Noty({
      text: msg,
      type:"warning",
      theme:"relax",
      layout:"topCenter",
      timeout:2000,
      sounds:{
        sources:["/css/alarm_beep.wav"]
      }
    }).show();
  }

  FacturasCR.prototype.alert_error = function(msg){
    var s = createjs.Sound.play(errSnd);
    s.volume = 0.05;
    new Noty({
      text: msg,
      type:"error",
      theme:"relax",
      layout:"topCenter",
      timeout:2000,
      sounds:{
        sources:["/css/alarm_beep.wav"]
      }
    }).show();
  }

  FacturasCR.prototype.alert_success = function(msg){
    var s = createjs.Sound.play(restaurantBellSnd);
    s.volume = 0.05;
    new Noty({
      text: msg,
      type:"success",
      theme:"relax",
      layout:"topCenter",
      timeout:2000,
      sounds:{
        sources:["/css/alarm_beep.wav"]
      }
    }).show();
  }

  FacturasCR.prototype.modelErrors = function(errObj){
    for (var err in errObj){
      var oeb = errObj[err];
      for(var oe in oeb){
        this.alert_error(err + " " + oe + " " + oeb[oe]);
      }
    }
  }

  FacturasCR.prototype.checkTimedOut = function(data){
      if(data.is_timed_out == 1){
        window.location = "index.html";
      }
  }

  FacturasCR.prototype.verifyTokenizedRequest = function(data){
    if(data.token_is_absent ==1){
      this.alert_error(translate('AbsentToken'));
        window.location = "index.html";
    }
     if(data.token_is_expired ==1){
       this.alert_error(translate('SesExpired'));
         window.location = "index.html";
     }
  }

  FacturasCR.prototype.getTimeStamp = function(){
    //dates
    var dateO = new Date();
    var month = "";
    if(dateO.getMonth() < 9){
      month = "0" + (dateO.getMonth() + 1);
    }else{
      month =  dateO.getMonth() + 1;
    }
    var day = "";
    if(dateO.getDate() < 9){
      day = "0" + (dateO.getDate() + 1);
    }else{
      day =  dateO.getDate() + 1;
    }
    var hours = "";
    if(dateO.getHours() < 9){
      hours = "0" + dateO.getHours();
    }else{
      hours =  dateO.getHours();
    }
    var minutes = "";
    if(dateO.getMinutes() < 9){
      minutes = "0" + dateO.getMinutes();
    }else{
      minutes =  dateO.getMinutes();
    }
    var seconds = "";
    if(dateO.getSeconds() < 9){
      seconds = "0" + dateO.getSeconds();
    }else{
      seconds =  dateO.getSeconds();
    }
    var entered = dateO.getFullYear() + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
    return entered;
  }

  return FacturasCR;
})();
CRFut.FacturasCR = FacturasCR;
