		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
		<script src="/backend/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/backend/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="/backend/assets/js/scripts.bundle.js"></script>
		<script src="/backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="/backend/assets/js/pages/widgets.js"></script>
		<script src="{{ asset('backend/assets/js/pages/widgets.js?v=7.0.5') }}"></script>
		<script src="{{ asset('backend/assets/js/pages/custom/profile/profile.js?v=7.0.5') }}"></script>
		<script src="/backend/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.5"></script>
		<script src="/backend/assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.5"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="/form-file-uploader.js" defer></script>
		<script src="/backend/assets/plugins/custom/datatables/datatables.bundle.js?v=7.2.8"></script><script>
			$(document).ready(function(){
		
				$('form').on('submit', function(e){
					var btn = $(this).find('button[type=submit]'),
					loadingText = "<i class='fas fa-spinner fa-spin'></i> Memuat";
					btn.html(loadingText).addClass('disabled').attr('disabled', true);
				});
		
				// Class definition
		
				var KTCkeditor = function () {
					// Private functions
					var demos = function () {
						ClassicEditor
							.create( document.querySelector( '#description' ) )
							.then( editor => {
								console.log( editor );
							} )
							.catch( error => {
								console.error( error );
							} );
					}
		
					return {
						// public functions
						init: function() {
							demos();
						}
					};
				}();
		
				// Initialization
				jQuery(document).ready(function() {
					KTCkeditor.init();
				});
			});
			function readURL(input) {
				if (input.files && input.files[0]) {
		
					var reader = new FileReader();
		
					reader.onload = function(e) {
						$('.image-upload-wrap').hide();
		
						$('.file-upload-image').attr('src', e.target.result);
						$('.file-upload-content').show();
		
						$('.image-title').html(input.files[0].name);
					};
		
					reader.readAsDataURL(input.files[0]);
		
				} else {
					removeUpload();
				}
			}
		
			function removeUpload() {
				$('.file-upload-input').replaceWith($('.file-upload-input').clone());
				$('.file-upload-content').hide();
				$('.image-upload-wrap').show();
			}
		
			$(function (){
				$('.image-upload-wrap').bind('dragover', function () {
					$('.image-upload-wrap').addClass('image-dropping');
				});
		
				$('.image-upload-wrap').bind('dragleave', function () {
					$('.image-upload-wrap').removeClass('image-dropping');
				});
			});
		
			
		</script>
		@stack('script')
	</body>
</html>