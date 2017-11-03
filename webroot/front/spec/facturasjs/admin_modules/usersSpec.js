describe("CRFut.AdminModules.Users",function(){

  var users;

  beforeAll(function(){
			users = new CRFut.AdminModules.Users();
	});

  it("should have save method",function(){
    expect(users.save).toBeFunction();
  });

});
