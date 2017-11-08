describe("CRFut.CompaniesSwitcher",function(){

  var switcher;

  beforeAll(function(){
			switcher = new CRFut.CompaniesSwitcher();
	});

  it("should have save getData",function(){
    expect(switcher.getData).toBeFunction();
  });

  it("should have save buildSelect",function(){
    expect(switcher.buildSelect).toBeFunction();
  });

  it("should have save html property",function(){
    expect(switcher).toHaveString("html");
  });

  it("should have template handlebar obj",function(){
    expect(switcher.template).toBeFunction();
  });

});
