var Login = (function(){

  function Login(){
    CRFut.FacturasCR.call(this.p);
    this.mesh = null;
  }

  Login.prototype = Object.create(CRFut.FacturasCR.prototype);
  Login.prototype.constructor = Login;

  Login.prototype.loadModel = function(modelUrl){
/*loader.load(modelUrl, (function(geo, mat){
    var materials = new THREE.MeshFaceMaterial( mat );
    this.mesh = new THREE.Mesh(geo, materials);
    mesh.position.y=0;
    mesh.position.x=5;
    loadJson(mesh );
}).bind(this));*/
  }
  return Login;
})();
CRFut.Login = Login;
