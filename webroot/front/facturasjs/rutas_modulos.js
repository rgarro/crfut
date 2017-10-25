var rutasModulos = (function(){

  function rutasModulos(){
    this.parentVars();
    this.router = "";
  }

  rutasModulos.prototype = Object.create(CRFut.FacturasCR.prototype);
  rutasModulos.prototype.constructor = rutasModulos;

  rutasModulos.prototype.loadStage = function(stage_url){
    var s = createjs.Sound.play(changeRouteSnd);
    s.volume = 0.03;
    $("#centerContent").html("<i class='fa fa-truck'></i> <i class='fa fa-spinner fa-pulse'></i> ...");
    $.ajax({
      url:stage_url,
      type:"GET",
      success:function(data){
        $("#centerContent").html(data);
      }
    });
  }

  rutasModulos.prototype.initRoutes = function(){
    //begin routes
  	this.router = new Route32({
          'automatic':true
    });

    this.router.add('#/Dashboard/',(function(){
      this.loadStage("modules/dashboard.html");
  	}).bind(this));

  }

  return rutasModulos;
})();
CRFut.rutasModulos = rutasModulos;
