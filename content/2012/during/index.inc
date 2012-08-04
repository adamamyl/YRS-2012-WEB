        <div class="hero-unit">
        <h1>SAP Festival of Code 2012</h1>
        <p><a class="btn btn-danger btn-large">Where am I meant to be? &rarr;</a> <a class="btn btn-large">About the weekend festival &rarr;</a> <a class="btn btn-large">Press &amp; info &rarr;</a></p>
      </div>
    <div class="row" style="margin-bottom:30px;margin-top:30px; clear:both">
    <div class="span8">
        <!--<ul class="nav nav-tabs" id="yrs-info-tabs">
            <li class="active"><a href="#live-tweets">Live Tweets</a></li>
            <li><a href="#about-the-event">About The Event</a></li>
            <li><a href="#about-yrs">About Young Rewired State</a></li>
            <li><a href="#last-year">Last Year</a></li>
        </ul>
        
        <div class="tab-content">
        	<div class="tab-pane active" id="live-tweets">
			<div id="twitterwidget2"> </div>
                
		  </div>
		  <div class="tab-pane" id="about-the-event">
                <p style="line-height:150%;color:#333">Young Rewired State (YRS) is a spin-off event from the Rewired State series. Born from a combination of improving young people's access to technology and engineering with Rewired States mission of openness, we present to you: the annual Festival of Code.</p>
                <p style="line-height:150%;color:#333">The week-long event in 2012 runs from the <strong>6th to the 12th August</strong>. During that week businesses, small and large, around the country act as hosts to local young people, YRS alumni, Rewired State mentors and other volunteers. YRSers will be challenged to build digital products: mobile and web, using at least one piece of open data. It is <strong>free for every under 18</strong> to enter. If you are interested, here's what you'll need:</p>
                <ul>
                  <li>A laptop (any laptop you like, as long as you're comfortable using it)</li>
                  <li>At least a very basic understanding of programming, spreadsheets or graphics</li>
                </ul>
                <p style="line-height:150%;color:#333">At the end of the week everyone piles on coaches, trains and cars to the <a href="http://">The Custard Factory in Birmingham</a> where you will have a night of camp and code, pizza and camaraderie.</p>
                <p style="line-height:150%;color:#333">On the Saturday, show off your creations to press, government and industry. Friends are made, lives are changed and, most importantly, prizes are given!</p>
		  </div>
            <div class="tab-pane" id="about-yrs">
                <p style="line-height:150%;color:#666">Young Rewired State is the philanthropic arm of Rewired State. Our primary focus is to find and foster the young children and teenagers who are driven to teaching themselves how to code, how to program the world around them. This is a mighty challenge though well-supported with free tutorials online, but inevitably an isolating and solitary activity.</p>
                <p style="line-height:150%;color:#666">The community of Rewired Staters, YRS alumni and current YRSers enables peer to peer learning and ends the often isolating experience of teaching yourself to code.</p>
			</div>
            <div class="tab-pane" id="last-year">
                <p style="line-height:150%;"><iframe width="100%" height="480" src="http://www.youtube.com/embed/odT4cgd7d8c?rel=0&theme=white" frameborder="0" allowfullscreen></iframe></p>
			</div>
        </div>-->
		
		
	<iframe width="100%" height="600" src="//cms.youngrewiredstate.org/data/api/centres.example.html" frameborder="0"></iframe>
        
            
    </div>
    <div class="span4">
            <!--<blockquote style="font-family:Arial, Helvetica, sans-serif;font-size:36px;font-weight:bold;line-height:145%">Challenge yourself to build <span style="color:#B63322">digital products</span> using <span style="color:#B63322">open data</span> to improve the world around you.</blockquote>--><div id="twitterwidget"> </div>
    </div>
    <br style="clear:both">
    </div>
	<style>
	
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
	background-color:#CCC;
	color:#666;
	padding:2px 5px;
	margin:0px;
	text-shadow:#fff 0px 1px 0px;
	font-size:0.9em;
}
.tweet small span {
	color:#999;
}
.tweet {padding:20px 0px;}
.tweet p.help {
	background-color:#09C;
}

#twitterwidget {
	max-height:800px;
	overflow:hidden;
}
</style>
<script>
var greatest_id=0;

$(function(){
	ref();
	setInterval("ref();",1000*60);
	maps_initialize();
});

function ref(){
$.ajax({
   type: 'GET',
    url: 'http://search.twitter.com/search.json?q=YRSSAP+OR+YRS2012+OR+YRSHELP&count=10',
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
</script>
