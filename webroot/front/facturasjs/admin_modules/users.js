var Users = (function(){

  function Users(){
    this.parentVars();

  }

  Users.prototype = Object.create(CRFut.FacturasCR.prototype);
  Users.prototype.constructor = Users;


  return Users;
})();

CRFut.AdminModules.Users = Users;
