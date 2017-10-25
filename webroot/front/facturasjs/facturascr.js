var restaurantBellSnd ="restaurantBellSnd";
var errSnd = "errSnd";
//createjs.Sound.registerSound("/css/alarm_beep.wav", notySnd);
createjs.Sound.registerSound("wavs/buzzer3_x.wav", errSnd);
createjs.Sound.registerSound("wavs/221515__alaskarobotics__service-bell-ring.wav", restaurantBellSnd);

var FacturasCR = (function(){

  function FacturasCR(){}

  FacturasCR.prototype.parentVars = function(){
    //this.baseUrl = "http://localhost:8766/";//bin/cake
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

  FacturasCR.prototype.checkTimedOut = function(data){
      if(data.is_timed_out == 1){
        window.location = "index.html";
      }
  }

  return FacturasCR;
})();
CRFut.FacturasCR = FacturasCR;
