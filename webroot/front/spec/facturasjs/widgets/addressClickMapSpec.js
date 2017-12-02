describe("CRFut.Widgets.extraEmails",function(){

  var cM;

  beforeAll(function(){
			cM = new CRFut.Widgets.addressClickMap();
	});

  it("should have mapContainer property",function(){
    expect(cM).toHaveString("mapContainer");
  });

  it("should have destInput property",function(){
    expect(cM).toHaveString("destInput");
  });

  it("should have display function",function(){
    expect(cM.display).toBeFunction();
  });

});
