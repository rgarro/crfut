var CompaniesSwitcher = (function(){

  function CompaniesSwitcher(){
    this.parentVars();
    this.html = "<select id='ciaSwitcher' class='form-control form-control-sm'>{{#each cias}}<option value='{{CompanyID}}' {{#if selected}}selected='selected'{{/if}}>{{CompanyName}}</option>{{/each}}</select>";
    this.template = Handlebars.compile(this.html);
    this.data = {};
    this.data.cias = [];
    this.dataIsGet = false;
  }

  CompaniesSwitcher.prototype = Object.create(CRFut.FacturasCR.prototype);
  CompaniesSwitcher.prototype.constructor = CompaniesSwitcher;

  CompaniesSwitcher.prototype.getData = function(){
    var u = Cookies.get('User');
    var o = JSON.parse(u);
    if(typeof o.CiasList !== 'undefined'){
      this.data.cias = o.CiasList;
      this.dataIsGet = true;
    }else{
      throw new Error("Error getting data");
    }
  }

  CompaniesSwitcher.prototype.buildSelect = function(current_company_id){
    if(this.dataIsGet){
      for(var i =0;i < this.data.cias.length;i++){
        if(this.data.cias[i].CompanyID == current_company_id){
          this.data.cias[i].selected = true;
        }else{
          this.data.cias[i].selected = false;
        }
      }
    return this.template(this.data);
    }else{
      throw new Error("get data first");
    }
  }

  return CompaniesSwitcher;
})();

CRFut.CompaniesSwitcher = CompaniesSwitcher;
