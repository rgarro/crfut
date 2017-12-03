var Users = (function(){

  function Users(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "users/datatable";
    this.AccessLevelsUrl = this.baseUrl + "users/accesslevelsoptions";
    this.AccessLevelOptionsInput = "#userAccessLevelIDInput";
  }

  Users.prototype = Object.create(CRFut.FacturasCR.prototype);
  Users.prototype.constructor = Users;

  Users.prototype.save = function(){

  }

  Users.prototype.getSetAccessLevelOptions = function(){
    $.ajax({
      url:this.AccessLevelsUrl,
      type:"GET",
      dataType:"json",
      success:(function(data){
        console.log(data);
      }).bind(this)
    });
  }

  return Users;
})();

CRFut.AdminModules.Users = Users;
