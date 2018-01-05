
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
    this.companyID = 0;
    this.bankOptionsUrl = this.parent.baseUrl + "companies/getbankoptions";
  }

  showAccounts(data){
    this.buildTBody(data);
    this.setCompanyID(data.CompanyID);
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
      //this.parent.verifyTokenizedRequest(data);
      console.log(data);
        /*if(data.is_success == 1){
          this.alert_success(data.flash);
          $('#createClienteModal').modal('hide');
          this.table.ajax.reload();
        }else{
            this.alert_error(data.flash);
            this.modelErrors(data.error_list);
        }*/
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
