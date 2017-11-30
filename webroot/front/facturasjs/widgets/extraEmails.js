var extraEmails = (function(){

  function extraEmails(){
    this.parentVars();
    //this.newInput = "#extraEmailNewTInput";
    this.newInput = "extraEmailNewTInput";
    this.hiddenInput = "#extraEmailNewInput";
    this.addBtn = "#extraEmailAddBtn";
    this.delBtn = ".delexmail";
    this.displayBox = "#extraEmailsBox";
    this.emailBoxSrc = "<span class='badge badge-pill badge-warning'>{{email}} <i index='{{index}}' class='fa fa-trash delexmail' style='cursor:pointer;'></i></span>";
    this.emailBoxTpl = Handlebars.compile(this.emailBoxSrc);
    this.extraEmails = [];
  }

  extraEmails.prototype = Object.create(CRFut.FacturasCR.prototype);
  extraEmails.prototype.constructor = extraEmails;

  extraEmails.prototype.add = function(email){

  }

  extraEmails.prototype.remove = function(){

  }

  extraEmails.prototype.inList = function(email){

  }

  extraEmails.prototype.updateDisplay = function(){

  }

  extraEmails.prototype.updateHidden = function(){

  }

  extraEmails.prototype.init = function(){
    //add button listener ...
    $(this.addBtn).on("click",(function(evt){
console.log(document.getElementById(this.newInput).validity.valid);

    }).bind(this));
    //del button listener
    $(document).on(this.delBtn,"click",(function(evt){
console.log(evt);
    }).bind(this));
  }

  return extraEmails;
})();

CRFut.Widgets.extraEmails = extraEmails;
