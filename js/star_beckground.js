var vertexHeight = 15000;
var planeDefinition = 100;
var planeSize = 1245000;
var totalObjects = 100000;

var container = document.createElement('div');
document.body.appendChild( container );

var camera = new THREE.PerspectiveCamera(55, window.innerWidth / window.innerHeight,1, 400000)
camera.position.z = 550000;
camera.position.y =10000;
camera.lookAt( new THREE.Vector3(0,6000,0) );


var scene = new THREE.Scene();
scene.fog = new THREE.Fog( 0x000000, 1, 300000 );

var	plane = new THREE.Mesh( new THREE.PlaneGeometry( planeSize, planeSize, planeDefinition, planeDefinition ), new THREE.MeshBasicMaterial( {color: 0x68A0DC, wireframe: false, map: THREE.ImageUtils.loadTexture('images/rock.jpg')}));
plane.rotation.x -=Math.PI*.5;

scene.add( plane );

var geometry = new THREE.Geometry();

for (i = 0; i < totalObjects; i ++)
{
  var vertex = new THREE.Vector3();
  vertex.x = Math.random()*planeSize-(planeSize*.5);
  vertex.y = Math.random()*100000;
  vertex.z = Math.random()*planeSize-(planeSize*.5);
  geometry.vertices.push( vertex );
}

var material = new THREE.ParticleBasicMaterial( { size: 20 });
var particles = new THREE.ParticleSystem( geometry, material );

scene.add( particles );

var renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
container.appendChild( renderer.domElement );

updatePlane();

 function updatePlane() {
   for (var i = 0; i < plane.geometry.vertices.length; i++)
   {
     plane.geometry.vertices[i].z += Math.random()*vertexHeight -vertexHeight;
   }
 };


render();

			function render() {
        requestAnimationFrame( render );
        camera.position.z -= 75;
       //  dateVerts();
        renderer.render( scene, camera );
			}
