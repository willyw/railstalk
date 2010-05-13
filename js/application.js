// http://beckelman.net/post/2009/01/22/Copy-to-Clipboard-with-ZeroClipboard-Flash-10-and-jQuery.aspx
jQuery(document).ready(function(){
	// alert("we are ready");
	jQuery("pre").each(function(){
		// alert("going to add one");
		// var codeContent = alert(jQuery(this).text());
		// alert( jQuery(this).prepend("<span class='copy-button'></span>").children("span.copy-button").text() ) ;
		jQuery(this).wrap("<div class='code-wrapper' />");
		jQuery(this).before("<span class='copy-button' title='Copied to Clipboard'></span>");
		
	});
	
	jQuery("span.copy-button").each(function(){
		jQuery(this).tipsy({ fallback: "Copied to Clipboard" , trigger: 'manual'});
		
		var text  = getCode( jQuery(this) );
		var clip = new ZeroClipboard.Client();
		clip.glue( this );
		clip.addEventListener("mousedown", function(){
			clip.setText(text);
		});
		// alert("Done copying to the clip");
		var copyButton = this;
		clip.addEventListener('complete', function(client, text){
			// alert("complete");
			jQuery(copyButton).tipsy("show");
			setTimeout(function(){
				jQuery(copyButton).tipsy('hide');
			}, 3000 );
		});
	});
	jQuery("embed").parent().addClass("flash");

});

function getCode( jqNode){
	return jqNode.parent().text();
};


jQuery(document).ready(function(){
	jQuery("span.copy-button").tipsy({ fallback: "Copied" , gravity: 'w'});
});


