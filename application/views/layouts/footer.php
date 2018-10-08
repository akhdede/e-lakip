    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('assets/js/') ?>jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/tinymce/tinymce.min.js') ?>"></script>
    <script>
    tinymce.init({
      selector: "textarea",  // change this value according to your HTML
      plugins : "table, image code",
      automatic_uploads: true,
      image_advtab: true,
      images_upload_url: "<?= base_url("menu/uploadimage")?>",
      file_picker_types: 'image', 
      paste_data_images:true,
      relative_urls: false,
      remove_script_host: false,
        file_picker_callback: function(cb, value, meta) {
           var input = document.createElement('input');
           input.setAttribute('type', 'file');
           input.setAttribute('accept', 'image/*');
           input.onchange = function() {
              var file = this.files[0];
              var reader = new FileReader();
              reader.readAsDataURL(file);
              reader.onload = function () {
                 var id = 'post-image-' + (new Date()).getTime();
                 var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                 var blobInfo = blobCache.create(id, file, reader.result);
                 blobCache.add(blobInfo);
                 cb(blobInfo.blobUri(), { title: file.name });
              };
           };
           input.click();
        }
    });
    </script>

    <!-- Icons -->
    <script src="<?= base_url('assets/js/') ?>feather.min.js"></script>
    <script>
      feather.replace()
    </script>
</body>
</html>