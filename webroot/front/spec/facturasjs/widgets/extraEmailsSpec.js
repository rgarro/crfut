describe("CRFut.Widgets.extraEmails",function(){

  var exM;

  beforeAll(function(){
			exM = new CRFut.Widgets.extraEmails();
	});

  it("should have add method",function(){
    expect(exM.add).toBeFunction();
  });

  it("should have remove method",function(){
    expect(exM.remove).toBeFunction();
  });

  it("should have inList method",function(){
    expect(exM.inList).toBeFunction();
  });

  it("should have updateDisplay method",function(){
    expect(exM.updateDisplay).toBeFunction();
  });

  it("should have updateHidden method",function(){
    expect(exM.updateHidden).toBeFunction();
  });

  it("should have newInput property",function(){
    expect(exM).toHaveString("newInput");
  });

  it("should have hiddenInput property",function(){
    expect(exM).toHaveString("hiddenInput");
  });

  it("should have addBtn property",function(){
    expect(exM).toHaveString("addBtn");
  });

  it("should have displayBox property",function(){
    expect(exM).toHaveString("displayBox");
  });

  it("should have emailBoxSrc property",function(){
    expect(exM).toHaveString("emailBoxSrc");
  });

  it("should have emails property",function(){
    expect(exM).toHaveArray("emails");
  });

  it("should have emailBoxTpl property",function(){
    //expect(exM).toHaveObject("emailBoxTpl");
    expect(exM.emailBoxTpl).toBeFunction();
  });

});
