var CompaniesSwitcher = (function(){

  function CompaniesSwitcher(){
    this.parentVars();
    this.html = "<select id='ciaSwitcher'>{{#list}}<option value='{{CompanyID}}'>{{CompanyName}}</option>{{/list}}</select>";
    this.template = Handlebars.compile(this.html);
    this.data = [];
    this.dataIsGet = false;
  }

  CompaniesSwitcher.prototype = Object.create(CRFut.FacturasCR.prototype);
  CompaniesSwitcher.prototype.constructor = CompaniesSwitcher;

  CompaniesSwitcher.prototype.getData = function(){
    var u = Cookies.get('User');
    if(typeof u.CiasList !== 'undefined'){
      this.data = u.CiasList;
      this.dataIsGet = true;
    }else{
      throw new Error("Error getting data");
    }
  }

  CompaniesSwitcher.prototype.buildSelect = function(){
    if(this.dataIsGet){

    return this.template();
    }else{
      throw new Error("get data first");
    }
  }

  return CompaniesSwitcher;
})();

CRFut.CompaniesSwitcher = CompaniesSwitcher;
