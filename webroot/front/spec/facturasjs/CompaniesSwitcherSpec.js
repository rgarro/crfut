describe("CRFut.CompaniesSwitcher",function(){

  var switcher;

  beforeAll(function(){
			switcher = new CRFut.CompaniesSwitcher();
	});

  it("should have save getData",function(){
    expect(switcher.getData).toBeFunction();
  });

});
