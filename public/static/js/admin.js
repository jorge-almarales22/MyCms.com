var base = location.protocol+'//'+location.host;
// document.addEventListener('DOMContentLoaded', function(){
// 	var btn_product_file_image = document.getElementById('btn_product_file_image');
// 	var product_file_image = document.getElementById('product_file_image');
// 	product_file_image.addEventListener('click',function(){
// 		product_file_image.click();
// 	}, false);
// });
$(document).ready(function(){
	editor_init('editor');
	btn_deleted = document.getElementsByClassName("btn-deleted");
	// console.log(btn_deleted.length);
	for(i=0; i < btn_deleted.length; i++)
	{
		btn_deleted[i].addEventListener('click', delete_object);
	}
});
function editor_init(field){
	CKEDITOR.replace(field,{
		toolbar: [
		{ name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo']  },
		{ name: 'basicstyles', items: ['Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Unlink', 'Blockquote']  },
		{ name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source']  }
		]
	});
}
function delete_object(e)
{
	e.preventDefault();
	var object = this.getAttribute('data-object');
	var url = base + '/products' + '/' + object;
	  Swal.fire({
		title: '¿Estas seguro que quieres eliminar este item?',
		text: "Recuerda que los items eliminados quedaran en la papelera de reciclaje",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, si quiero!',
		cancelButtonText: 'Cancelar'
	  }).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	  })
	
}