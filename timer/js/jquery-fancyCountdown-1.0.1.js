/**
 * jQuery "Fancy Countdown" Plugin
 * 
 * @name jquery-fancyCountdown-1.0.1.js
 * @author Sarpdoruk TAHMAZ - http://www.sarpdoruktahmaz.com
 * @version 1.0.1
 * @date April 20, 2011
 * @category jQuery Plugin Widget
 * @copyright (c) 2011 Sarpdoruk TAHMAZ (sarpdoruktahmaz.com)
 * @license GNU - GENERAL PUBLIC LICENSE - https://github.com/jquery/jquery/blob/master/GPL-LICENSE.txt
 * @info Visit http://www.sarpdoruktahmaz.com/projects/fancy-countdown for more info
 * @Special thanks to Onat ÇELMEN http://www.onatcelmen.com for the plugin idea
**/
(function($){
	$.fn.fancyCountdown = function(custom) {
		
		/********** This object's id **********/
		var thisID = $(this).attr("id"),
		
		/********** Default Settings **********/
		settings = {
			'year':2011, //Target year
			'month':07, //Target Month
			'day':11, //Target Day
			'hour':08, //Target Hour
			'minute':00, //Target Minute
			'second':00, //Target Second
			'timeReachedMessage':'Hoorraay!!', //Message after the time has reached
			'timeStamps':['Days', 'Hours', 'Minutes', 'Seconds'] //Timestamps in your own language
		},
		
		/********** Table IDs **********/
		tableIds = ['d', 'h', 'm', 's'], 
		
		/********** Table **********/
		tables = "",
		
		/********** Loop Variables *********/
		i,
		j,
		k,
		
		/********** Color Array **********/
		color = {
			'blank':'gray',		
			'seconds':'green',
			'minutes':'darkblue',
			'hours':'red',
			'days':'orange'
		},
		
		/********** Date objects creation and comparison between two dates **********/
		now = new Date(),
		nowMiliseconds = Date.UTC(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes(), now.getSeconds()),
		targetDateMiliseconds = Date.UTC(settings['year'], settings['month'] - 1, settings['day'], settings['hour'], settings['minute'], settings['second']),
		differenceMiliseconds = targetDateMiliseconds - nowMiliseconds,
		differenceSeconds = differenceMiliseconds / 1000,
		
		/********** Other variables declarations **********/
		countdownTimer, 
		days, 
		hours, 
		minutes, 
		seconds,
		d1, d2, d3,
		h1, h2,
		m1, m2,
		s1, s2,
		
		/********** Number indexes in table **********/
		numberIndex = [
						  [0,1,2,3,4,7,8,11,12,15,16,19,20,23,24,25,26,27],
						  [3,7,11,15,19,23,27],
						  [0,1,2,3,7,11,12,13,14,15,16,20,24,25,26,27],
						  [0,1,2,3,7,11,12,13,14,15,19,23,24,25,26,27],
						  [0,3,4,7,8,11,12,13,14,15,19,23,27],
						  [0,1,2,3,4,8,12,13,14,15,19,23,24,25,26,27],
						  [0,1,2,3,4,8,12,13,14,15,16,19,20,23,24,25,26,27],
						  [0,1,2,3,7,11,15,19,23,27],
						  [0,1,2,3,4,7,8,11,12,13,14,15,16,19,20,23,24,25,26,27],
						  [0,1,2,3,4,7,8,11,12,13,14,15,19,23,24,25,26,27]								
					  ];	

		/********** Extend defaults with the custom options **********/
		if(custom) { $.extend(settings, custom); }
		
		/********** Create Tables **********/
		tables += "<table id='fancy-countdown'><tr>";
		for(j = 0; j < tableIds.length; j++) {
			tables += "<td>";
			if(j == 0) {
				for(i = 2; i <= 3; i++) {
					tables += "<table id='"+tableIds[j]+i+"'>";
					for(k = 0; k <= 27; k++) {
						if(k == 0) { tables += "<tr>"; } else if(k % 4 == 0) { tables += "</tr><tr>"; }
						tables += "<td id='"+tableIds[j]+i+k+"'></td>";
						if(k == 27) { tables += "</tr>"; }
					}
					tables += "</table>";
				}
			} else {
				for(i = 1; i <= 2; i++) {
					tables += "<table id='"+tableIds[j]+i+"'>";
					for(k = 0; k <= 27; k++) {
						if(k == 0) { tables += "<tr>"; } else if(k % 4 == 0) { tables += "</tr><tr>"; }
						tables += "<td id='"+tableIds[j]+i+k+"'></td>";
						if(k == 27) { tables += "</tr>"; }
					}
					tables += "</table>";
				}
			}
			tables += "</td>";
		}
		tables += "</td></tr><tr><td id='d-tx'>"+settings['timeStamps'][0]+"</td><td>"+settings['timeStamps'][1]+"</td><td>"+settings['timeStamps'][2]+"</td><td>"+settings['timeStamps'][3]+"</td></tr></table>";
		
		/********** Append tables to $(this) object **********/
		$(this).append(tables);
		
		/********** Style Tables **********/
		$(this).find("table").css({"display":"inline-table"}).attr({"cellspacing":"3px"});
		
		/********** Add gray balls to each cell **********/
		$("#d1 td,#d2 td,#d3 td,#h1 td,#h2 td,#m1 td,#m2 td,#s1 td,#s2 td").append("<img src='images/gray-ball.png' />");
		
		/********** Check if target date has passed or not **********/
		if(differenceMiliseconds < 0) {				
			$(this).html("<span id='timeReached'>"+settings['timeReachedMessage']+"</span>");
		} else {
			countdownTimer = window.setInterval(updateTime, 1000);	
		}
		
		/********** INITIALIZE FOR THE FIRST TIME **********/
		/********** Time Calculation **********/
		days = Math.floor(differenceSeconds / 86400);
		differenceSeconds -= (days * 86400);
		hours = Math.floor(differenceSeconds / 3600);			
		differenceSeconds -= (hours * 3600);
		minutes = Math.floor(differenceSeconds / 60);
		differenceSeconds -= (minutes * 60);
		seconds = (differenceSeconds % 60);
		
		/********** SECONDS **********/
		if(parseInt(seconds) < 10) {
			seconds = "0"+seconds;	
		}
		
		seconds = seconds.toString();
		
		s1 = seconds.substr(0,1);
		s2 = seconds.substr(1,1);
		
		drawNumber("s1", s1, "seconds");
		drawNumber("s2", s2, "seconds");
		
		/********** MINUTES **********/
		if(parseInt(minutes) < 10) {
			minutes = "0"+minutes;	
		}
		
		minutes = minutes.toString();
		
		m1 = minutes.substr(0,1);
		m2 = minutes.substr(1,1);
			
		drawNumber("m1", m1, "minutes");
		drawNumber("m2", m2, "minutes");
		
		/********** HOURS **********/
		if(parseInt(hours) < 10) {
			hours = "0"+hours;	
		}
		
		hours = hours.toString();
		
		h1 = hours.substr(0,1);
		h2 = hours.substr(1,1);
			
		drawNumber("h1", h1, "hours");
		drawNumber("h2", h2, "hours");
		
		/********** DAYS **********/
		if(parseInt(days) < 100 && parseInt(days) > 10) {
			days = "0"+days;	
		} else if(parseInt(days) < 10) {
			days = "00"+days;	
		}
		
		days = days.toString();
		
		d1 = days.substr(0,1);
		d2 = days.substr(1,1);
		d3 = days.substr(2,1);
			
		drawNumber("d1", d1, "days");
		drawNumber("d2", d2, "days");
		drawNumber("d3", d3, "days");
		/********** INITIALIZATION OVER **********/
		
		
		/********** Update time every second **********/
		function updateTime() {
			
			/********** Date objects creation and comparison between two dates **********/
			now = new Date();
			nowMiliseconds = Date.UTC(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes(), now.getSeconds());
			differenceMiliseconds = targetDateMiliseconds - nowMiliseconds;
			differenceSeconds = differenceMiliseconds / 1000;
			
			/********** Check if target date has reached **********/
			if(differenceMiliseconds < 0) {				
				$("#"+thisID).html("<span id='timeReached'>"+settings['timeReachedMessage']+"</span>");
				window.clearInterval(countdownTimer);
				return false;
			}
						
			/********** Time Calculation **********/
			days = Math.floor(differenceSeconds / 86400);
			differenceSeconds -= (days * 86400);
			hours = Math.floor(differenceSeconds / 3600);			
			differenceSeconds -= (hours * 3600);
			minutes = Math.floor(differenceSeconds / 60);
			differenceSeconds -= (minutes * 60);
			seconds = (differenceSeconds % 60);
			
			/********** SECONDS **********/
			if(parseInt(seconds) < 10) {
				seconds = "0"+seconds;	
			}
			
			seconds = seconds.toString();
			
			s1 = seconds.substr(0,1);
			s2 = seconds.substr(1,1);
		
			drawNumber("s1", s1, "seconds");
			drawNumber("s2", s2, "seconds");
			
			/********** Decrease minutes when seconds reach 59 **********/
			if(s1 == "5" && s2 == "9") {
				/********** MINUTES **********/
				if(parseInt(minutes) < 10) {
					minutes = "0"+minutes;	
				}
				
				minutes = minutes.toString();
				
				m1 = minutes.substr(0,1);
				m2 = minutes.substr(1,1);
					
				drawNumber("m1", m1, "minutes");
				drawNumber("m2", m2, "minutes");
				
				/********** Decrease hours when minutes reach 59 **********/
				if(m1 == "5" && m2 == "9") {
					/********** HOURS **********/
					if(parseInt(hours) < 10) {
						hours = "0"+hours;	
					}
					
					hours = hours.toString();
					
					h1 = hours.substr(0,1);
					h2 = hours.substr(1,1);
						
					drawNumber("h1", h1, "hours");
					drawNumber("h2", h2, "hours");
					
					/********** Decrease days when hours reach 23 **********/
					if(h1 == "2" && h2 == "3") {
						/********** DAYS **********/
						if(parseInt(days) < 100 && parseInt(days) > 10) {
							days = "0"+days;	
						} else if(parseInt(days) < 10) {
							days = "00"+days;	
						}
						
						days = days.toString();
						
						d1 = days.substr(0,1);
						d2 = days.substr(1,1);
						d3 = days.substr(2,1);
							
						drawNumber("d1", d1, "days");
						drawNumber("d2", d2, "days");
						drawNumber("d3", d3, "days");
						
					}
					
				}
				
			}
						
		}
		
		/********** Draws numbers to the cells **********/
		function drawNumber(objID, number, timeStamp) {			
			allGray(objID);
			number = parseInt(number);
			for(var i = 0; i <= numberIndex[number].length; i++) {
				$("#"+objID+numberIndex[number][i]).find("img").attr("src","images/"+color[timeStamp]+"-ball.png");	
			}
		}		
		
		/********** Makes all cells gray **********/
		function allGray(objID) {
			var id = $("#"+objID).attr("id"), i, allGray = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];
			for(i = 0; i < allGray.length; i++) {
				$("#"+id+allGray[i]).find("img").attr("src","images/"+color['blank']+"-ball.png");	
			}
		}
	
	};
})(jQuery);