	
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

/*$(function(){
				$("#addedFrom").datepicker({
					dateFormat:'yy-mm-dd',
					changeYear:true,
					changeMonth:true,
					onClose:function(s)
					{
						$("#addedTo").datepicker("option","minDate",s);
					}
				});
				$("#addedTo").datepicker({
					dateFormat:'yy-mm-dd',
					changeYear:true,
					changeMonth:true,
					onClose:function(s)
					{
						$("#addedFrom").datepicker("option","maxDate",s);
					}
				});
			});

		*/