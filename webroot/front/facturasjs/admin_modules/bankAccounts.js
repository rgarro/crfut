
//prototyping died, 03/01/2018

var bankAccounts = class bankAccounts {

  constructor(){
    this.parent = new CRFut.FacturasCR();
    this.parent.parentVars();
    this.getCompanyAccountsUrl = this.parent.baseUrl + "companies/companyaccounts";
    this.saveUrl = this.parent.baseUrl + "companies/savecompanyaccount";
    this.setHtmlSrc();
    this.template = Handlebars.compile(this.htmlSrc);
    this.container = "#companyBanksTBody";
    this.companyID = 0;
    this.bankOptionsUrl = this.parent.baseUrl + "companies/getbankoptions";
    this.accountsOptionContainer = "#accountsOptions";
    this.currencyOptionsUrl = this.parent.baseUrl + "companies/currencyoptions";
  }

  showAccounts(data){
    this.buildTBody(data);
    this.setCompanyID(data.CompanyID);
    this.setBankOptions(data.CompanyID);
    this.setCurrencyOptions();
  }

  buildTBody(data){
    var html = this.template(data);
    $(this.container).html(html);
  }

  setCompanyID(id){
    $("#cbCompanyID").val(id);
  }

  setBankOptions(cid){
    $.ajax({
      url:this.bankOptionsUrl,
      type:"get",
      data:{
        CompanyID:cid,
        token:Cookies.get("token")
      },
      dataType:"json",
      success:(function(data){
        var src = "<select id='bankSwitcher' name='Companies[BankID]' class='form-control form-control-sm'>{{#each accounts}}<option value='{{BankID}}'>{{Bank}}</option>{{/each}}</select>";
        var template = Handlebars.compile(src);
        var html = template({accounts:data});
        $("#accountsOptions").html(html);
      }).bind(this)
    });
  }

  setCurrencyOptions(cid){
    $.ajax({
      url:this.currencyOptionsUrl,
      type:"get",
      data:{
        token:Cookies.get("token")
      },
      dataType:"json",
      success:(function(data){
        var src = "<select id='currencySwitcher' name='Companies[CurrencyID]' class='form-control form-control-sm'>{{#each currencies}}<option value='{{CurrencyID}}'>{{CurrencyName}}</option>{{/each}}</select>";
        var template = Handlebars.compile(src);
        var html = template({currencies:data});
        $("#currencyOptions").html(html);
      }).bind(this)
    });
  }

  setHtmlSrc(){
    this.htmlSrc = "{{#each Accounts}}<tr>";
    this.htmlSrc += "<td>{{Bank}}</td>";
    this.htmlSrc += "<td>{{CurrencyName}}</td>";
    this.htmlSrc += "<td>{{AccountNumber}}</td>";
    this.htmlSrc += "<td>{{SINPE}}</td>";
    this.htmlSrc += "<td> <button type='button' sinpe='{{SINPE}}' class='btn btn-outline-danger btn-sm delete-account-btn'><i class='fa fa-trash'></i></button></td>";
    this.htmlSrc += "</tr>{{/each}}";
  }

}

CRFut.AdminModules.bankAccounts = bankAccounts;
