// Messenger Init
Messenger.options = {
	extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
	theme: 'flat',
}

// Moment Relative Time Locale
moment.locale('zh-tw');

// Moment get relativeTime function
function relativeTime(t) {
	return moment(t, 'YYYY-MM-DD HH:mm:ss').fromNow();
}

// Get gender function
function gender(g) {

	var img_male = "data:image/png;base64,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";
	var img_female = "data:image/png;base64,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";

	if ( g == 1) {
		return '<img class="ui avatar mini image" src="'+img_male+'">';
	}
	else {
		return '<img class="ui avatar mini image" src="'+img_female+'">';
	}
}

// Get content format
function formatter(content) {

	var __urlreg = /(\b(https?):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
	var __imgreg = /\.(?:jpe?g|gif|png)$/i;

	return content.replace(__urlreg, function(match){
		__imgreg.lastIndex=0;

		if(__imgreg.test(match)){
			return '<p><a href="'+match+'" target="_blank"><img class="ui big image" src="'+match+'" /></a></p>';
		}
		else{
			return '<a href="'+match+'" target="_blank">'+match+'</a>';
		}
	}).replace(/\r\n|\n\r|\r|\n/g,'<br>');
}

// Define Selene ErrorMsg
function errorMsg() {
	Messenger().post({
		message: "賽拉涅壞掉了，重新整理看看？",
		type: "error",
		showCloseButton: true,
		hideAfter: 3
	});
}


// 搜尋文章
function search() {

	$.ajax({
		async: false,
		type: 'post',
		url: 'http://167.71.210.153/selene/a/search',
		dataType: 'json',
		data: {
			keywords : $("#search-input").val()
		},
		error: function (xhr) {

		},
		success: function (response) {
			var response = $.parseJSON(JSON.stringify(response));

			if (response.status != true) {

				Messenger().post({
					message: "找不到相關文章 QQ",
					type: "error",
					showCloseButton: true,
					hideAfter: 2
				});

			}
			else {
				$('#display_article>table>tbody').empty();
				$.each(response.result, function(i) {

					$('#display_article>table').append(
						'<tr onclick="loadArticle('+ response.result[i].type + ', ' + response.result[i].id + ')"><td>'+ response.result[i].like_count +'</td>'+
							'<td>' + response.result[i].reply_count +'</td>'+
							'<td>' + response.result[i].art_name + '</td>'+
							'<td>' + gender(response.result[i].gender) + response.result[i].author +'</td>'+
							'<td>' + relativeTime(response.result[i].time) +'</td>'+
						'</tr>'
					);
				});
				scroll_switch = false;
				$('#loading-article').hide();
				$("#discuss-topic").text('搜尋');
				$("#topic-icon").removeClass('quote').addClass('search');
				$('#no-more-article').show();
				$("#article-bar").hide();
			}
		}
	});

}


// 搜尋文章
function hot(type, name) {

	if ( $('#article-bar-hot i').hasClass('right quote') ) {
		val = 0;
		reply_count = 0;
		reply_f_count = 0;
		scroll_switch = true;
		$('#display_article>table>tbody').empty();
		$("#topic-icon").removeClass('comments outline').addClass('right quote');
		$("#discuss-topic").text(name);
		$('#no-more-article').hide();
		$("#article-bar-hot").html('<i class="comments outline icon"></i> 熱門文章');
		loadmore();
	}
	else {

		type = ( typeof type == "null" ) ? '' : type;

		$.ajax({
			async: false,
			type: 'get',
			url: 'http://167.71.210.153/selene/a/' +type+ '/query/hot',
			dataType: 'json',
			error: function (xhr) {

			},
			success: function (response) {
				var response = $.parseJSON(JSON.stringify(response));

				if (response.status != true) {

					Messenger().post({
						message: "找不到相關文章 QQ",
						type: "error",
						showCloseButton: true,
						hideAfter: 2
					});


				}
				else {
					$('#display_article>table>tbody').empty();
					$.each(response.result, function(i) {

						$('#display_article>table').append(
							'<tr onclick="loadArticle('+ response.result[i].type + ', ' + response.result[i].id + ')"><td>'+ response.result[i].like_count +'</td>'+
								'<td>' + response.result[i].reply_count +'</td>'+
								'<td>' + response.result[i].art_name + '</td>'+
								'<td>' + gender(response.result[i].gender) + response.result[i].author +'</td>'+
								'<td>' + relativeTime(response.result[i].time) +'</td>'+
							'</tr>'
						);
					});
					scroll_switch = false;
					$('#loading-article').hide();
					$("#discuss-topic").text(name + ' 熱門文章');
					$("#topic-icon").removeClass('right quote').addClass('comments outline');
					$('#no-more-article').show();
					$("#article-bar-hot").html('<i class="right quote icon"></i> 一般文章');
				}
			}
		});
	} // END OF IF
}


var join_info_image;

$(document).ready(function() {

	// upload images ajax
	$("#problem-imgur").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			url: "http://167.71.210.153/selene/other/ajax_upload_imgur",
			type: "POST",
			dataType:'json',
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(response) {

				var response = $.parseJSON(JSON.stringify(response));
				$("#problem-choose-image").val('');
				$("#content").html($("#content").text() + response.result);
			},
			error: function() {
				errorMsg();
			}
	   });
	}));

	// 發文 button 操控 file 瀏覽檔案
	$("#newpost-choose-image").change(function(){
		$("#newpost-upload").click();
		Messenger().post({
			message: "上傳完成將自動插入文章！",
			type: "info",
			showCloseButton: true,
			hideAfter: 2
		});
	});

	// 發文點擊 icon 選擇圖片
	$("#newpost-select-pic").click(function(){
		$("#newpost-choose-image").click();
	});

	// 搜尋文章的 input
	$("#search-input").keypress(function(e){
		code = (e.keyCode ? e.keyCode : e.which);
		if (code == 13 && this.value ) search();
	});

	// Scroll to top
	$('.scroll-to-top').click(function() {
		$('html, body').animate({
			scrollTop: 0
		}, 600);
	});

	// Scroll to bottom
	$('.scroll-to-bottom').click(function() {
		$('html, body').animate({
			scrollTop: $(document).height()
		}, 600);
	});

	// Scroll to top on opening modal
	$('.scroll-to-top-onmodal').click(function() {
		$('#article_modal').animate({
			scrollTop: 0
		}, 600);
	});

	$('.ui.dropdown').dropdown();

	// $('#').search({
	// 	source:
	// });


// Department List Last is 503
var Dept_List = [
	{ title: '機械工程系', id: '1' },
	{ title: '化工與材料工程系', id: '2' },
	{ title: '電機工程系', id: '3' },
	{ title: '電子工程系', id: '4' },
	{ title: '資訊工程系', id: '5' },
	{ title: '資訊網路工程系', id: '6' },
	{ title: '土木工程系', id: '7' },
	{ title: '電腦通訊與系統工程系', id: '8' },
	{ title: '空間資訊與防災科技系', id: '9' },
	{ title: '應用空間資訊系', id: '10' },
	{ title: '材料製造科技系', id: '11' },
	{ title: '數位多媒體設計系', id: '12' },
	{ title: '機電光工程系', id: '13' },
	{ title: '建築系', id: '14' },
	{ title: '遊戲系統創新設計系', id: '15' },
	{ title: '飛機系統工程系', id: '16' },
	{ title: '航空運輸系', id: '17' },
	{ title: '航空機械系', id: '18' },
	{ title: '航空電子系', id: '19' },
	{ title: '航空服務管理系', id: '20' },
	{ title: '國際企業系', id: '21' },
	{ title: '財務金融系', id: '22' },
	{ title: '企業管理系', id: '23' },
	{ title: '資訊管理系', id: '24' },
	{ title: '工業管理系', id: '25' },
	{ title: '應用外語系', id: '26' },
	{ title: '多媒體與遊戲發展科學系', id: '27' },
	{ title: '文化創意與數位媒體設計系', id: '28' },
	{ title: '觀光休閒系', id: '29' },
	{ title: '企業管理暨經營管理系', id: '30' },
	{ title: '行銷與流通管理系', id: '31' },
	{ title: '餐旅管理系', id: '32' },
	{ title: '物業經營與管理系', id: '33' },
	{ title: '國際企業經營系', id: '34' },
	{ title: '經營管理系', id: '35' },
	{ title: '國際商務與行銷系', id: '36' },
	{ title: '工業工程與管理系', id: '37' },
	{ title: '文創與數位多媒體系', id: '38' },
	{ title: '健康科技系', id: '39' },
	{ title: '生物科技系', id: '40' },
	{ title: '食品科學系', id: '41' },
	{ title: '創新與專案管理系', id: '42' },
	{ title: '企業與創業管理學系', id: '43' },
	{ title: '會計學系', id: '44' },
	{ title: '行銷學系', id: '45' },
	{ title: '商學院企業管理國際系', id: '46' },
	{ title: '多媒體與行動商務學系', id: '47' },
	{ title: '資訊傳播學系', id: '48' },
	{ title: '創意產業與數位電影系', id: '49' },
	{ title: '數位空間與商品設計系', id: '50' },
	{ title: '物流與航運管理學系', id: '51' },
	{ title: '空運管理學系', id: '52' },
	{ title: '運輸科技與管理學系', id: '53' },
	{ title: '觀光與餐飲旅館學系', id: '54' },
	{ title: '休閒事業管理學系', id: '55' },
	{ title: '公共事務管理學系', id: '56' },
	{ title: '法律學系', id: '57' },
	{ title: '應用日語學系', id: '58' },
	{ title: '應用英語學系', id: '59' },
	{ title: '應用華語學系', id: '60' },
	{ title: '保健營養學系', id: '61' },
	{ title: '健康產業管理學系', id: '62' },
	{ title: '養生與健康行銷學系', id: '63' },
	{ title: '形象與健康管理系', id: '64' },
	{ title: '護理系', id: '65' },
	{ title: '物理治療系', id: '66' },
	{ title: '營養系暨營養醫學系', id: '67' },
	{ title: '動物保健系', id: '68' },
	{ title: '語言治療與聽力學系', id: '69' },
	{ title: '文化創意產業系', id: '70' },
	{ title: '老人福利與事業系', id: '71' },
	{ title: '運動休閒系', id: '72' },
	{ title: '食品科技系', id: '73' },
	{ title: '幼兒保育系', id: '74' },
	{ title: '美髮造型設計系', id: '75' },
	{ title: '化妝品應用系', id: '76' },
	{ title: '健康事業管理系', id: '77' },
	{ title: '生物醫學系', id: '78' },
	{ title: '環境與安全衛生工程系', id: '79' },
	{ title: '生物科技暨醫學系', id: '80' },
	{ title: '醫學檢驗生物技術系', id: '81' },
	{ title: '醫學影像暨放射科學系', id: '82' },
	{ title: '牙體技術暨材料系', id: '83' },
	{ title: '視光系', id: '84' },
	{ title: '兒童教育暨事業經營學系', id: '85' },
	{ title: '老人照顧系', id: '86' },
	{ title: '醫療暨健康產業管理系', id: '87' },
	{ title: '文教事業經營系', id: '88' },
	{ title: '自動化工程系', id: '89' },
	{ title: '資訊與網路通訊系', id: '90' },
	{ title: '服務與科技管理系', id: '91' },
	{ title: '行銷與服務管理系', id: '92' },
	{ title: '創意生活應用設計系', id: '93' },
	{ title: '媒體與遊戲設計系', id: '94' },
	{ title: '遊戲與產品設計系', id: '95' },
	{ title: '商業設計系', id: '96' },
	{ title: '空間設計系', id: '97' },
	{ title: '美容系', id: '98' },
	{ title: '運動健康與休閒系', id: '99' },
	{ title: '觀光系', id: '100' },
	{ title: '老人照護系', id: '101' },
	{ title: '化妝品應用與管理系', id: '102' },
	{ title: '餐飲管理系', id: '103' },
	{ title: '視光學系', id: '104' },
	{ title: '復健系', id: '105' },
	{ title: '醫事檢驗系', id: '106' },
	{ title: '職業安全衛生系', id: '107' },
	{ title: '生命關懷事業系', id: '108' },
	{ title: '健康美容觀光系', id: '109' },
	{ title: '調理保健技術系', id: '110' },
	{ title: '高齡健康促進系', id: '111' },
	{ title: '數位媒體應用系', id: '112' },
	{ title: '文化資產與創意學系', id: '113' },
	{ title: '傳播學系', id: '114' },
	{ title: '產品與媒體設計學系', id: '115' },
	{ title: '資訊應用學系', id: '116' },
	{ title: '佛教學系', id: '117' },
	{ title: '中國文學與應用學系', id: '118' },
	{ title: '歷史學系', id: '119' },
	{ title: '外國語文學系', id: '120' },
	{ title: '藝術學系', id: '121' },
	{ title: '健康與創意素食產業學系', id: '122' },
	{ title: '未來與樂活產業學系', id: '123' },
	{ title: '社會學系', id: '124' },
	{ title: '心理學系', id: '125' },
	{ title: '公共事務學系', id: '126' },
	{ title: '管理學系', id: '127' },
	{ title: '應用經濟學系', id: '128' },
	{ title: '土木與防災設計系', id: '129' },
	{ title: '室內設計系', id: '130' },
	{ title: '視覺傳達設計系', id: '131' },
	{ title: '影視設計系', id: '132' },
	{ title: '互動娛樂設計系', id: '133' },
	{ title: '國際商務系', id: '134' },
	{ title: '財政稅務系', id: '135' },
	{ title: '會計系', id: '136' },
	{ title: '觀光與休閒事業管理系', id: '137' },
	{ title: '應用英語系', id: '138' },
	{ title: '電腦與通訊系', id: '139' },
	{ title: '化工與生化工程系', id: '140' },
	{ title: '綠色能源應用系', id: '141' },
	{ title: '香妝與養生保健系', id: '142' },
	{ title: '綠環境設計系', id: '143' },
	{ title: '文化創意設計與數位整合系', id: '144' },
	{ title: '休閒運動管理系', id: '145' },
	{ title: '觀光事業管理系', id: '146' },
	{ title: '銀髮事業系', id: '147' },
	{ title: '機械與自動化工程系', id: '148' },
	{ title: '光電科學與工程系', id: '149' },
	{ title: '資訊科技應用系', id: '150' },
	{ title: '資訊傳播系', id: '151' },
	{ title: '多媒體動畫遊戲系', id: '152' },
	{ title: '行動多媒體設計系', id: '153' },
	{ title: '觀光與休閒管理系', id: '154' },
	{ title: '高階主管企管系', id: '155' },
	{ title: '財稅與會計資訊系', id: '156' },
	{ title: '財經法律系', id: '157' },
	{ title: '金融與風險管理系', id: '158' },
	{ title: '會計資訊系', id: '159' },
	{ title: '財政系', id: '160' },
	{ title: '數位媒體設計系', id: '161' },
	{ title: '創意產品設計系', id: '162' },
	{ title: '資訊科技系', id: '163' },
	{ title: '資訊網路系', id: '164' },
	{ title: '流行設計系', id: '165' },
	{ title: '服飾設計系', id: '166' },
	{ title: '時尚經營系', id: '167' },
	{ title: '營建科技系', id: '168' },
	{ title: '材料科學與工程系', id: '169' },
	{ title: '環境工程系', id: '170' },
	{ title: '生物技術系', id: '171' },
	{ title: '光電工程系', id: '172' },
	{ title: '旅館管理系', id: '173' },
	{ title: '航空暨運輸服務管理系', id: '174' },
	{ title: '經營管理研究系', id: '175' },
	{ title: '理財經營管理系', id: '176' },
	{ title: '數位多媒體系', id: '177' },
	{ title: '通訊工程系', id: '178' },
	{ title: '光機電與材料系', id: '179' },
	{ title: '工程科學系', id: '180' },
	{ title: '科技管理系', id: '181' },
	{ title: '財務管理系', id: '182' },
	{ title: '國際金融管理系', id: '183' },
	{ title: '運輸科技與物流管理系', id: '184' },
	{ title: '國際經營管理系', id: '185' },
	{ title: '生物資訊系', id: '186' },
	{ title: '建築與都市計畫系', id: '187' },
	{ title: '景觀建築系', id: '188' },
	{ title: '營建管理系', id: '189' },
	{ title: '工業產品設計系', id: '190' },
	{ title: '建築與設計系', id: '191' },
	{ title: '行政管理系', id: '192' },
	{ title: '休閒遊憩規劃與管理系', id: '193' },
	{ title: '觀光與會展系', id: '194' },
	{ title: '生物資訊與醫學工程系', id: '195' },
	{ title: '行動商務與多媒體應用系', id: '196' },
	{ title: '光電與通訊系', id: '197' },
	{ title: '創意商品設計系', id: '198' },
	{ title: '時尚設計系', id: '199' },
	{ title: '國際設計系', id: '200' },
	{ title: '保健營養生技系', id: '201' },
	{ title: '護理學系', id: '202' },
	{ title: '聽力暨語言治療系', id: '203' },
	{ title: '職能治療系', id: '204' },
	{ title: '休閒與遊憩管理系', id: '205' },
	{ title: '會計與資訊系', id: '206' },
	{ title: '社會工作系', id: '207' },
	{ title: '幼兒教育系', id: '208' },
	{ title: '美容造型系', id: '209' },
	{ title: '行銷與流通系', id: '210' },
	{ title: '健康休閒管理系', id: '211' },
	{ title: '長期照護系', id: '212' },
	{ title: '口腔衛生學系', id: '213' },
	{ title: '國際企業學系', id: '214' },
	{ title: '幼兒教育學系', id: '215' },
	{ title: '創意商品設計學系', id: '216' },
	{ title: '牙體技術系', id: '217' },
	{ title: '美容保健系', id: '218' },
	{ title: '資訊與通訊系', id: '219' },
	{ title: '時尚經營管理系', id: '220' },
	{ title: '機械與電腦輔助工程系', id: '221' },
	{ title: '創意設計系', id: '222' },
	{ title: '數位文藝系', id: '223' },
	{ title: '休閒運動與健康管理系', id: '224' },
	{ title: '大眾傳播學系', id: '225' },
	{ title: '廣播與電視新聞學系', id: '226' },
	{ title: '影劇藝術學系', id: '227' },
	{ title: '原住民學系', id: '228' },
	{ title: '視覺傳達設計學系', id: '229' },
	{ title: '藝術與創意設計學系', id: '230' },
	{ title: '時尚設計學系', id: '231' },
	{ title: '社會工作學系', id: '232' },
	{ title: '應用心理學系', id: '233' },
	{ title: '宗教與文化學系', id: '234' },
	{ title: '生命禮儀學系', id: '235' },
	{ title: '餐旅管理學系', id: '236' },
	{ title: '資訊管理學系', id: '237' },
	{ title: '企業管理學系', id: '238' },
	{ title: '應用外語學系', id: '239' },
	{ title: '機械與機電工程系', id: '240' },
	{ title: '應用科技系', id: '241' },
	{ title: '化學工程與材料工程系', id: '242' },
	{ title: '材料與纖維系', id: '243' },
	{ title: '環境科技與管理系', id: '244' },
	{ title: '觀光英語系', id: '245' },
	{ title: '創意流行時尚設計系', id: '246' },
	{ title: '餐飲廚藝管理系', id: '247' },
	{ title: '機電工程系', id: '248' },
	{ title: '營建工程系', id: '249' },
	{ title: '建築與室內設計系', id: '250' },
	{ title: '土木與空間資訊系', id: '251' },
	{ title: '影像顯示科技系', id: '252' },
	{ title: '醫學工程系', id: '253' },
	{ title: '化妝品與時尚彩妝系', id: '254' },
	{ title: '時尚生活創意設計系', id: '255' },
	{ title: '休閒與運動管理系', id: '256' },
	{ title: '觀光遊憩系', id: '257' },
	{ title: '金融管理系', id: '258' },
	{ title: '創意產業經營系', id: '259' },
	{ title: '行銷與物流學系', id: '260' },
	{ title: '財務金融學系', id: '261' },
	{ title: '中國文學學系', id: '262' },
	{ title: '生物科技學系', id: '263' },
	{ title: '精緻農業學系', id: '264' },
	{ title: '材料與能源工程學系', id: '265' },
	{ title: '數位設計學系', id: '266' },
	{ title: '時尚造形學系', id: '267' },
	{ title: '景觀與環境設計學系', id: '268' },
	{ title: '休閒保健學系', id: '269' },
	{ title: '時尚產業網路行銷學系', id: '270' },
	{ title: '數位動畫學位學系', id: '271' },
	{ title: '助產系', id: '272' },
	{ title: '高齡及長期照護事業系', id: '273' },
	{ title: '醫事技術系', id: '274' },
	{ title: '保健營養系', id: '275' },
	{ title: '健康美容系', id: '276' },
	{ title: '休閒與遊憩事業管理系', id: '277' },
	{ title: '資訊科技學系', id: '278' },
	{ title: '文教事業管理學系', id: '279' },
	{ title: '環境工程與科學系', id: '280' },
	{ title: '應用化學及材料科學系', id: '281' },
	{ title: '環境與生命學系', id: '282' },
	{ title: '生活服務產業系', id: '283' },
	{ title: '服飾設計管理系', id: '284' },
	{ title: '美容造型設計系', id: '285' },
	{ title: '餐飲系', id: '286' },
	{ title: '運動休閒與健康管理系', id: '287' },
	{ title: '商品設計系', id: '288' },
	{ title: '多媒體動畫系', id: '289' },
	{ title: '舞蹈系', id: '290' },
	{ title: '醫學影像暨放射技術系', id: '291' },
	{ title: '醫務管理系', id: '292' },
	{ title: '生物醫學工程系', id: '293' },
	{ title: '環境工程衛生系', id: '294' },
	{ title: '生物科技暨製藥技術系', id: '295' },
	{ title: '應用財務管理系', id: '296' },
	{ title: '行動科技應用系', id: '297' },
	{ title: '觀光休閒系系', id: '298' },
	{ title: '旅運管理系', id: '299' },
	{ title: '時尚造形設計系', id: '300' },
	{ title: '數位設計系', id: '301' },
	{ title: '藥學系', id: '302' },
	{ title: '醫藥化學系', id: '303' },
	{ title: '化粧品應用與管理系', id: '304' },
	{ title: '嬰幼兒保育系', id: '305' },
	{ title: '生活應用與保健系', id: '306' },
	{ title: '文化事業發展系', id: '307' },
	{ title: '資訊多媒體應用系', id: '308' },
	{ title: '環境資源管理系', id: '309' },
	{ title: '運動管理系', id: '310' },
	{ title: '休閒保健管理系', id: '311' },
	{ title: '老人服務事業管理系', id: '312' },
	{ title: '國際企業管理系', id: '313' },
	{ title: '英國語文系', id: '314' },
	{ title: '國際事務系', id: '315' },
	{ title: '翻譯系', id: '316' },
	{ title: '西班牙語文系', id: '317' },
	{ title: '日本語文系', id: '318' },
	{ title: '法國語文系', id: '319' },
	{ title: '德國語文系', id: '320' },
	{ title: '數位內容應用與管理系', id: '321' },
	{ title: '應用華語文系', id: '322' },
	{ title: '外語教學系', id: '323' },
	{ title: '傳播藝術系', id: '324' },
	{ title: '光電系統工程系', id: '325' },
	{ title: '化學工程與材料科學與工程系', id: '326' },
	{ title: '土木工程與環境資源管理系', id: '327' },
	{ title: '旅館事業管理系', id: '328' },
	{ title: '休閒事業管理系', id: '329' },
	{ title: '材料工程系', id: '330' },
	{ title: '房地產開發與管理系', id: '331' },
	{ title: '公共關係暨廣告系', id: '332' },
	{ title: '旅遊文化發展系', id: '333' },
	{ title: '休閒遊憩與運動管理系', id: '334' },
	{ title: '餐飲管理及廚藝系', id: '335' },
	{ title: '呼吸照護系', id: '336' },
	{ title: '老人照顧管理系', id: '337' },
	{ title: '國際貿易學系', id: '338' },
	{ title: '財稅學系', id: '339' },
	{ title: '合作經濟學系', id: '340' },
	{ title: '統計學系', id: '341' },
	{ title: '經濟學系', id: '342' },
	{ title: '機械與電腦輔助工程學系', id: '343' },
	{ title: '纖維與複合材料學系', id: '344' },
	{ title: '工業工程與系統管理學系', id: '345' },
	{ title: '化學工程學系', id: '346' },
	{ title: '航太與系統工程學系', id: '347' },
	{ title: '資訊工程學系', id: '348' },
	{ title: '電機工程學系', id: '349' },
	{ title: '電子工程學系', id: '350' },
	{ title: '自動控制工程學系', id: '351' },
	{ title: '通訊工程學系', id: '352' },
	{ title: '水利工程與資源保育學系', id: '353' },
	{ title: '土木工程學系', id: '354' },
	{ title: '建築學系', id: '355' },
	{ title: '都市計畫與空間資訊學系', id: '356' },
	{ title: '土地管理學系', id: '357' },
	{ title: '風險管理與保險學系', id: '358' },
	{ title: '中國文學系', id: '359' },
	{ title: '應用數學系', id: '360' },
	{ title: '環境工程與科學學系', id: '361' },
	{ title: '材料科學與工程學系', id: '362' },
	{ title: '光電學系', id: '363' },
	{ title: '新聞學系', id: '364' },
	{ title: '口語傳播學系', id: '365' },
	{ title: '公共關係暨廣告學系', id: '366' },
	{ title: '圖文傳播暨數位出版學系', id: '367' },
	{ title: '廣播電視電影學系', id: '368' },
	{ title: '數位多媒體設計學系', id: '369' },
	{ title: '傳播管理學系', id: '370' },
	{ title: '行政管理學系', id: '371' },
	{ title: '觀光學系', id: '372' },
	{ title: '社會心理學系', id: '373' },
	{ title: '英語學系', id: '374' },
	{ title: '日本語文學系', id: '375' },
	{ title: '美術系', id: '376' },
	{ title: '音樂系', id: '377' },
	{ title: '流行音樂系', id: '378' },
	{ title: '視覺傳達設計系暨創新應用設計系', id: '379' },
	{ title: '養生休閒管理學系', id: '380' },
	{ title: '銀髮生活產業學系', id: '381' },
	{ title: '微型創業管理學系', id: '382' },
	{ title: '高齡福祉事業管理學系', id: '383' },
	{ title: '網路與數位媒體應用學系', id: '384' },
	{ title: '會展暨文創事業管理學系', id: '385' },
	{ title: '國際健康行銷管理學系', id: '386' },
	{ title: '化粧品科技系', id: '387' },
	{ title: '兒童產業服務學系', id: '388' },
	{ title: '產業安全衛生與防災系', id: '389' },
	{ title: '國際事業暨文化交流系', id: '390' },
	{ title: '國際商務英語系', id: '391' },
	{ title: '國際觀光與會展學系', id: '392' },
	{ title: '外語文教事業發展系', id: '393' },
	{ title: '創意藝術產業系', id: '394' },
	{ title: '產業研發系', id: '395' },
	{ title: '化妝品應用學系', id: '396' },
	{ title: '服務事業管理系', id: '397' },
	{ title: '文化觀光產業學系', id: '398' },
	{ title: '創業與行銷學系', id: '399' },
	{ title: '機械與能源工程系', id: '400' },
	{ title: '國際貿易系暨國際商務與金融系', id: '401' },
	{ title: '空間設計系暨環境設計系', id: '402' },
	{ title: '時尚展演事業學系', id: '403' },
	{ title: '資訊電機系', id: '404' },
	{ title: '產業研發系', id: '405' },
	{ title: '生醫資訊暨生醫工程系', id: '406' },
	{ title: '電機與通訊工程系', id: '407' },
	{ title: '室內及景觀系', id: '408' },
	{ title: '土木及水利工程系', id: '409' },
	{ title: '財務工程與精算學系', id: '410' },
	{ title: '歷史與文物管理系', id: '411' },
	{ title: '電子商務系', id: '412' },
	{ title: '精密系統設計學系', id: '413' },
	{ title: '綠色能源科技系', id: '414' },
	{ title: '機械與航空工程系', id: '415' },
	{ title: '社會發展系', id: '416' },
	{ title: '智慧財產權系', id: '417' },
	{ title: '視訊傳播設計系', id: '418' },
	{ title: '保險金融管理系', id: '419' },
	{ title: '銀髮產業管理系', id: '420' },
	{ title: '應用化學系', id: '421' },
	{ title: '環境工程與管理系', id: '422' },
	{ title: '工業設計系', id: '423' },
	{ title: '景觀及都市設計系', id: '424' },
	{ title: '休閒事業經營系', id: '425' },
	{ title: '國際貿易系', id: '426' },
	{ title: '應用統計系', id: '427' },
	{ title: '多媒體設計系', id: '428' },
	{ title: '應用日語系', id: '429' },
	{ title: '應用中文系', id: '430' },
	{ title: '流通管理系', id: '431' },
	{ title: '公共行政學系', id: '432' },
	{ title: '諮商與臨床心理學系', id: '433' },
	{ title: '華文文學系', id: '434' },
	{ title: '中國語文學系', id: '435' },
	{ title: '英美語文學系', id: '436' },
	{ title: '臺灣文化學系', id: '437' },
	{ title: '音樂學系', id: '438' },
	{ title: '藝術與設計學系', id: '439' },
	{ title: '藝術創意產業學系', id: '440' },
	{ title: '自然資源與環境學系', id: '441' },
	{ title: '運籌管理系', id: '442' },
	{ title: '觀光暨休閒遊憩學系', id: '443' },
	{ title: '物理學系', id: '444' },
	{ title: '生命科學系', id: '445' },
	{ title: '化學系', id: '446' },
	{ title: '光電工程學系', id: '447' },
	{ title: '教育與潛能開發學系', id: '448' },
	{ title: '教育行政與管理學系', id: '449' },
	{ title: '特殊教育學系', id: '450' },
	{ title: '體育與運動科學系', id: '451' },
	{ title: '族群關係與文化學系', id: '452' },
	{ title: '民族語言與傳播學系', id: '453' },
	{ title: '民族事務與發展學系', id: '454' },
	{ title: '旅遊管理學系', id: '455' },
	{ title: '非營利事業管理學系', id: '456' },
	{ title: '文化創意事業管理學系', id: '457' },
	{ title: '會計資訊學系', id: '458' },
	{ title: '文學系', id: '459' },
	{ title: '哲學與生命教育學系', id: '460' },
	{ title: '生死學系', id: '461' },
	{ title: '宗教學系', id: '462' },
	{ title: '國際事務與企業學系', id: '463' },
	{ title: '應用社會學系', id: '464' },
	{ title: '電子商務管理學系', id: '465' },
	{ title: '自然生物科技學系', id: '466' },
	{ title: '視覺與媒體藝術學系', id: '467' },
	{ title: '創意產品設計學系', id: '468' },
	{ title: '建築與景觀學系', id: '469' },
	{ title: '工業管理與資訊系', id: '470' },
	{ title: '創新產品設計系', id: '471' },
	{ title: '多媒體與電腦娛樂科學系', id: '472' },
	{ title: '流行音樂產業系', id: '473' },
	{ title: '機械與自動化工程學系', id: '474' },
	{ title: '財務與計算數學系', id: '475' },
	{ title: '土木與生態工程學系', id: '476' },
	{ title: '生物技術與化學工程系', id: '477' },
	{ title: '工業管理學系', id: '478' },
	{ title: '國際商務學系', id: '479' },
	{ title: '公共政策與管理學系', id: '480' },
	{ title: '電影與電視學系', id: '481' },
	{ title: '國際企業經營學系', id: '482' },
	{ title: '國際財務金融學系', id: '483' },
	{ title: '國際觀光餐旅學系', id: '484' },
	{ title: '娛樂事業管理學系', id: '485' },
	{ title: '廚藝學系', id: '486' },
	{ title: '健康管理學系', id: '487' },
	{ title: '營養學系', id: '488' },
	{ title: '生物醫學工程學系', id: '489' },
	{ title: '職能治療學系', id: '490' },
	{ title: '醫務管理學系', id: '491' },
	{ title: '物理治療學系', id: '492' },
	{ title: '學士後中醫學系', id: '493' },
	{ title: '資產與物業管理系', id: '494' },
	{ title: '能源與材料科技系', id: '495' },
	{ title: '資訊網路技術系', id: '496' },
	{ title: '應用財務金融系', id: '497' },
	{ title: '人力資源管理與發展系', id: '498' },
	{ title: '觀光與遊憩管理系', id: '499' },
	{ title: '財務金融系暨理財與稅務管理系', id: '500' },
	{ title: '不動產投資與經營系', id: '501' },
	{ title: '行銷管理系', id: '502' },
	{ title: '健康餐旅系', id: '503' },
];

// School List Last is 49
var School_List = [
	{ title: '龍華科技大學', id: '1', area: '1', ex: '學號@gm.lhu.edu.tw', link: 'http://web.gm.lhu.edu.tw/', mark: '' },
	{ title: '健行科技大學', id: '2', area: '1', ex: '學號@uch.edu.tw', link: 'https://mail.uch.edu.tw/', mark: '' },
	{ title: '中華科技大學', id: '3', area: '1', ex: 's+學號@ccs.cust.edu.tw', link: 'http://ccs.cust.edu.tw/roundcube/', mark: '' },
	{ title: '開南大學', id: '4', area: '1', ex: '學號@mail.knu.edu.tw', link: 'http://mail.knu.edu.tw/index.html', mark: '' },
	{ title: '弘光科技大學', id: '5', area: '2', ex: 'U102P212@ms.hk.edu.tw', link: 'http://ms.hk.edu.tw/webmail', mark: '預設密碼為身份證字號，且為小寫' },
	{ title: '中臺科技大學', id: '6', area: '3', ex: 'D10401051@ms3.ctust.edu.tw', link: 'http://eip.ctust.edu.tw/mailIndex.do', mark: '' },
	{ title: '建國科技大學', id: '7', area: '2', ex: '102403007@stu.ctu.edu.tw', link: 'http://mail.stu.ctu.edu.tw/', mark: '' },
	{ title: '馬偕醫護管理專科學校', id: '8', area: '1', ex: 's50211078@student.mkc.edu.tw', link: 'http://student.mkc.edu.tw', mark: '' },
	{ title: '仁德醫護管理專科學校', id: '9', area: '1', ex: '10352295@jente.edu.tw', link: 'http://ccmail.jente.edu.tw/cc_login.php', mark: '信箱帳號預設為學號、密碼預設首字大寫' },
	{ title: '佛光大學', id: '10', area: '4', ex: '10415238@mail.fgu.edu.tw', link: 'http://mail.fgu.edu.tw/', mark: '' },
	{ title: '中國科技大學', id: '11', area: '1', ex: '1031423087@gm.cute.edu.tw', link: 'http://iq.cute.edu.tw/index.do?thetime=1457104702751', mark: '' },
	{ title: '高苑科技大學', id: '12', area: '3', ex: '40021A2448@mail.kyu.edu.tw', link: 'http://mail.mail.kyu.edu.tw/', mark: '' },
	{ title: '嶺東科技大學', id: '13', area: '2', ex: 'a28h037@stumail.ltu.edu.tw', link: 'http://portal.ltu.edu.tw/mailIndex.do', mark: '登入學生資訊系統後點擊"電子郵件"' },
	{ title: '萬能科技大學', id: '14', area: '1', ex: 'ac0205029@mail.vnu.edu.tw', link: 'https://mail.vnu.edu.tw', mark: '' },
	{ title: '中華大學', id: '15', area: '1', ex: 'b102200233@chu.edu.tw', link: 'https://webmail.chu.edu.tw/cgi-bin/openwebmail/openwebmail.pl', mark: '帳號為學號首字小寫密碼為身份證首字小寫' },
	{ title: '亞洲大學', id: '16', area: '2', ex: '101032035@live.asia.edu.tw', link: 'http://mail.live.asia.edu.tw', mark: '密碼同於校園入口' },
	{ title: '新生醫護管理專科學校', id: '17', area: '1', ex: '1001501116@mail.hsc.edu.tw', link: 'http://portal.hsc.edu.tw/toGoogle.do', mark: '請從資訊系統進入信箱，預設密碼為身份證首字大寫' },
	{ title: '敏惠醫護管理專科學校', id: '18', area: '3', ex: '50001030@smail.mhchcm.edu.tw', link: 'http://smail.mhchcm.edu.tw:8080/webmail-cgi/XwebMail', mark: '信箱進入後選擇最底下的後綴，帳號密碼皆為學號' },
	{ title: '聖約翰科技大學', id: '19', area: '1', ex: '104406022@stud.sju.edu.tw', link: 'http://gmail.com', mark: '帳號為學號@stud.sju.edu.tw 密碼身份證首字大寫' },
	{ title: '玄奘大學', id: '20', area: '1', ex: 'bb1042117@umail.hcu.edu.tw', link: 'http://umail.hcu.edu.tw', mark: '' },
	{ title: '桃園創新科技大學', id: '21', area: '1', ex: '1041222103@tiit.edu.tw', link: 'http://mail.tiit.edu.tw/index.html', mark: '預設密碼為學號' },
	{ title: '正修科技大學', id: '22', area: '3', ex: 'k+學號@gcloud.csu.edu.tw', link: 'https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F<mpl=default&service=mail&sacu=1&hd=gcloud.csu.edu.tw#identifier', mark: '信箱預設密碼為身份證' },
	{ title: '明道大學', id: '23', area: '2', ex: '1439082@live.mdu.edu.tw', link: 'https://login.microsoftonline.com/', mark: '預設密碼第一次使用，請用身分證號首字大寫' },
	{ title: '輔英科技大學', id: '24', area: '3', ex: '4AB1040062@live.fy.edu.tw', link: 'https://portal.office.com/Home', mark: '' },
	{ title: '台南應用科技大學', id: '25', area: '3', ex: '學號@gm.tut.edu.tw', link: 'http://gm.tut.edu.tw', mark: '預設為身分證字號' },
	{ title: '樹人醫護管理專科學校', id: '26', area: '3', ex: 's50302172@student.szmc.edu.tw', link: 'https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F<mpl=default&service=mail&sacu=1&rip=1&hd=student.szmc.edu.tw#identifier', mark: '預設密碼為身份證' },
	{ title: '元培醫事科技大學', id: '27', area: '1', ex: '1041408078@mail.ypu.edu.tw', link: 'https://mail.ypu.edu.tw/cgi-bin/owmmdir2/openwebmail.pl', mark: '登入信箱帳號無需輸入後綴，預設密碼為身份證末8碼' },
	{ title: '醒吾科技大學', id: '28', area: '1', ex: '1031407046@mail.hwu.edu.tw', link: 'http://portal.hwu.edu.tw/Portal/login.htm', mark: '請先登入學生入口網站，點選左上角Gmail登入' },
	{ title: '嘉南藥理大學', id: '29', area: '3', ex: 'b0211042@stmail.cnu.edu.tw', link: 'http://mail.cnu.edu.tw/index_p.html', mark: '信箱登入帳號無需加後綴，預設密碼身分證後四碼' },
	{ title: '文藻外語大學', id: '30', area: '3', ex: '2104200018@student.wzu.edu.tw', link: 'http://student.wzu.edu.tw/cgi-bin/owmmdirwtuc/openwebmail.pl', mark: '' },
	{ title: '明新科技大學', id: '31', area: '1', ex: 'b04120062@std.must.edu.tw', link: 'http://std.must.edu.tw/', mark: '預設登入密碼為身份證' },
	{ title: '崑山科技大學', id: '32', area: '3', ex: 's103000328@g.ksu.edu.tw', link: 'https://accounts.google.com/ServiceLogin?hl=zh-TW&passive=true&continue=https://www.google.com.tw/%3Fgws_rd%3Dssl#identifier', mark: '' },
	{ title: '長庚科技大學', id: '33', area: '1', ex: 'a011052@mail.cgust.edu.tw', link: 'http://gmail.cgust.edu.tw:81/', mark: '' },
	{ title: '逢甲大學', id: '34', area: '2', ex: 'a0983896819@mail.fcu.edu.tw', link: 'http://www.oit.fcu.edu.tw/wSite/ct?xItem=35995&ctNode=11149&mp=271201&idPath=', mark: '' },
	{ title: '世新大學', id: '35', area: '1', ex: 'a102210131@mail.shu.edu.tw', link: 'https://ap.shu.edu.tw/SSO/login.aspx?ReturnUrl=/SSO/Auth.aspx%3FCheckSessionID%3Desvzpgrkqglnyr3aytaq0qt3%26GetAuthUrl%3Dhttp://ap.shu.edu.tw/GoogleSrv/Login.aspx%26ReturnUrl%3D/GoogleSrv/SSO/Prompt2.', mark: '' },
	{ title: '朝陽科技大學', id: '36', area: '2', ex: 's103350xx@gm.cyut.edu.tw', link: 'http://gmail.com', mark: '帳號是s+學號@gm.cyut.edu.tw 預設密碼為身份證' },
	{ title: '華夏科技大學', id: '37', area: '1', ex: '50404120@go.hwh.edu.tw', link: 'http://gmail.com', mark: '' },
	{ title: '臺中科技大學', id: '38', area: '2', ex: 's11011012@nutc.edu.tw', link: 'https://sso.nutc.edu.tw/ePortal/', mark: '請登入eportal 裡面的WebMail收信' },
	{ title: '東華大學', id: '39', area: '4', ex: '4100010xx@ems.ndhu.edu.tw', link: 'https://ems.ndhu.edu.tw/', mark: '' },
	{ title: '南華大學', id: '40', area: '2', ex: '10210012@nhu.edu.tw', link: 'http://gmail.nhu.edu.tw', mark: '預設密碼為身份證字號，第一個英文字母大寫' },
	{ title: '義守大學', id: '41', area: '3', ex: 'isu10307010a@cloud.isu.edu.tw', link: 'https://adfs.isu.edu.tw/adfs/ls/?wa=wsignin1.0&wtrealm=urn:federation:MicrosoftOnline', mark: '' },
	{ title: '南臺科技大學', id: '42', area: '3', ex: '4a30h022@stust.edu.tw', link: 'http://gmail.stust.edu.tw', mark: '' },
	{ title: '修平科技大學', id: '43', area: '2', ex: 'bf103046@hust.edu.tw', link: 'https://login.microsoftonline.com/login.srf?wa=wsignin1.0&rpsnv=4&ct=1459751073&rver=6.7.6640.0&wp=MCMBI&wreply=https%3a%2f%2fportal.office.com%2flanding.aspx%3ftarget%3d%252fdefault.aspx&lc=1028&id=501392&msafed=0&client-request-id=8a7452d6-b1fe-4872-bfde-82df37291f04', mark: '預設密碼為身份證首字大寫' },
	{ title: '耕莘健康管理專科學校', id: '44', area: '1', ex: 's+學號＠sms.ctcn.edu.tw', link: 'http://sms.ctcn.edu.tw', mark: '預設密碼為身分證末四碼加生日' },
	{ title: '德明財經科技大學', id: '45', area: '1', ex: 'D101261xx@cc.takming.edu.tw', link: 'https://mail.cc.takming.edu.tw/owa/auth/logon.aspx?replaceCurrent=1&url=https%3a%2f%2fmail.cc.takming.edu.tw%2fowa%2f', mark: '' },
	{ title: '崇仁醫護管理專科學校', id: '46', area: '2', ex: 's10101285@cjc.edu.tw', link: 'https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F<mpl=default&hd=cjc.edu.tw&service=mail&sacu=1&rip=1#identifier', mark: '' },
	{ title: '僑光科技大學', id: '47', area: '2', ex: 's+學號@ocu.edu.tw', link: 'https://webmail.ocu.edu.tw', mark: '' },
	{ title: '亞東技術學院', id: '48', area: '1', ex: '學號@mail.oit.edu.tw', link: 'https://mail.oit.edu.tw/owa/auth/logon.aspx?replaceCurrent=1&url=https%3A%2F%2Fmail.oit.edu.tw%2Fowa%2F', mark: '' },
	{ title: '育達科技大學', id: '49', area: '1', ex: '學號@ydu.edu.tw', link: 'https://webmail.ydu.edu.tw/', mark: '' },
];

});
