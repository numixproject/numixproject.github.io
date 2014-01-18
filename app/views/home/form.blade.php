<script>
	$(function(){
		$("#form input[type='radio']").click(function()
		{
			target='#'+$(this).attr("data-target");
			val=$(this).val();
			$("#form form").hide();
			$(target).show();
            $('html,body').animate({
                scrollTop: $(target).offset().top-60
            },1000);
            $(target).find('input[type="email"]:first').focus();

			
		})
	});
    $(function(){
        $("#urlToggle").click(function()
        {
            $("#url").slideToggle();
            $("#url").focus();
        })
    })
</script>
<section id="form" class="pointer capitalCase">
            <div class="content">
                <h1>how can we help</h1>
                <p>let us know how can we be of assistance.</p>
                <ul class="list-unstyled">
                	<li>
	                	<input type="radio" class="hide-submit" data-target="contact-form" name="form" value="1" id="li-1" checked="checked"/>
	                	<div class=" transition checkedLabel pointer">
	                		<label for="li-1" class="transition padding-small cursor">
	                			 ask something
	                		</label>
	                	</div>
                	</li>
                    <li>
                        <input type="radio" class="hide-submit" data-target="request-icon-form" name="form" value="3" id="li-3" />
                        <div class=" transition checkedLabel pointer">
                            <label for="li-3" class="transition padding-small cursor">
                                 submit an icon request
                            </label>
                        </div>
                    </li>
                	<li>
                	<!--     <input type="radio" class="hide-submit" data-target="problem-form" name="form" value="2" id="li-2" />
                    <div class=" transition checkedLabel pointer">
                                                <label for="li-2" class="transition padding-small cursor">
                                                    i'm facing problem with the artwork
                                                </label>
                                            </div>
                                        </li>
                                        
                                        <li>
                    <input type="radio" class="hide-submit" name="form" data-target="submit-icon-form" value="4" id="li-4" />
                    <div class=" transition checkedLabel pointer">
                                                <label for="li-4" class="transition padding-small cursor">
                                                     submit an Icon made by me
                                                </label>
                                            </div>
                                        </li> -->
                </ul>
                <div id="form-content" class="transition top-buffer-large">
                <!-- contact form starts -->
                	{{Form::open(array('url'=>'saveForm','class'=>'form-horizontal','id'=>"contact-form"))}}
                		<input type="hidden" name="action" value="contact-form">
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">email</label>
                			<div class="col-xs-6">
                				<input type="email" name="email" id="email" class="axBlank axEmail form-control custom-input" placeholder="Email" autofocus>
                			</div>
                		</div>
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">message</label>
                			<div class="col-xs-6">
                				<textarea  name="message" id="message" class="axBlank form-control custom-textarea" placeholder="message"></textarea>
                			</div>
                		</div>
                			<div class="col-xs-offset-3">
                				<input type="submit" class="numix-red padding-large ui-text-white">
                			</div>
                	{{Form::close()}}
                <!-- contact form ends -->

                <!-- problem form starts -->
                	{{Form::open(array('url'=>'saveForm','class'=>'form-horizontal hidden-x','id'=>"problem-form",'files'=>true))}}
                        <input type="hidden" name="action" value="problem-form">
                		<input type="file" id="icon-image" name="icon-image" class="axImg hide-submit">
                        <div class="form-group" >
                            <label for="senderEmail" class="form-label col-xs-2">your email</label>
                            <div class="col-xs-6">
                                <input type="email" name="senderEmail" placeholder="your email" class="axBlank axEmail form-control custom-input">
                            </div>
                        </div>
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">project name</label>
                			<div class="col-xs-6 capitalCase">
                				<select name="projName" id="" class="axBlank form-control custom-input capitalCase">
                                    <option value="">select</option>
                					<option value="numix-icon-theme-circle">numix icon theme circle</option>
                					<option value="numix-kde-theme">numix kde theme</option>
                                    <option value="numix-icon-theme">numix icon theme</option>              					<option value="numix-icon-theme-utouch">numix icon theme utouch</option>
                                    <option value="numix-icon-theme-shine">numix icon theme shine</option>
                				</select>
                			</div>
                		</div>
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">type of problem</label>
                			<div class="col-xs-6">
                				<textarea  name="message" id="message" class="axBlank form-control custom-textarea" placeholder="message"></textarea>
                				<div class="col-xs-12 numix-grey padding-small border-all pointer">
                					<div class="col-xs-1"><label for="icon-image" class="pointer"><i class="fa fa-camera"></i></label></div>
                					<div class="col-xs-1" id="urlToggle"><i class="fa fa-link"></i></div>
                					<div class="col-xs-1"><i class="fa fa-code"></i></div>
                				</div>
                			</div>
                		</div>
                        <div class="form-group hidden-x" id="url">
                            <label for="formURL" class="form-label col-xs-2"></label>
                            <div class="col-xs-6">
                                <input type="text" name="url" placeholder="URL" class="axBlank form-control custom-input">
                            </div>
                        </div>
                			<div class="col-xs-offset-3">
                				<input type="submit" class="numix-red padding-large ui-text-white">
                			</div>
                	{{Form::close()}}
                <!-- problem form ends -->

                <!-- icon submit form starts -->
                	{{Form::open(array('url'=>'saveForm','class'=>'form-horizontal hidden-x','id'=>"request-icon-form",'files'=>true))}}
                		<input type="hidden" name="action" value="request-icon-form">
                		<div class="form-group">
                            <label for="riEmail" class="form-label col-xs-2">your email</label>
                            <div class="col-xs-6">
                                <input type="email" name="email" id="riEmail" class="axBlank form-control custom-input" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="riProjectName" class="form-label col-xs-2">project name</label>
                            <div class="col-xs-6">
                                <select name="projName" id="riProjectName" class="axBlank form-control custom-input">
                                    <option value="">Select</option>
                                    <option value="numix-icon-theme-circle">Numix Icon Theme Circle</option>
                                    <option value="numix-kde-theme">Numix Kde Theme</option>
                                    <option value="numix-icon-theme">Numix Icon Theme</option>                     
                                    <option value="numix-icon-theme-utouch">Numix Icon Theme Utouch</option>
                                    <option value="numix-icon-theme-shine">Numix Icon Theme Shine</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                			<label for="riIconName" class="form-label col-xs-2">icon name</label>
                			<div class="col-xs-6">
                				<input type="text" name="iconName" id="riIconName" class="axBlank form-control custom-input" placeholder="icon name">
                			</div>
                		</div>
                		<div class="form-group">
                			<label for="riInfo" class="form-label col-xs-2">more info</label>
                			<div class="col-xs-6">
                				<textarea  name="info" id="riInfo" class="form-control custom-textarea" placeholder="info"></textarea>
                			</div>
                		</div>
                		<div class="form-group">
                			<label for="riSuggestion" class="form-label col-xs-2">suggestion</label>
                			<div class="col-xs-6">
                				<textarea  name="suggestion" id="riSuggestion" class="form-control custom-textarea" placeholder="suggestion"></textarea>
                			</div>
                		</div>
                        <input type="file" name="icon-image" id="icon-request-image" class="axBlank axImg hide-submit">
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">original icon image</label>
                			<div class="col-xs-6">
                				<label for="icon-request-image" class="padding-small font-bigger pointer">
                                <i class="fa fa-camera"></i>            
                                </label>
                			</div>
                		</div>
                			<div class="col-xs-offset-3">
                				<input type="submit" class="numix-red padding-large ui-text-white">
                			</div>
                	{{Form::close()}}
                <!-- icon submit form ends -->

                <!-- icon submit form starts -->
                	{{Form::open(array('url'=>'','class'=>'form-horizontal hidden-x','id'=>"submit-icon-form"))}}
                		<input type="hidden" name="action" value="submit-icon-form">
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">icon name</label>
                			<div class="col-xs-6">
                				<input type="email" name="email" id="email" class="form-control custom-input" placeholder="Email">
                			</div>
                		</div>
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">more info</label>
                			<div class="col-xs-6">
                				<textarea  name="message" id="message" class="form-control custom-textarea" placeholder="message"></textarea>
                			</div>
                		</div>
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">suggestion</label>
                			<div class="col-xs-6">
                				<textarea  name="message" id="message" class="form-control custom-textarea" placeholder="message"></textarea>
                			</div>
                		</div>
                		<div class="form-group">
                			<label for="email" class="form-label col-xs-2">original icon image</label>
                			<div class="col-xs-6">
                				<input type="email" name="email" id="email" class="form-control custom-input" placeholder="Email">
                			</div>
                		</div>
                			<div class="col-xs-offset-3">
                				<input type="submit" class="numix-red padding-large ui-text-white">
                			</div>
                	{{Form::close()}}
                <!-- icon submit form ends -->

                </div>
                
            </div>
</section>