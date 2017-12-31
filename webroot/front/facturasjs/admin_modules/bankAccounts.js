
//prototyping just died

var bankAccounts = class bankAccounts {

  constructor(){
    this.parent = new CRFut.FacturasCR();
    this.parent.parentVars();
    this.getCompanyAccountsUrl = this.parent.baseUrl + "companies/companyaccounts";
    this.saveUrl = this.parent.baseUrl + "companies/savecompanyaccount";
    this.setHtmlSrc();
    this.template = Handlebars.compile(this.htmlSrc);
    this.container = "#companyBanksTBody";
  }

  buildTBody(data){
    console.log(data);
    var html = this.template(data);
console.log(html);    
    $(this.container).html(html);
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
