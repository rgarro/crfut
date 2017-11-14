describe("CRFut.AdminModules.Companies",function(){

  var companies;

  beforeAll(function(){
			companies = new CRFut.AdminModules.Companies();
	});

  it("should have save method",function(){
    expect(companies.save).toBeFunction();
  });

});
