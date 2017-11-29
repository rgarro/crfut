var extraEmails = (function(){

  function extraEmails(){
    this.parentVars();
    this.newInput = "#extraEmailNewInput";
    this.hiddenInput = "#extraEmailNewInput";
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

  return extraEmails;
})();

CRFut.Widgets.extraEmails = extraEmails;
