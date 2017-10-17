var FacturasCR = (function(){

  function FacturasCR(){
    this.mesh = null;
    this.gameIsSet = false;
  }

  FacturasCR.prototype.loadModel = function(modelUrl){
/*loader.load(modelUrl, (function(geo, mat){
    var materials = new THREE.MeshFaceMaterial( mat );
    this.mesh = new THREE.Mesh(geo, materials);
    mesh.position.y=0;
    mesh.position.x=5;
    loadJson(mesh );
}).bind(this));*/
  }

  return FacturasCR;
})();
CRFut.FacturasCR = FacturasCR;
