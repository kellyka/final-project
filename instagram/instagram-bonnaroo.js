// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=01a441f8a5914d4dae7905d3396b695b&redirect_uri=http://kaitlynkellydesign.com/static/api-project&response_type=token 

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id
	
						
$(function() {
	
	var apiurl = "https://api.instagram.com/v1/tags/bonnaroo2015/media/recent?access_token=1339286951.01a441f.61d79c1351d34f61bb460c6641d33c04&callback=?"
	var access_token = location.hash.split('=')[1];
	var html = ""
	
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData
		});
				
		
		function parseData(json){
			console.log(json);
			
			$.each(json.data,function(i,data){
				//html += '<p>Filter:"'+ data.filter+'"</p>';
				html += '<img src ="' + data.images.low_resolution.url + '">';
				
			});
			
			console.log(html);
			$("#results").append(html);
			
		}
		
		
                
               
 });