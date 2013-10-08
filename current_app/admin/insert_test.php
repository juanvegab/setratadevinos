<?PHP
	include('backend/validateSession.php');
	include('backend/dataAccess.php');
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
	<script src="scripts/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/htmlEditor.js" type="text/javascript"></script>
	<script src="scripts/script.js" type="text/javascript"></script>
	<link href="../styles/style.css" rel="stylesheet" type="text/css">
	<link href="../styles/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
	<title>Se trata de vinos</title>
</head>
<body>
	<div id="DIVwrapper" class="pageAddProduct maintenancePages">
		<style>

		</style>
		<article>
		  <div id="holder">
		  </div> 
		  <p id="upload" class="hidden"><label>Drag &amp; drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
		  <p id="filereader">File API &amp; FileReader API not supported</p>
		  <p id="formdata">XHR2's FormData is not supported</p>
		  <p id="progress">XHR2's upload progress isn't supported</p>
		  <p>Upload progress: <progress id="uploadprogress" min="0" max="100" value="0">0</progress></p>
		  <p>Drag an image from your desktop on to the drop zone above to see the browser both render the preview, but also upload automatically to this server.</p>
		</article>
			<script>
				var holder = document.getElementById('holder'),
				    tests = {
				      filereader: typeof FileReader != 'undefined',
				      dnd: 'draggable' in document.createElement('span'),
				      formdata: !!window.FormData,
				      progress: "upload" in new XMLHttpRequest
				    }, 
				    support = {
				      filereader: document.getElementById('filereader'),
				      formdata: document.getElementById('formdata'),
				      progress: document.getElementById('progress')
				    },
				    acceptedTypes = {
				      'image/png': true,
				      'image/jpeg': true,
				      'image/gif': true
				    },
				    progress = document.getElementById('uploadprogress'),
				    fileupload = document.getElementById('upload');
				
				"filereader formdata progress".split(' ').forEach(function (api) {
				  if (tests[api] === false) {
				    support[api].className = 'fail';
				  } else {
				    // FFS. I could have done el.hidden = true, but IE doesn't support
				    // hidden, so I tried to create a polyfill that would extend the
				    // Element.prototype, but then IE10 doesn't even give me access
				    // to the Element object. Brilliant.
				    support[api].className = 'hidden';
				  }
				});
				
				function previewfile(file) {
				  if (tests.filereader === true && acceptedTypes[file.type] === true) {
				    var reader = new FileReader();
				    reader.onload = function (event) {
				      var image = new Image();
				      image.src = event.target.result;
				      image.width = 250; // a fake resize
				      holder.appendChild(image);
				    };
				
				    reader.readAsDataURL(file);
				  }  else {
				    holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
				    console.log(file);
				  }
				}
				
				function readfiles(files) {
				    debugger;
				    var formData = tests.formdata ? new FormData() : null;
				    for (var i = 0; i < files.length; i++) {
				      if (tests.formdata) formData.append('file', files[i]);
				      previewfile(files[i]);
				    }
				
				    // now post a new XHR request
				    if (tests.formdata) {
				      var xhr = new XMLHttpRequest();
				      xhr.open('POST', '/devnull.php');
				      xhr.onload = function() {
				        progress.value = progress.innerHTML = 100;
				      };
				
				      if (tests.progress) {
				        xhr.upload.onprogress = function (event) {
				          if (event.lengthComputable) {
				            var complete = (event.loaded / event.total * 100 | 0);
				            progress.value = progress.innerHTML = complete;
				          }
				        }
				      }
				
				      xhr.send(formData);
				    }
				}
				
				if (tests.dnd) { 
				  holder.ondragover = function () { this.className = 'hover'; return false; };
				  holder.ondragend = function () { this.className = ''; return false; };
				  holder.ondrop = function (e) {
				    this.className = '';
				    e.preventDefault();
				    readfiles(e.dataTransfer.files);
				  }
				} else {
				  fileupload.className = 'hidden';
				  fileupload.querySelector('input').onchange = function () {
				    readfiles(this.files);
				  };
				}
	</script>
	</div>
</body>
</html>