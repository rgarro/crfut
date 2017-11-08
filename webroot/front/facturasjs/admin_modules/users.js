var Users = (function(){

  function Users(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "users/datatable";
  }

  Users.prototype = Object.create(CRFut.FacturasCR.prototype);
  Users.prototype.constructor = Users;

  Users.prototype.save = function(){
    
  }

  return Users;
})();

CRFut.AdminModules.Users = Users;
