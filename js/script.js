!function(e){e(document).ready(function(){e("img").unveil(),e("#showfilter").click(function(){e("#find-property").toggle()}),$window=e(window),e("#flat").click(function(){e(".flat").each(this.checked?function(){this.checked=!0}:function(){this.checked=!1})}),e("#house").click(function(){e(".house").each(this.checked?function(){this.checked=!0}:function(){this.checked=!1})}),e("#orderby").change(function(){e("#search-form").submit()});var o,n,i=new google.maps.LatLng(lat,lng);n=1>=srange?13:2>=srange?12:4>=srange?11:5>=srange?10:15>=srange?9:30>=srange?8:40>=srange?7:13;var t={center:i,disableDefaultUI:!0,zoom:n,scrollwheel:!0,navigationControl:!0,mapTypeControl:!1,scaleControl:!1,draggable:!0,mapTypeId:google.maps.MapTypeId.ROADMAP},o=new google.maps.Map(document.getElementById("map"),t),a=(new google.maps.Marker({map:o,position:new google.maps.LatLng(lat,lng),title:loctitle}),new google.maps.Circle({strokeColor:"#79b18d",strokeOpacity:.8,strokeWeight:2,fillColor:"#79b18d",fillOpacity:.35,map:o,center:i,radius:srange/62137e-8}),{Android:function(){return navigator.userAgent.match(/Android/i)},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},Opera:function(){return navigator.userAgent.match(/Opera Mini/i)},Windows:function(){return navigator.userAgent.match(/IEMobile/i)},any:function(){return a.Android()||a.BlackBerry()||a.iOS()||a.Opera()||a.Windows()}});testMobile=a.any(),null==testMobile&&void 0!=e(".parallax .bg")&&e(".parallax .bg").parallax("50%",.3),function(){var o=e(".noo-header"),n=e(".top-header").outerHeight(!0);if(o.length){var n=e(".top-header").outerHeight(!0);e(window).scroll(function(){var i=e(window).scrollTop();i>n?o.hasClass("affix")||o.addClass("affix"):o.removeClass("affix")})}}(),function(){e(".main-navigation .dropdown").on({mouseenter:function(){e(this).addClass("open")},mouseleave:function(){e(this).removeClass("open")}}),e(".main-navigation .dropdown-submenu").on({mouseenter:function(){e(this).addClass("open")},mouseleave:function(){e(this).removeClass("open")}})}(),function(){e('[data-toggle="tooltip"]').length&&e('[data-toggle="tooltip"]').tooltip()}(),function(){e("#noo-slider-1 .sliders").length&&e("#noo-slider-1 .sliders").carouFredSel({infinite:!0,circular:!0,responsive:!0,debug:!1,scroll:{items:1,duration:600,pauseOnHover:"resume",fx:"scroll"},auto:{timeoutDuration:3e3,progress:{bar:"#noo-slider-1-timer"},play:!1},pagination:{container:"#noo-slider-1-pagination"},prev:{button:"#noo-slider-1-prev"},next:{button:"#noo-slider-1-next"},swipe:{onTouch:!0,onMouse:!0}})}(),function(){e("#noo-slider-2 .sliders").length&&e("#noo-slider-2 .sliders").carouFredSel({infinite:!0,circular:!0,responsive:!0,debug:!1,items:{start:0},scroll:{items:1,duration:600,fx:"fade"},auto:{timeoutDuration:3e3,play:!0},pagination:{container:"#noo-slider-2-pagination"},swipe:{onTouch:!0,onMouse:!0}})}(),function(){e("#noo-slider-3 .sliders").length&&e("#noo-slider-3 .sliders").carouFredSel({infinite:!0,circular:!0,responsive:!0,debug:!1,items:{start:0},scroll:{items:1,duration:600,pauseOnHover:"resume",fx:"scroll"},auto:{timeoutDuration:3e3,play:!0},swipe:{onTouch:!0,onMouse:!0}})}(),function(){e("#noo-slider-4 .sliders").length&&e("#noo-slider-4 .sliders").carouFredSel({infinite:!0,circular:!0,responsive:!0,debug:!1,items:{start:"random"},scroll:{items:1,duration:600,pauseOnHover:"resume",fx:"scroll"},auto:{timeoutDuration:3e3,progress:{bar:"#noo-slider-4-timer"},play:!0},pagination:{container:"#noo-slider-4-pagination"},swipe:{onTouch:!0,onMouse:!0}})}(),function(){e("#noo-slider-5 .sliders").length&&e("#noo-slider-5 .sliders").carouFredSel({infinite:!0,circular:!0,responsive:!0,debug:!1,items:{start:0},scroll:{items:1,duration:600,pauseOnHover:"resume",fx:"scroll"},auto:{timeoutDuration:3e3,play:!1},prev:{button:"#noo-slider-5-prev"},next:{button:"#noo-slider-5-next"},swipe:{onTouch:!0,onMouse:!0}})}(),function(){e(".gprice-slider-range").length&&(e(".gprice-slider-range").noUiSlider({start:[200,11e6],range:{min:200,max:11e6},step:1,format:wNumb({decimals:0,thousand:".",prefix:"&#36;"}),connect:!0}),e(".gprice-slider-range").Link("lower").to('-inline-<div class="tooltip"></div>',function(o){e(this).html("<span>"+o+"</span>")}),e(".gprice-slider-range").Link("upper").to('-inline-<div class="tooltip"></div>',function(o){e(this).html("<span>"+o+"</span>")}))}(),function(){e(".garea-slider-range").length&&(e(".garea-slider-range").noUiSlider({start:[200,11e6],range:{min:200,max:11e6},step:1,format:wNumb({decimals:0,thousand:".",prefix:"&#36;"}),connect:!0}),e(".garea-slider-range").Link("lower").to('-inline-<div class="tooltip"></div>',function(o){e(this).html("<span>"+o+"</span>")}),e(".garea-slider-range").Link("upper").to('-inline-<div class="tooltip"></div>',function(o){e(this).html("<span>"+o+"</span>")}))}(),function(){e(".datepicker").length&&e(".datepicker").datepicker({format:"mm/dd/yyyy",todayHighlight:!0})}(),function(){e(".animatedParent").length&&e(".animatedParent").appear(function(){{var o=e(this).find(".animated");e(this)}o.addClass("go")})}(),function(){e("#jplayer-audio-1").length&&e("#jplayer-audio-1").jPlayer({ready:function(){e(this).jPlayer("setMedia",{title:"Bubble",m4a:"http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",oga:"http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"})},cssSelectorAncestor:"#jplayer-interface-audio-1",swfPath:"/js",supplied:"m4a, oga"})}(),function(){e("#jplayer-video-1").length&&e("#jplayer-video-1").jPlayer({ready:function(){e(this).jPlayer("setMedia",{m4v:"http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v"})},size:{width:"100%",height:"100%"},swfPath:"../js/jplayer",cssSelectorAncestor:"#jplayer-interface-video-1",supplied:"m4v,"})}(),function(){e("#noo-accordion-1").length&&(e("#noo-accordion-1 .panel-title a").attr("data-parent","#noo-accordion-1"),e("#noo-accordion-1 .noo-accordion-tab:eq(0)").addClass("in"),e("#noo-accordion-1").on("show.bs.collapse",function(o){e(o.target).prev(".panel-heading").addClass("active")}),e("#noo-accordion-1").on("hide.bs.collapse",function(o){e(o.target).prev(".panel-heading").removeClass("active")}),e("#noo-accordion-1 .in").prev(".panel-heading").addClass("active"))}(),function(){e("#noo-accordion-2").length&&(e("#noo-accordion-2 .panel-title a").attr("data-parent","#noo-accordion-2"),e("#noo-accordion-2 .noo-accordion-tab:eq(0)").addClass("in"),e("#noo-accordion-2").on("show.bs.collapse",function(o){e(o.target).prev(".panel-heading").addClass("active")}),e("#noo-accordion-2").on("hide.bs.collapse",function(o){e(o.target).prev(".panel-heading").removeClass("active")}),e("#noo-accordion-2 .in").prev(".panel-heading").addClass("active"))}(),function(){e("#noo-tabs-1").length&&e("#noo-tabs-1 a:eq(0)").tab("show")}(),function(){e("#noo-tabs-2").length&&e("#noo-tabs-2 a:eq(0)").tab("show")}(),function(){e(".noo-counter").length&&e(".noo-counter").appear(function(){$this=jQuery(this),$this.parent().css("opacity","1");var e=parseFloat($this.text());$this.countTo({from:0,to:e,speed:1500,refreshInterval:100})})}(),function(){e(".s-prop-desc textarea").length&&e(".s-prop-desc textarea").wysihtml5({"font-styles":!1,blockquote:!1,emphasis:!0,lists:!0,html:!1,link:!0,image:!0,color:!1})}(),function(){e(".checkbox-label").length&&e(".checkbox-label").on("click",function(){e("#recurring_payment").is(":checked")?e(".recurring_time").show():e(".recurring_time").hide()})}(),function(){e(".back-to-top").on("click",function(o){return o.preventDefault(),e("html, body").animate({scrollTop:0},"slow"),!1})}()})}(jQuery);
