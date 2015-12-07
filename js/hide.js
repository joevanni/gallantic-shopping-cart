// JavaScript Document
//$(document).ready(function(blind)
//
//{
//	"use strict";
//	$("#detailinformation").hide();
//	$(".faqsinfo").click(function(){
//		if ($(this).next("#detailinformation").css("display")==="none"){
//			$(this).next("#detailinformation").show();
//		$(this).find("img").attr("src","AdminImage/arrowup.png");
//		}
//				else
//				{
//					$(this).next("#detailinformation").hide();
//					$(this).find("img").attr("src","AdminImage/arrowdown.png");
//				}
//	});
//});


//$('#hide').click(function()
//
//{
//	"use strict";
//	$('#data').hide();
//	$('#hide').hide();
//	$('#show').show();
//});
//$('#show').click(function()
//{
//	"use strict";
//	$('#data').show();
//	$('#show').hide();
//	$('#hide').show();
//});
//$('#show').click(function(blind)
//{
//	$('#show').css('display','none');
//	$('#data').show();
//	$('#hide').show();
//});
//$('#hide').click(function(blind)
//{
//	$('#hide').css('display','none');
//	$('#data').hide();
//	$('#show').show();
//});
$("#accordion").accordion({collapsible:true,heightStyle:"content",active:false });