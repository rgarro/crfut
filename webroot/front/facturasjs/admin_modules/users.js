var Users = (function(){

  function Users(){
    this.parentVars();
    this.dataTableUrl = this.baseUrl + "users/datatable";
    this.AccessLevelsUrl = this.baseUrl + "users/accesslevelsoptions";
    this.AccessLevelOptionsInput = "#userAccessLevelIDInput";
    this.accessLevelsOptionsSrc = "{{#each alevels}}<option value='{{AccessLevelID}}'>{{AccessLevel}}</option>{{/each}}";
    this.alevelsOptionsTemplate = Handlebars.compile(this.accessLevelsOptionsSrc);
    this.saveUrl = this.baseUrl + "users/save";
    this.table = {};
    this.companiesCheckBoxesContainer = "#companiesCheckBoxes";
    this.companiesOptionsUrl = this.baseUrl + "companies/companiesoptions";
    this.companiesOptionsSrc = "{{#each companies}}<span class='badge badge-pill badge-light'><input name='Companies[{{CompanyID}}]' type='checkbox' value='{{CompanyID}}' {{#if checked}}checked='checked'{{/if}}/> {{CompanyName}} </span> &nbsp;{{/each}}";
    this.companiesOptionsTemplate = Handlebars.compile(this.companiesOptionsSrc);
  }

  Users.prototype = Object.create(CRFut.FacturasCR.prototype);
  Users.prototype.constructor = Users;

  Users.prototype.save = function(data){
    var ucookie = Cookies.get('User');
    var ucookiedata = JSON.parse(ucookie);
    data.User.Password = SHA1(data.User.Password);
    if(parseInt(data.User.UserID) > 0){
      data.User.ModifiedBy = ucookiedata.FirstName + " " + ucookiedata.LastName;
    }else{
      data.User.EnteredBy = ucookiedata.FirstName + " " + ucookiedata.LastName;
    }
      $.ajax({
        url:this.saveUrl+"?token="+Cookies.get("token"),
        data:data,
        type:"get",
        dataType:"json",
        success:(function(data){
        this.verifyTokenizedRequest(data);
          if(data.is_success == 1){
            this.alert_success(data.flash);
            $('#userFormModal').modal('hide');
            this.table.ajax.reload();
          }else{
              this.alert_error(data.flash);
              this.modelErrors(data.error_list);
          }
        }).bind(this)
      });
  }

  Users.prototype.getSetAccessLevelOptions = function(){
    $.ajax({
      url:this.AccessLevelsUrl,
      type:"GET",
      dataType:"json",
      success:(function(data){
        var options_hmtl = this.alevelsOptionsTemplate({alevels:data});
        $(this.AccessLevelOptionsInput).html(options_hmtl);
      }).bind(this)
    });
  }

  Users.prototype.getAndBuildCompanyOptions = function(){
    $.ajax({
      url:this.companiesOptionsUrl,
      type:"GET",
      dataType:"json",
      success:(function(data){
        var options_hmtl = this.companiesOptionsTemplate({companies:data});
        $(this.companiesCheckBoxesContainer).html(options_hmtl);
      }).bind(this)
    });
  }

  return Users;
})();

CRFut.AdminModules.Users = Users;
