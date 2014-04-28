	
		$(function(){
			$('input,textarea').attr('autocomplete','off').addClass('mousetrap');
		});
				
	
	$(function(){
		$('.dataTable').dataTable({
			"iDisplayLength": 300,
			'aLengthMenu':[200,300,400],
		});
	});


$(function(){
	$("#searchTbl").dataTable({
		'iDisplayLength':'100'
	})
});

// for file validaion
$(function(){
	if (window.File && window.FileReader && window.FileList && window.Blob) 
	{
		$(".axImg").change(function(ev)
		{
			if($(this).is(":hidden"))
				return;
			$fl=ev.target.files;
			size=($fl[0].size);
			kb=size/1024;
			if(kb>1400) //ie > 1.4 mb
			{
				alertify.error('should be less than 1.4 MB');
				$(this).val('');
			}

		})
	} 
});

$(function(){
	$('[data-toggle="tooltip"]').tooltip();
})