describe("CRFut.AdminModules.Clients",function(){

  var clients;

  beforeAll(function(){
			clients = new CRFut.AdminModules.Users();
	});

  it("should have save method",function(){
    expect(clients.save).toBeFunction();
  });

});
