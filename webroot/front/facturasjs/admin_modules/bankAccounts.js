
//prototyping just died

var bankAccounts = class bankAccounts {

  constructor(){
    this.parent = new CRFut.FacturasCR();
    this.parent.parentVars();
    this.getCompanyAccountsUrl = this.parent.baseUrl + "companies/companyaccounts";
    this.htmlSrc = "{{#each Accounts}}<tr><td>{{CompanyID}} {{#if selected}} {{/if}} {{CompanyName}}</td></tr>{{/each}}";
    this.template = Handlebars.compile(this.htmlSrc);
    this.container = "#companyBanksTBody";
  }

  buildTBody(data){
    console.log(data);
  }


}

CRFut.AdminModules.bankAccounts = bankAccounts;
