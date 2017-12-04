var Users = (function(){

  function Users(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "users/datatable";
    this.AccessLevelsUrl = this.baseUrl + "users/accesslevelsoptions";
    this.AccessLevelOptionsInput = "#userAccessLevelIDInput";
    this.accessLevelsOptionsSrc = "{{#each alevels}}<option value='{{AccessLevelID}}'>{{AccessLevel}}</option>{{/each}}";
    this.alevelsOptionsTemplate = Handlebars.compile(this.accessLevelsOptionsSrc);
  }

  Users.prototype = Object.create(CRFut.FacturasCR.prototype);
  Users.prototype.constructor = Users;

  Users.prototype.save = function(data){
console.log(data);
  }

  Users.prototype.getSetAccessLevelOptions = function(){
    $.ajax({
      url:this.AccessLevelsUrl,
      type:"GET",
      dataType:"json",
      success:(function(data){
        var options_hmtl = this.alevelsOptionsTemplate({alevels:data});
        $(this.AccessLevelOptionsInput).append(options_hmtl);
      }).bind(this)
    });
  }

  return Users;
})();

CRFut.AdminModules.Users = Users;
