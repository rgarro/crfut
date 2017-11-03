describe("CRFut.FacturasCR",function(){

  var facturascr;

  beforeAll(function(){
			facturascr = new CRFut.FacturasCR();
	});

  it("should have parentVars method",function(){
    expect(facturascr.parentVars).toBeFunction();
  });

});
