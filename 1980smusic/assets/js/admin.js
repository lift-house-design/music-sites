$(function(){
tinymce.init({
    	selector: 'textarea[name="content"]',
	    plugins: 'code link textcolor',
	    toolbar: 'code link forecolor backcolor bold italic underline alignleft aligncenter alignright alignjustify fontselect fontsizeselect bullist numlist outdent indent blockquote undo redo',
    	menubar: 'edit view format'
	});
});