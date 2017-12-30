
//prototyping just died

var bankAccounts = class bankAccounts {

  constructor(){
    this.parent = new CRFut.FacturasCR();
    this.parent.parentVars();
    this.getCompanyAccountsUrl = this.parent.baseUrl + "companies/companyaccounts";
  }

}

CRFut.AdminModules.bankAccounts = bankAccounts;
