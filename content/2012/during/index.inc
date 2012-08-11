        <div class="hero-unit">
        <h1>SAP Young Rewired State 2012</h1>
        <p><a class="btn btn-danger btn-large" href="kids/itinerary.html">Where am I meant to be? &rarr;</a> <a class="btn btn-large" href="foc/">About the weekend festival &rarr;</a> <a class="btn btn-large" href="foc/press.html">Press &amp; info &rarr;</a> <a class="btn btn-large" href="kids/links.html">Coding Links &rarr;</a><a class="btn btn-large" href="http://new.livestream.com/keyone/yrs2012">Live Stream &rarr;</a></p>
        </a></p>
      </div>
	  <h1>As it Happens <small>#yrs2012 #yrshelp #SAPYRS</small></h1>
	  <div id="flickrwidget-container"><div id="flickrwidget">&nbsp;</div></div>
    <div class="row" style="margin-bottom:30px;margin-top:30px; clear:both">
    <div class="span8">
		
		
	<iframe width="100%" height="600" src="//cms.youngrewiredstate.org/data/api/centres.homepage.html" frameborder="0"></iframe>
        
            
    </div>
    <div class="span4">
            <!--<blockquote style="font-family:Arial, Helvetica, sans-serif;font-size:36px;font-weight:bold;line-height:145%">Challenge yourself to build <span style="color:#B63322">digital products</span> using <span style="color:#B63322">open data</span> to improve the world around you.</blockquote>--><div id="twitterwidget"> </div>
    </div>
    <br style="clear:both">
    </div>
	<style>
	
body { padding:0px 0px !important; }
.container#container {background-color:#fff;padding:80px 20px 0px 20px !important;}
	
.tweet, .tweet p{
font-size:10px;
}

.tweet {
	font-family:Arial, Helvetica, sans-serif;
	clear:both;
	cursor:default;
}
.tweet a {color:inherit;text-decoration:none;}
.tweet p {
	color:#fff;
	background-color:#C30;
	display:block;
	float:left;
	padding:5px;
	margin:0px;
}
.tweet small {
	display:block;
	float:left;
	clear:both;
	background-color:#eee;
	color:#666;
	padding:2px 5px;
	margin:0px;
	text-shadow:#fff 0px 1px 0px;
	font-size:0.9em;
}
.tweet small span {
	color:#999;
}
.tweet {padding:20px 0px 0px 0px;}
.tweet p.help {
	background-color:#09C;
}
.tweet p.SAP {
	background-color:#000;
}

#twitterwidget {
	max-height:800px;
	overflow:hidden;
	margin-top:-20px;
}

.pic a {color:inherit;text-decoration:none;}
a img  {border:none}
.pic {padding:5px 10px 5px 0px;}
#flickrwidget-container {height:165px; width:auto; overflow:hidden; }
#flickrwidget {width:150%}

.hero-unit {padding:30px !important;}

h1 small {font-size:0.7em;color:#999;}

.tickets {display:none !important;}

.festivaltickets {display:block !important;}

</style>
<script>
var greatest_id=0;
var greatest_flickr_date=0;

$(function(){
	ref();
	setInterval("ref();",1000*60);
	refFlickr();
	setInterval("refFlickr();",1000*60);
});

function ref(){
$.ajax({
   type: 'GET',
    url: 'http://search.twitter.com/search.json?q=SAPYRS+OR+YRSSAP+OR+YRS2012+OR+YRSHELP&count=10',
    async: false,
	jsonpCallback: 'jsonCallback',
	contentType: "application/json",
	dataType: 'jsonp',
	success: function(json) {
		for(var i=json.results.length-1;i>=0;--i) {
			console.log(json.results[i].created_at);	
			if(json.results[i].id>greatest_id){
				greatest_id = json.results[i].id;
				createTweet(json.results[i]);
			}else console.log('old tweet');
		}
    },
    error: function(e) {
		console.log(e.message);
    }
});
}

function createTweet(tweet){
	var home = document.getElementById('twitterwidget');
	var tweetDiv = document.createElement('div');
	tweetDiv.className='tweet';
	var tweetContent = document.createElement('p');
	var tweetMeta = document.createElement('small');
	if(/yrshelp/i.test(tweet.text)) tweetContent.className='help';
	if(/SAPYRS/i.test(tweet.text)) tweetContent.className='SAP';
	tweetContent.innerHTML = '<a href="http://twitter.com/'+tweet.from_user+'/status/'+tweet.id_str+'">'+tweet.text+'</a>';
	var date = new Date(tweet.created_at);
	tweetMeta.innerHTML = '<a href="http://twitter.com/'+tweet.from_user+'">' + tweet.from_user_name+' ('+ tweet.from_user +')</a> <span>'+date.toDateString() + ' ' + date.getHours()+':'+((date.getMinutes()>9)?date.getMinutes():('0'+date.getMinutes()))+'</span>';
	tweetDiv.appendChild(tweetContent);
	tweetDiv.appendChild(tweetMeta);
	$(tweetDiv).hide();//tweetDiv.style.display='none';
	//document.getElementById('twitterwidget').appendChild(tweetDiv);
	//alert(tweetDiv);
	home.insertBefore(tweetDiv,home.firstChild);
	//$(tweetDiv).insertBefore(document.getElementById('twitterwidget').children[0]);
	$(tweetDiv).show(500);//tweetDiv.style.display='none';

}

function refFlickr(){
$.ajax({
   type: 'GET',
    url: 'http://api.flickr.com/services/feeds/photos_public.gne?tags=yrs2012&lang=en-us&format=json',
    async: false,
	jsonpCallback: 'jsonFlickrFeed',
	contentType: "application/json",
	dataType: 'jsonp',
	success: function(json) {
		console.log(json.items);
		for(var i=json.items.length-1;i>=0;--i) {
			console.log(json.items[i].created_at);
			var date = new Date(json.items[i].published);
			var mils = date.getTime();
			if(mils>greatest_flickr_date){
				greatest_flickr_date = mils;
				createPic(json.items[i]);
			}else console.log('old pic');
		}
    },
    error: function(e) {
		console.log(e.message);
    }
});
}

function createPic(pic){
	var home = document.getElementById('flickrwidget');
	var picDiv = document.createElement('div');
	picDiv.className='pic';
	var picLink = document.createElement('a');
	picLink.href = pic.link;
	var picContent = document.createElement('img');
	picContent.src=pic.media.m;
	picContent.style.height='155px';
	picDiv.style.cssFloat='left';
	picLink.appendChild(picContent);
	picDiv.appendChild(picLink);
	$(picDiv).hide();//tweetDiv.style.display='none';
	console.log(pic.media.m);
	home.insertBefore(picDiv,home.firstChild);
	//$(picDiv).show(500);//tweetDiv.style.display='none';
	$(picContent).load(imageLoaded);

}

function imageLoaded(e){
	console.log(e.target.parentElement.parentElement);
	$(e.target.parentElement.parentElement).show(500);
}

</script>
