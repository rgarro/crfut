describe("CRFut.AdminModules.Invoices",function(){

  var invoices;

  beforeAll(function(){
			invoices = new CRFut.AdminModules.Invoices();
	});

  it("should have save method",function(){
    expect(invoices.save).toBeFunction();
  });

});
