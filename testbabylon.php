<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Babylon.js sample code</title>
        <!-- Babylon.js -->
        <script src="https://www.babylonjs.com/hand.minified-1.2.js"></script>
        <script src="https://preview.babylonjs.com/cannon.js"></script>
        <script src="https://preview.babylonjs.com/oimo.js"></script>
        <script src="https://preview.babylonjs.com/babylon.js"></script>
        <style>
            html, body {
                overflow: hidden;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }

            #renderCanvas {
                width: 100%;
                height: 100%;
                touch-action: none;
            }
			
			#control{
			    width: 100%;
                height: 50px;
				z-index: +1;
				position: fixed;
			}
        </style>
    </head>
<body>
     <div id="control">
	     <button id="boneonetransparent_id">boneone transparent</button>
		 <button id="boneonematerial_id">boneone material2</button>
		 <button id="bonetwotransparent_id">bonetwo transparent</button>
		 <button id="bonetwomaterial_id">bonetwo material2</button>
		 <button id="venetransparent_id">vene transparent</button>
		 <button id="venematerial_id">vene material2</button>
	 </div>
	 
	 
    <div id="canvasZone">
        <canvas id="renderCanvas"></canvas>
    </div>
     <script>
        var canvas = document.getElementById("renderCanvas");
        var engine = new BABYLON.Engine(canvas, true);

        var createScene = function () {
            var scene = new BABYLON.Scene(engine);
			
			scene.clearColor = new BABYLON.Color4(0,0,0,0.0000000000000001);
        
            //Adding a light
             var light0 = new BABYLON.HemisphericLight("Hemi0", new BABYLON.Vector3(0, 1, 0), scene);
             light0.diffuse = new BABYLON.Color3(1, 1, 1);
             light0.specular = new BABYLON.Color3(1, 1, 1);
             light0.groundColor = new BABYLON.Color3(0, 0, 0);
             
			
            
			
            //Adding an Arc Rotate Camera
            var camera = new BABYLON.ArcRotateCamera("Camera", 0, 15, -30, new BABYLON.Vector3(0, 15, -30), scene);
            camera.attachControl(canvas, false);
			
            
			var boneonematerial = new BABYLON.StandardMaterial("skin1.jpg", scene);
			boneonematerial.diffuseColor = new BABYLON.Color3(0, 0, 7);  // 
            boneonematerial.diffuseTexture = new BABYLON.Texture("skin1.jpg", scene);
            var texture2 = new BABYLON.Texture("skin2.jpg", scene);
			
        
            // The first parameter can be used to specify which mesh to import. Here we import all meshes
            BABYLON.SceneLoader.ImportMesh("", "anatomy3d/", "boneone.babylon", scene, function (newMeshes) {
                // Set the target of the camera to the first imported mesh
                camera.target = newMeshes[0];
				boneone = newMeshes[0];
                boneone.material = boneonematerial;
				boneone.visibility = 1;
            });
			
			var bonetwomaterial = new BABYLON.StandardMaterial("skin1.jpg", scene);
			bonetwomaterial.diffuseColor = new BABYLON.Color3(0, 0, 7);  // 
            bonetwomaterial.diffuseTexture = new BABYLON.Texture("skin1.jpg", scene);
            var texture2 = new BABYLON.Texture("skin2.jpg", scene);
			
        
            // The first parameter can be used to specify which mesh to import. Here we import all meshes
            BABYLON.SceneLoader.ImportMesh("", "anatomy3d/", "bonetwo.babylon", scene, function (newMeshes) {
                // Set the target of the camera to the first imported mesh
                camera.target = newMeshes[0];
				bonetwo = newMeshes[0];
                bonetwo.material = bonetwomaterial;
				bonetwo.visibility = 1;
            });
			
			var venematerial = new BABYLON.StandardMaterial("skin1.jpg", scene);
			venematerial.diffuseColor = new BABYLON.Color3(0, 0, 7);  // 
            venematerial.diffuseTexture = new BABYLON.Texture("skin1.jpg", scene);
            var texture2 = new BABYLON.Texture("skin2.jpg", scene);
			
        
            // The first parameter can be used to specify which mesh to import. Here we import all meshes
            BABYLON.SceneLoader.ImportMesh("", "anatomy3d/", "vene.babylon", scene, function (newMeshes) {
                // Set the target of the camera to the first imported mesh
                camera.target = newMeshes[0];
				vene = newMeshes[0];
                vene.material = venematerial;
				vene.visibility = 1;
            });
			
            
			
			var boneonetransparent_id = document.getElementById('boneonetransparent_id'), boneonematerial_id = document.getElementById('boneonematerial_id');

             boneonetransparent_id.onclick = function() {
				 boneone.material.alpha = 0.3;
               //mesh.visibility = 0.2;
        		};
				
             boneonematerial_id.onclick = function() {
				    boneonematerial.diffuseColor = new BABYLON.Color3(1, 0, 0);
        		};
				
			var bonetwotransparent_id = document.getElementById('bonetwotransparent_id'), bonetwomaterial_id = document.getElementById('bonetwomaterial_id');

             bonetwotransparent_id.onclick = function() {
				 bonetwo.material.alpha = 0.4;
               //mesh.visibility = 0.2;
        		};
				
             bonetwomaterial_id.onclick = function() {
				    bonetwomaterial.diffuseColor = new BABYLON.Color3(1, 0, 0);
        		};
				
				
             var venetransparent_id = document.getElementById('venetransparent_id'), venematerial_id = document.getElementById('venematerial_id');

             venetransparent_id.onclick = function() {
				 vene.material.alpha = 0.4;
               //mesh.visibility = 0.2;
        		};
				
             venematerial_id.onclick = function() {
				    venematerial.diffuseColor = new BABYLON.Color3(1, 0, 0);
        		};
				
        	
        
            return scene;
        
        };
        
        var scene = createScene();

        engine.runRenderLoop(function () {
            scene.render();
        });

        // Resize
        window.addEventListener("resize", function () {
            engine.resize();
        });
    </script>
</body>
</html>