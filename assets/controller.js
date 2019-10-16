var selene = angular.module('selene', ['ngSanitize', 'infinite-scroll', 'luegg.directives', 'ngMask']);

var baseUrl = "http://localhost/folder";

selene.controller('ArticleListCtrl', function($scope, $http, $location, $filter, $rootScope, $timeout, imgurUpload, $sce) {

	// 看板列表
	$rootScope.typeList = [{"di_numb":"0","di_code":"all","di_sch":"3","di_name":"全部"},{"di_numb":"1","di_code":"uch","di_sch":"1","di_name":"健行科大"},{"di_numb":"2","di_code":"lhu","di_sch":"1","di_name":"龍華科大"},{"di_numb":"3","di_code":"life","di_sch":"0","di_name":"有趣"},{"di_numb":"4","di_code":"shrimp","di_sch":"0","di_name":"瞎聊"},{"di_numb":"5","di_code":"mw","di_sch":"0","di_name":"男女"},{"di_numb":"6","di_code":"cust","di_sch":"1","di_name":"中華科大"},{"di_numb":"7","di_code":"hate","di_sch":"0","di_name":"黑特"},{"di_numb":"8","di_code":"ask","di_sch":"0","di_name":"問？"},{"di_numb":"9","di_code":"knu","di_sch":"1","di_name":"開南大學"},{"di_numb":"10","di_code":"hk","di_sch":"1","di_name":"弘光科大"},{"di_numb":"11","di_code":"ctust","di_sch":"1","di_name":"中臺科大"},{"di_numb":"12","di_code":"ctu","di_sch":"1","di_name":"建國科大"},{"di_numb":"13","di_code":"mkc","di_sch":"1","di_name":"馬偕護專"},{"di_numb":"14","di_code":"jente","di_sch":"1","di_name":"仁德護專"},{"di_numb":"15","di_code":"fgu","di_sch":"1","di_name":"佛光大學"},{"di_numb":"16","di_code":"cute","di_sch":"1","di_name":"中國科大"},{"di_numb":"17","di_code":"kyu","di_sch":"1","di_name":"高苑科大"},{"di_numb":"18","di_code":"ltu","di_sch":"1","di_name":"嶺東科大"},{"di_numb":"19","di_code":"vnu","di_sch":"1","di_name":"萬能科大"},{"di_numb":"20","di_code":"vent","di_sch":"0","di_name":"廢文"},{"di_numb":"21","di_code":"sex","di_sch":"0","di_name":"西斯"},{"di_numb":"22","di_code":"boy","di_sch":"0","di_name":"男孩"},{"di_numb":"23","di_code":"girl","di_sch":"0","di_name":"女孩"},{"di_numb":"24","di_code":"pet","di_sch":"0","di_name":"寵物"},{"di_numb":"25","di_code":"movie","di_sch":"0","di_name":"影劇"},{"di_numb":"26","di_code":"food","di_sch":"0","di_name":"美食"},{"di_numb":"27","di_code":"marvel","di_sch":"0","di_name":"靈異"},{"di_numb":"28","di_code":"constellation","di_sch":"0","di_name":"星座"},{"di_numb":"29","di_code":"works","di_sch":"0","di_name":"手作"},{"di_numb":"30","di_code":"creation","di_sch":"0","di_name":"藝文"},{"di_numb":"31","di_code":"music","di_sch":"0","di_name":"音樂"},{"di_numb":"32","di_code":"chu","di_sch":"1","di_name":"中華大學"},{"di_numb":"33","di_code":"asia","di_sch":"1","di_name":"亞洲大學"},{"di_numb":"34","di_code":"hsc","di_sch":"1","di_name":"新生醫專"},{"di_numb":"35","di_code":"ann","di_sch":"4","di_name":"公告"},{"di_numb":"36","di_code":"trending","di_sch":"0","di_name":"時事"},{"di_numb":"37","di_code":"job","di_sch":"0","di_name":"工作"},{"di_numb":"38","di_code":"mood","di_sch":"0","di_name":"心情"},{"di_numb":"39","di_code":"game","di_sch":"0","di_name":"遊戲"},{"di_numb":"40","di_code":"photography","di_sch":"0","di_name":"攝影"},{"di_numb":"41","di_code":"mhchcm","di_sch":"1","di_name":"敏惠護專"},{"di_numb":"42","di_code":"sju","di_sch":"1","di_name":"聖約翰科大"},{"di_numb":"43","di_code":"hcu","di_sch":"1","di_name":"玄奘大學"},{"di_numb":"44","di_code":"tiit","di_sch":"1","di_name":"南亞技院"},{"di_numb":"45","di_code":"csu","di_sch":"1","di_name":"正修科大"},{"di_numb":"46","di_code":"mdu","di_sch":"1","di_name":"明道大學"},{"di_numb":"47","di_code":"fy","di_sch":"1","di_name":"輔英科大"},{"di_numb":"48","di_code":"tut","di_sch":"1","di_name":"台南應用科大"},{"di_numb":"49","di_code":"szmc","di_sch":"1","di_name":"樹人護專"},{"di_numb":"50","di_code":"ypu","di_sch":"1","di_name":"元培科大"},{"di_numb":"51","di_code":"hwu","di_sch":"1","di_name":"醒吾科大"},{"di_numb":"52","di_code":"cnu","di_sch":"1","di_name":"嘉南藥理大學"},{"di_numb":"53","di_code":"wzu","di_sch":"1","di_name":"文藻外語大學"},{"di_numb":"54","di_code":"must","di_sch":"1","di_name":"明新科大"},{"di_numb":"55","di_code":"ksu","di_sch":"1","di_name":"崑山科大"},{"di_numb":"56","di_code":"cgust","di_sch":"1","di_name":"長庚科大"},{"di_numb":"57","di_code":"fcu","di_sch":"1","di_name":"逢甲大學"},{"di_numb":"58","di_code":"shu","di_sch":"1","di_name":"世新大學"},{"di_numb":"59","di_code":"cyut","di_sch":"1","di_name":"朝陽科大"},{"di_numb":"60","di_code":"hwh","di_sch":"1","di_name":"華夏科大"},{"di_numb":"61","di_code":"nutc","di_sch":"1","di_name":"臺中科大"},{"di_numb":"62","di_code":"ndhu","di_sch":"1","di_name":"東華大學"},{"di_numb":"63","di_code":"nhu","di_sch":"1","di_name":"南華大學"},{"di_numb":"64","di_code":"isu","di_sch":"1","di_name":"義守大學"},{"di_numb":"65","di_code":"stust","di_sch":"1","di_name":"南臺科大"},{"di_numb":"66","di_code":"tourism","di_sch":"0","di_name":"旅遊"},{"di_numb":"67","di_code":"movement","di_sch":"0","di_name":"體育"},{"di_numb":"68","di_code":"hust","di_sch":"1","di_name":"修平科大"},{"di_numb":"69","di_code":"ctcn","di_sch":"1","di_name":"耕莘健康專"},{"di_numb":"70","di_code":"takming","di_sch":"1","di_name":"德明科大"},{"di_numb":"71","di_code":"cjc","di_sch":"1","di_name":"崇仁醫專"},{"di_numb":"72","di_code":"coding","di_sch":"0","di_name":"程式設計"},{"di_numb":"73","di_code":"writing","di_sch":"0","di_name":"手寫"},{"di_numb":"74","di_code":"ocu","di_sch":"1","di_name":"僑光科大"},{"di_numb":"75","di_code":"oit","di_sch":"1","di_name":"亞東學院"},{"di_numb":"76","di_code":"ydu","di_sch":"1","di_name":"育達科大"},{"di_numb":"77","di_code":"cycu","di_sch":"1","di_name":"中原大學"},{"di_numb":"78","di_code":"yzu","di_sch":"1","di_name":"元智大學"},{"di_numb":"79","di_code":"nctu","di_sch":"1","di_name":"交通大學"},{ di_numb: "80", di_code: "beauty", di_sch: "0", di_name: "彩妝"},{ di_numb: "81", di_code: "fashion", di_sch: "0", di_name: "時尚"},{ di_numb: "82", di_code: "fantasy", di_sch: "0", di_name: "創作文"},{ di_numb: "83", di_code: "star", di_sch: "0", di_name: "追星"},{ di_numb: "84", di_code: "moto", di_sch: "0", di_name: "Moto"},{ di_numb: "85", di_code: "technology", di_sch: "0", di_name: "科技"},{ di_numb: "86", di_code: "selene", di_sch: "0", di_name: "SELENE"}];

	$scope.articleList = [];
	$scope.loadMoreOffset = 0;

	$scope.isSex = function () {

		if ($scope.typeCode == 'sex') {

			$('.legal-age-modal')
			.modal({
				closable	: false,
				onDeny		: function(){
					window.location.href = baseUrl + "selene/a/"
				},
				onApprove : function() {
					void(0);
				}
			})
			.modal('show');
		}

	}

	// 回覆引用
	$scope.response = function () {
		var selectorText = document.getSelection();

		$http({
			url: baseUrl + '/article/response/save',
			method: "POST",
			data: {
				articleId: $scope.aid,
				content: selectorText
			}
		})
			.success(function (res) {
				if (res.status != false) {
					window.location.href = baseUrl + '/article/response/' + res.status;
				}
			})
			.error(function (err) {
				
			});
	}

	$scope.notLoginHolder = function() {
		$("#notlogin-banner").sidebar('setting', {'transition' : 'overlay', 'dimPage' : false}).sidebar('toggle');
	}

	$scope.loadMore = function () {

		$scope.scroll_switch = false;

		$http({
			url: baseUrl + '/a/'+ $scope.typeCode +'/query',
			method: "POST",
			data: {
				id: $scope.typeId,
				offset : $scope.loadMoreOffset
			}
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.scroll_switch = false;
				$scope.noMoreArticle = true;
				$scope.isSubScribe = response.isSubScribe;
			}
			else {
				$scope.scroll_switch = true;

				$scope.articleList = $scope.articleList.concat(response.result);
				$scope.isSubScribe = response.result[0].isSubScribe;
				$scope.loadMoreOffset = Number($scope.loadMoreOffset) + 50;
			}
		})
		.error( function(response) {
			$scope.noMoreArticle = true;
		});
	}


	// 訂閱 or 取消訂閱
	$scope.subScribe = function (di_id) {

		$http({
			url: baseUrl + '/subscribe',
			method: "POST",
			data: {
				id: di_id,
			}
		})
		.success(function (res) {
			if (res.result === "1") {
				$scope.isSubScribe = 1;
			}
			else if (res.result === "0") {
				$scope.isSubScribe = 0;
			}
			else {
				return false;
			}
		})
		.error(function (res) {
			
		});
	}


	$scope.jsonConvertHtml = function (res) {

		let html = '';
		let content = [];
		

		JSON.parse(res).blocks.forEach(function (block) {
			switch (block.type) {
				case 'header':
					html += `<h${block.data.level}>${block.data.text}</h${block.data.level}>`;
					break;
				case 'paragraph':
					html += `<p>${block.data.text}</p>`;
					break;
				case 'delimiter':
					html += '<hr />';
					break;
				case 'embed':
					html += `<iframe width="560" height="315" src="${block.data.embed}"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
					break;
				case 'image':
					if (block.data.file != undefined) {
						html += `<img class="ui big image bordered" src="${block.data.file.url}" title="${block.data.caption}" /><br /><em>${block.data.caption}</em>`;
					}
					else {
						html += `<img class="ui big image bordered" src="${block.data.url}" title="${block.data.caption}" /><br /><em>${block.data.caption}</em>`;
					}
					break;
				case 'checklist':
					block.data.items.forEach(function (val) {
						html += `<div class="ui checked checkbox"><input type="checkbox" checked="${val.checked}"><label>${val.text}</label></div><br />`;
					});
					break;
				case 'list':
					if (block.data.style == "ordered") {
						html += '<ol>';
					} else {
						html += '<ul>';
					}

					block.data.items.forEach(function (li) {
						html += `<li>${li}</li>`;
					});

					if (block.data.style == "ordered") {
						html += '</ol>';
					} else {
						html += '</ul>';
					}
					break;
				default:
					break;
			}
			content = $sce.trustAsHtml(html);
		});
		return content;
	}

	// 載入文章 modal
	$scope.loadArticle = function(type, aid) {

		$scope.type = type;
		$scope.aid = aid;

		$scope.loadReplyOffset = 0;
		$scope.noMoreReply = false;
		$scope.scroll_switch_reply = false;
		$scope.replyList = [];
		$scope.recentReplyList = [];

		$http({
			url: baseUrl + '/a/query/article',
			method: "POST",
			data: {
				type: $scope.type,
				aid	: $scope.aid,
			}
		})
		.success( function(response) {

			if (response.status != true) {
				errorMsg();
			}
			else {

				if ( response.ispublic == false ) {
					$scope.ispublic = false;
					notloginMsg();
				}
				else {

					$("#reply-bar").show();

					$scope.ispublic = true;
					$scope.article = response;

					if (response.response.length > 0) {
						$scope.article.response.forEach(function (val, i) {
							$scope.article.response[i].reply = $scope.jsonConvertHtml(val.reply);
						});
					}
					

					$scope.content = $scope.jsonConvertHtml(response.result.content);

					// 文章like && line_count && archive
					$scope.articleIsLike = ( $scope.article.result.islike == '1' ) ? true : false;
					$scope.articleLikeCount = $scope.article.result.like_count;
					$scope.articleIsArchive = ( $scope.article.result.isarchive == '1' ) ? true : false;

					$('#article_modal').modal({
						duration : 250,
						transition: 'fade up',
						onHide: function(){
							$("#reply-bar").hide();
							$('#article-reply-input-container').hide();

							if ( $scope.typeCode == 'all' ) {
								history.pushState('', '', baseUrl + '/a');
							}
							else {
								history.pushState('', '', baseUrl + '/a/' + $scope.article.result.di_code + '#suggest');
							}
						},
						onShow: function() {
							$location.path('selene/a/' + $scope.article.result.di_code + '/' + $scope.aid).replace();
						},
					}).modal('show');


					// 回應按讚
					$(document).off().on('click', '.reply_like_btn', function () {

						if ( $scope.article.login == false ) {
							notloginMsg();
						}
						else {

							var _this = $(this);

							switch ( $(_this).attr('isrlike') ) {
								case "true":
								case "false":

									$http({
										url: baseUrl + '/a/query/replylike',
										method: "POST",
										dataType: "JSON",
										data: {
											aid : $scope.aid,
											type: $scope.type,
											replyid: $(_this).attr('replyid'),
											isrlike: $(_this).attr('isrlike'),
										},
									})
									.error( function(response) {
										errorMsg();
									})
									.success( function(response) {

										if (response.status != true) {
											errorMsg();
										}
										else {

											switch ( response.result ) {
												case "rliked":
													$(_this).attr('isrlike', 'true').find('i').attr('class', 'islike-pink large heart icon');
													$(_this).find('.reply_likecount').html( parseInt( $(_this).find('.reply_likecount').html() )+1 ).hide().fadeIn();
													break;

												case "unrliked":
													$(_this).attr('isrlike', 'false').find('i').attr('class', 'empty large heart icon');
													$(_this).find('.reply_likecount').html( parseInt( $(_this).find('.reply_likecount').html() )-1 ).hide().fadeIn();

													break;

												default:
													errorMsg();
													break;

											}

										}
									});
									break;

								default:
								case "notlogin":
									notloginMsg();
									break;

							}
						}

					}); // END OF REPLY LIKE

					$scope.loadReply();
				}

			}
		})
		.error( function(response) {

		});

	}

	// 載入回應
	$scope.loadReply = function() {

		$scope.scroll_switch_reply = false;

		$http({
			url: baseUrl + '/a/query/reply',
			method: "POST",
			data: {
				reply_type	: $scope.type,
				reply_aid	: $scope.aid,
				reply_offset: $scope.loadReplyOffset,
			}
		})
		.success( function(response) {
			if ( response.status == true ) {
				// 將新取得的內容，合併至 replyList[] 內
				$scope.replyList = $scope.replyList.concat(response.result);
				// 一次20筆資料
				$scope.loadReplyOffset = Number($scope.loadReplyOffset) + 50;
				$scope.noMoreReply = ( response.result.length < 50 ) ? true : false;
				$scope.scroll_switch_reply = true;
			}
			else {
				$scope.scroll_switch_reply = false;
				$scope.noMoreReply = true;
			}
		});
	};

	$scope.doReply = function () {

		$http({
			url: baseUrl + '/a/query/article/reply',
			method: "POST",
			data: {
				content	: $scope.replyContent || '',
				art_id	: $scope.aid,
				art_type: $scope.type,
			},
		})
		.success( function(response) {
			if ( response.status == true ) {

				Messenger().post({
					message: "回覆完成！",
					type: "info",
					showCloseButton: true,
					hideAfter: 3
				});

				$scope.recentReplyList = $scope.recentReplyList.concat(response.result);
				$scope.replyContent = '';

			}
			else {

				if (response.login == false) {
					notloginMsg();
				}
				else{

					$.each(response.errors, function(field, i) {
						Messenger().post({
							message: i,
							type: "error",
							showCloseButton: true,
							hideAfter: 6
						});
					});
				}
			}
		});

	};

	// 文章收藏
	$scope.doArchive = function () {

		if ( $scope.article.login == false ) {
			notloginMsg();
		}
		else {

			switch ( $scope.articleIsArchive ) {
				case true:
				case false:

					$http({
						url: baseUrl + '/a/query/archive',
						method: "POST",
						dataType: "JSON",
						data: {
							aid	: $scope.aid,
							type: $scope.type,
							isarchive: $scope.articleIsArchive
						},
					})
					.error( function(response) {
						errorMsg();
					})
					.success( function(response) {

						if (response.status != true) {
							errorMsg();
						}
						else {

							switch ( response.result ) {
								case "archived":
									$scope.articleIsArchive = true;
									break;

								case "unarchived":
									$scope.articleIsArchive = false;
									break;

								default:
									errorMsg();
									break;

							}
						}
					});
					break;

				default:
					errorMsg();
					break;
			}

		}

	};

	// 文章按讚
	$scope.doLike = function () {

		if ( $scope.article.login == false ) {
			notloginMsg();
		}
		else {

			switch ( $scope.articleIsLike ) {
				case true:
				case false:

					$http({
						url: baseUrl + '/a/query/likes',
						method: "POST",
						dataType: "JSON",
						data: {
							aid	: $scope.aid,
							type: $scope.type,
							islike: $scope.articleIsLike,
						},
					})
					.error( function(response) {
						errorMsg();
					})
					.success( function(response) {

						if (response.status != true) {
							errorMsg();
						}
						else {

							switch ( response.result ) {
								case "liked":
									$scope.articleIsLike = $scope.articleIsLike = true;
									$scope.articleLikeCount = parseInt($scope.articleLikeCount) + 1;
									break;

								case "unliked":
									$scope.articleIsLike = $scope.articleIsLike = false;
									$scope.articleLikeCount = parseInt($scope.articleLikeCount) - 1;
									break;

								default:
									errorMsg();
									break;
							}
						}
					});
					break;

				default:
					errorMsg();
					break;
			}

		}
	};


	// 回應刪除
	$scope.removeArticle = function () {

		$http({
			url: baseUrl + '/a/remove/article',
			method: "POST",
			data: {
				aid: $scope.aid
			}
		})
		.success( function(response) {

			if (response.status != true) {
				errorMsg();
			}
			else {
				Messenger().post({
					message: "文章已刪除",
					type: "success",
					showCloseButton: true,
					hideAfter: 3
				});
				setTimeout(function() {
					window.location.href = baseUrl + "selene/a/"
				}, 600);
			}
		});

	};

	// 回應刪除
	$scope.removeReply = function (replyid) {

		$http({
			url: baseUrl + '/a/remove/reply',
			method: "POST",
			data: {
				replyid: replyid
			}
		})
		.success( function(response) {

			if (response.status != true) {
				errorMsg();
			}
			else {
				Messenger().post({
					message: "回覆已刪除",
					type: "success",
					showCloseButton: true,
					hideAfter: 3
				});

				// 從列表將回應移除
				$scope.replyList.find(function(k) { return k.id == replyid; }).reply_del = '1';
			}
		});

	};

	// 文章檢舉
	$scope.articleReport = function () {

		if ( typeof $scope.articleReportDesc == 'undefined' || $scope.articleReportDesc == '' ) {
			$scope.articleReportError = '請輸入檢舉內容';
			return false;
		}

		$http({
			url: baseUrl + '/a/query/report/article',
			method: "POST",
			data: {
				aid		: $scope.aid,
				content	: $scope.articleReportDesc,
			}
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.articleReportError = '您已經檢舉過這篇文章';
			}
			else {
				Messenger().post({
					message: "已送出檢舉",
					type: "success",
					showCloseButton: true,
					hideAfter: 6
				});
				$('#article-report').modal('hide');

				$scope.articleReportDesc = '';
				$scope.articleReportError = '';
			}
		})
		.error( function(response) {
			errorMsg();
		});
	}

	// 回應檢舉
	$scope.reportReply = function (replyid) {

		$http({
			url: baseUrl + '/a/query/report/reply',
			method: "POST",
			data: {
				replyid	: replyid,
				// content	: $scope.articleReportDesc,
			}
		})
		.success( function(response) {

			if (response.status != true) {
				Messenger().post({
					message: "您已經檢舉過這個回應",
					type: "error",
					showCloseButton: true,
					hideAfter: 6
				});
			}
			else {
				Messenger().post({
					message: "已送出檢舉",
					type: "success",
					showCloseButton: true,
					hideAfter: 6
				});
				$('#article-report').modal('hide');
			}
		})
		.error( function(response) {
			errorMsg();
		});
	}

	$scope.search = function() {

		if (typeof $scope.keywords == 'undefined' || $scope.keywords == '' ) {
			Messenger().post({
				message: "請輸入關鍵字查詢",
				type: "error",
				showCloseButton: true,
				hideAfter: 2
			});
		}
		else if ($scope.keywords.length <= 1) {
			Messenger().post({
				message: "請輸入更多的關鍵字",
				type: "error",
				showCloseButton: true,
				hideAfter: 2
			});
		}
		else {

			$http({
				url: baseUrl + '/a/search',
				method: "POST",
				data: {
					keywords: $scope.keywords
				}
			})
			.success( function(response) {

				if (response.status != true) {
					Messenger().post({
						message: "找不到相關文章 QQ",
						type: "error",
						showCloseButton: true,
						hideAfter: 2
					});
				}
				else {
					$scope.scroll_switch = false;
					$scope.noMoreArticle = true;
					$scope.discuss_topic = "搜尋";
					$("#topic-icon").removeClass('quote').addClass('search');
					$("#article-bar").remove();
					$scope.articleList = response.result;
				}

			});
		}
	};

	// 文章篩選排序
	$scope.articleFilter = function (sortType) {
		sort = $scope.articleList.sort(function (a, b) {
			return a.sortType < b.sortType ? 1 : -1;
			
		});
	}

	$scope.hot = function() {

		if ( $('#article-bar-hot i').hasClass('right quote') ) {
			$("#topic-icon").removeClass('comments outline').addClass('right quote');
			$("#article-bar-hot").html('<i class="comments outline icon"></i> 熱門文章');

			$scope.discuss_topic = $scope.discuss;

			$scope.articleList = [];
			$scope.loadMoreOffset = 0;
			$scope.scroll_switch = true;
			$scope.noMoreArticle = false;

			$scope.loadMore();
		}
		else {

			$http({
				url: baseUrl + '/a/'+ $scope.typeCode +'/query/hot',
				method: "GET",
			})
			.success( function(response) {

				if (response.status != true) {

					Messenger().post({
						message: "沒有熱門文章，請過一陣子再回來QQ",
						type: "info",
						showCloseButton: true,
						hideAfter: 2
					});

				}
				else {
					$scope.scroll_switch = false;
					$scope.noMoreArticle = true;

					$scope.discuss = $scope.discuss_topic;
					$scope.discuss_topic = $scope.discuss_topic + ' 熱門文章'
					$("#topic-icon").removeClass('right quote').addClass('comments outline');
					$("#article-bar-hot").html('<i class="right quote icon"></i> 一般文章');

					$scope.articleList = response.result;
				}

			});

		}

	}

	// 上傳圖片
	$scope.uploadImgur = function(element) {

		$scope.uploadProgress = 0;
		$scope.sending 	= true;
		$scope.error 	= false;

		var image = element.files[0];

		imgurUpload.upload(image).then(function(result) {
			$scope.sending = false;
			$scope.replyContent += ' \n' + result.data.link + ' \n\n';
		}, function(err) {
			$scope.sending = false;
		}, function(progress) {
			$timeout(function() {
				$scope.progress = progress;
			});
		});

		Messenger().post({
			message: "上傳完成將自動插入！",
			type: "info",
			showCloseButton: true,
			hideAfter: 2
		});
	};

})
.controller('AccountCtrl', function($scope, $http, objectsToArray) {

	$scope.goto = function (u) {
		window.location.href = baseUrl + '/a/' + u;
	}

	$scope.friends = function () {
		$http({
			url: baseUrl + '/account/query/friends',
			method: "GET",
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.noFriends = true;
			}
			else {
				$scope.friendsList = response.result;
				// 如果有訊息，自動將過濾器打勾
				$scope.friendsUnread = (objectsToArray($scope.friendsList, 'sms').indexOf('1') !== -1 ) ? 1 : undefined;
			}
		})
		.error( function(response) {
			$scope.failLoading = true;
		});
	}

	// 我發布的文章
	$scope.loadArticleOffset = 0;
	$scope.scroll_switch_article = false;
	$scope.articleList = [];

	$scope.article = function () {

		$scope.scroll_switch_article = false;

		$http({
			url: baseUrl + '/account/query/article',
			method: "POST",
			data: {
				offset: $scope.loadArticleOffset,
			}
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.noArticle = true;
				$scope.scroll_switch_article = false;
			}
			else {
				$scope.articleList = $scope.articleList.concat(response.result);
				$scope.loadArticleOffset = Number($scope.loadArticleOffset) + 50;
				$scope.scroll_switch_article = true;
			}
		})
		.error( function(response) {
			$scope.failLoading = true;
			$scope.scroll_switch_article = false;
		});
	}


	// 我參與的文章
	$scope.loadJoinArticleOffset = 0;
	$scope.scroll_switch_join_article = false;
	$scope.joinArticleList = [];

	$scope.joinArticle = function () {

		$scope.scroll_switch_join_article = false;

		$http({
			url: baseUrl + '/account/query/joinArticle',
			method: "POST",
			data: {
				offset: $scope.loadJoinArticleOffset,
			}
		})
			.success(function (response) {

				if (response.status != true) {
					$scope.noArticle = true;
					$scope.scroll_switch_join_article = false;
				}
				else {
					$scope.joinArticleList = $scope.joinArticleList.concat(response.result);
					$scope.loadJoinArticleOffset = Number($scope.loadJoinArticleOffset) + 50;
					$scope.scroll_switch_join_article = true;
				}
			})
			.error(function (response) {
				$scope.failLoading = true;
				$scope.scroll_switch_join_article = false;
			});
	}

	$scope.loadArchiveOffset = 0;
	$scope.scroll_switch_archive = false;
	$scope.archiveList = [];
	$scope.filterBoard = "all";

	$scope.archive = function () {

		$scope.scroll_switch_article = false;

		$http({
			url: baseUrl + '/account/query/archive',
			method: "POST",
			data: {
				offset: $scope.loadArchiveOffset,
			}
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.noArchive = true;
				$scope.scroll_switch_article = false;
			}
			else {
				$scope.archiveList = $scope.archiveList.concat(response.result);
				$scope.loadArchiveOffset = Number($scope.loadArchiveOffset) + 50;
				$scope.scroll_switch_archive = true;

			}
		})
		.error( function(response) {
			$scope.failLoading = true;
			$scope.scroll_switch_article = false;
		});
	}


	// 篩選我的收藏板塊
	$scope.filterBoard = function (selectedItem) {
		$scope.filterBoardName = selectedItem.di_name;
	}


	$scope.items = function () {
		$http({
			url: baseUrl + '/account/query/items',
			method: "GET",
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.noItems = true;
			}
			else {
				$scope.itemsList = response.result;
			}
		})
		.error( function(response) {
			$scope.failLoading = true;
		});
	}

	// 載入物品 Modal
	$scope.loadItemDetail = function (i) {
		$scope.itemModal = $scope.itemsList[i];
		$('#item-detail-modal').modal('show');
	}

	$scope.warning = function () {
		$http({
			url: baseUrl + '/account/query/warning',
			method: "GET",
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.noWarning = true;
			}
			else {
				$scope.warningList = response.result;
			}
		})
		.error( function(response) {
			$scope.failLoading = true;
		});
	}

	$scope.loadTalkOffset = 0;
	$scope.noMoreTalk = false;
	$scope.scroll_switch_talk = false;
	$scope.talkList = [];

	// 訊息
	$scope.getTalk = function() {

		$scope.scroll_switch_talk = false;

		$http({
			url: baseUrl + '/account/friends/talk/get',
			method: "POST",
			data: {
				friend : $scope.friendId,
				offset : $scope.loadTalkOffset,
			}
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.noTalk = true;
				$scope.scroll_switch_talk = false;
			}
			else {

				$scope.loadTalkOffset = Number($scope.loadTalkOffset) + 30;
				$scope.talkList = $scope.talkList.concat(response.result);

				$scope.scroll_switch_talk = true;
			}
		})
		.error( function(response) {
			$scope.failLoading = true;
			$scope.scroll_switch_talk = false;

		});
	}

	// 送出訊息
	$scope.sentMsg = [];

	$scope.sendTalk = function () {
		if ( typeof $scope.friendMessage == 'undefined' || $scope.friendMessage == '' ) {
			return false;
		}

		$http({
			url: baseUrl + '/account/friends/talk/send',
			method: "POST",
			data: {
				receiver: $scope.friendId,
				content : $scope.friendMessage,
			}
		})
		.success( function(response) {

			if (response.status != true) {
				errorMsg();
			}
			else {
				Messenger().post({
					message: "已送出訊息",
					type: "success",
					showCloseButton: true,
					hideAfter: 6
				});

				$scope.friendMessage = '';
				$('#friendMessage').focus();

				$scope.sentMsg[0] = response.result;
				$scope.talkList = $scope.sentMsg.concat($scope.talkList);

				$('#talk-list').animate({
					scrollTop: 0
				}, 100);

			}
		})
		.error( function(response) {
			errorMsg();
		});
	}

	$scope.friendReport = function () {

		if ( typeof $scope.friendReportDesc == 'undefined' || $scope.friendReportDesc == '' ) {
			$scope.friendReportError = '請輸入檢舉內容';
			return false;
		}

		$http({
			url: baseUrl + '/friend/invite/report',
			method: "POST",
			data: {
				content : $scope.friendReportDesc,
			}
		})
		.success( function(response) {

			if (response.status != true) {
				$scope.friendReportError = response.errors.content;
			}
			else {
				Messenger().post({
					message: "已送出檢舉",
					type: "success",
					showCloseButton: true,
					hideAfter: 6
				});
				$('#report-modal').modal('hide');

				$scope.friendReportDesc = '';
				setTimeout(function() {
					window.location.reload();
				}, 600);

			}
		})
		.error( function(response) {
			errorMsg();
		});
	}


})
.controller('NotificationCtrl', function($scope, $http) {
	$http({
		url: baseUrl + '/account/query/notice',
		method: "GET",
	})
	.success( function(response) {

		if ( response.status !== true ) {
			$scope.noNotice = true;
		}
		else {
			$scope.noticeList = response;

			$scope.noticeCount = Number( $scope.noticeList.article.length || 0 )
								+ Number( $scope.noticeList.account.sms || 0 );

		}
	})
	.error( function(response) {
		$scope.failLoading = true;
	});
})
.controller('JoinCtrl', function($scope, $http) {

	$scope.schoolList = School_List;
	$scope.deptList = Dept_List;

	$scope.join = function () {

		if ( typeof $scope.joinTerms == 'undefined' || $scope.joinTerms == false ) {
			Messenger().post({
				message: "請同意會員條款",
				type: "error",
				showCloseButton: true,
				hideAfter: 3
			});
			return false;
		}

		$http({
			url: baseUrl + '/join/confirm',
			method: "POST",
			data: {
				email 		: $scope.joinEmail || '',
				firstname 	: $scope.joinFirstname || '',
				birthday	: $scope.joinBirthday || '',
				gender 		: $scope.joinGender || '',
				psw 		: $scope.joinPassword || '',
				ck_psw 		: $scope.joinPasswordConfirm || '',
			}
		})
		.success( function(response) {

			if (response.status == true) {

				Messenger().post({
					message: "註冊成功！",
					type: "success",
					showCloseButton: true,
					hideAfter: 2
				});

				setTimeout(function(){
					window.location.href = baseUrl + '/join/success/' + response.school;
				}, 500);
			}
			else {

				$.each(response.errors, function(field, i) {
					$('#join-' + field).addClass('error');
					Messenger().post({
						message: i,
						type: "error",
						showCloseButton: true,
						hideAfter: 6
					});
				});
			}
		})
		.error( function(response) {
			errorMsg();
		});
	}

	// 重寄認證信
	$scope.resendEnable = function () {

		if ( typeof $scope.loginEmail == 'undefined' || $scope.loginEmail == '' ) {
			$scope.resendError = '是要寄給誰啦！';
			return false;
		}

		$http({
			url: baseUrl + '/join/request/enable',
			method: "POST",
			data: {
				email 		: $scope.loginEmail || '',
			}
		})
		.success( function(response) {

			if (response.status == true) {

				Messenger().post({
					message: "認證信已補發！",
					type: "success",
					showCloseButton: true,
					hideAfter: 2
				});
				$scope.loginEmail = '';

				setTimeout(function(){
					window.location.href = baseUrl + '/join/success/' + response.school;
				}, 500);

			}
			else {
				$scope.resendError = response.errors;
			}
		})
		.error( function(response) {
			errorMsg();
		});
	}

	// 重設密碼
	$scope.resetPassword = function () {

		if ( typeof $scope.loginEmail == 'undefined' || $scope.loginEmail == '' ) {
			return false;
		}

		$http({
			url: baseUrl + '/join/request/password',
			method: "POST",
			data: {
				school 		: $scope.loginSchool || '',
				dept 		: $scope.loginDept || '',
				email 		: $scope.loginEmail || '',
				gender 		: $scope.loginGender || '',
			}
		})
		.success( function(response) {

			if (response.status == true) {

				Messenger().post({
					message: "申請重設密碼成功，請至校園信箱查看",
					type: "success",
					showCloseButton: true,
					hideAfter: 2
				});
				$scope.loginEmail = '';

				setTimeout(function(){
					window.location.href = baseUrl + '/login';
				}, 500);

			}
			else {
				$scope.resetError = response.errors;
			}
		})
		.error( function(response) {
			errorMsg();
		});
	}

	// 送出更換密碼
	$scope.doResetPassword = function () {

		if ( typeof $scope.newPassword == 'undefined' || $scope.newPassword == '' ) {
			return false; }
		if ( typeof $scope.newPasswordConfirm == 'undefined' || $scope.newPasswordConfirm == '' ) {
			return false; }

		$http({
			url: baseUrl + '/join/request/password/reset',
			method: "POST",
			data: {
				newPassword			: $scope.newPassword || '',
				newPasswordConfirm	: $scope.newPasswordConfirm || '',
				resetKey			: $scope.resetKey || '',
			}
		})
		.success( function(response) {

			if (response.status == true) {

				$scope.newPassword = '';
				$scope.newPasswordConfirm = '';

				Messenger().post({
					message: "重設密碼成功，請使用新密碼登入",
					type: "success",
					showCloseButton: true,
					hideAfter: 2
				});

				setTimeout(function(){
					window.location.href = baseUrl + '/login';
				}, 500);

			}
			else {
				$scope.resetError = response.errors;
			}
		})
		.error( function(response) {
			errorMsg();
		});

	}


})
.controller('PostArticleCtrl', function($scope, $http) {

	// reference Temporary storage content
	$scope.referContentTemp = window.localStorage.getItem("tempStorageRefer");

	$scope.newpost = function () {

		$http({
			url: baseUrl + '/article/newpost/save',
			method: "POST",
			data: {
				title 		: $scope.postTitle || '',
				content		: postContent || '',
				refer		: $scope.referContent || '',
				type 		: $scope.postType || '',
				public 		: $scope.postPublic || false,
				sign		: $scope.postSign || false
			}
		})
		.success( function(response) {

			if (response.status != true) {

				$.each(response.errors, function(field, i) {

					Messenger().post({
						message: i,
						type: "error",
						showCloseButton: true,
						hideAfter: 6
					});

				});
			}
			else {
				localStorage.removeItem("tempStorageRefer");
				window.location.href = baseUrl + '/a/' + $scope.typeCode;
			}
		})
		.error( function(response) {
			errorMsg();
		});
	}

	// 暫存 referContent
	$scope.tempStorageRefer = function () {
		window.localStorage.setItem("tempStorageRefer", this.referContent);
	}


	$scope.newresponse = function () {

		$http({
			url: baseUrl + '/article/newresponse/save',
			method: "POST",
			data: {
				reply: postContent || '',
				reason: $scope.reasonContent,
				id: $scope.id
			}
		})
			.success(function (res) {

				if (res.status == false) {

					$.each(res.errors, function (field, i) {

						Messenger().post({
							message: i,
							type: "error",
							showCloseButton: true,
							hideAfter: 6
						});

					});
				}
				else {
					window.location.href = baseUrl + '/a/' + res.status.di_code + '/' + res.status.id;
				}
			})
			.error(function (err) {
				errorMsg();
			});
	}


	// 取得編輯文章的內容
	$scope.geteditpost = function () {
		
		$http({
			url: baseUrl + '/article/edit/query',
			method: "POST",
			data: {
				artId: $scope.aid,
				typeCode: $scope.typeCode,
			}
		})
		.success(function (response) {
			const editor = new EditorJS({
				holderId: 'editorjs',
				tools: {
					delimiter: Delimiter,
					header: {
						class: Header
					},
					list: {
						class: List
					},
					embed: {
						class: Embed,
						config: {
							services: {
								youtube: true
							}
						}
					},
					image: SimpleImage,
					Marker: {
						class: Marker,
						shortcut: 'CMD+SHIFT+M',
					},
					checklist: {
						class: Checklist,
						inlineToolbar: true,
					}
				},
				onChange: function () {
					editor.save().then(savedData => {
						postContent = JSON.stringify(savedData);
					});
				},
				data: JSON.parse(response.article.content),
				placeholder: '輸入些什麼...'
			});
		})
		.error(function (response) {
			errorMsg();
		});
	}


	$scope.editpost = function () {

		$http({
			url: baseUrl + '/article/edit/save',
			method: "POST",
			data: {
				art_id		: $scope.aid || '',
				title		: $scope.postTitle || '',
				content		: postContent,
				public		: $scope.postPublic || false,
			}
		})
		.success( function(response) {

			if (response.status != true) {

				$.each(response.errors, function(field, i) {

					Messenger().post({
						message: i,
						type: "error",
						showCloseButton: true,
						hideAfter: 6
					});

				});
			}
			else {

				window.location.href = baseUrl + '/a/' + $scope.typeCode + '/' + $scope.aid;
			}
		})
		.error( function(response) {
			errorMsg();
		});
	}

});


selene.filter("formatter", function() {

	return function(content) {

		content = content || '';

		var __urlreg = /(\b(https?):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
		var __imgreg = /\.(?:jpe?g|gif|png)$/i;

		return content.replace(__urlreg, function(match){
			__imgreg.lastIndex=0;

			if(__imgreg.test(match)){
				return '<p><a href="'+match+'" target="_blank"><img class="ui large image" src="'+match+'" /></a></p>';
			}
			else{
				return '<a href="'+match+'" target="_blank">'+match+'</a>';
			}
		}).replace(/\r\n|\n\r|\r|\n/g,'<br>');
	}

})
.filter("gender", function(){
	return function(g){

		if ( g == 1) {
			return 'nav-blue notinverted man'; }
		else if ( g == 0 ) {
		 	return 'female-pink notinverted woman'; }
		else if ( g == 9 ) {
			return 'grey student'; }
		else { return ''; }
	}
})
.filter("relativeTime", function() {
	return function(t) {
		return moment(t, 'YYYY-MM-DD HH:mm:ss').fromNow();
	}
})
.filter("hotLayer", function(){
	return function(c){

		if ( c > 21 && c <= 60) {
			return 'hot-layer-1'; }
		else if ( c >= 61 && c <= 100 ) {
		 	return 'hot-layer-2'; }
		else if ( c >= 101 && c <= 150 ) {
			return 'hot-layer-3'; }
		else if ( c >= 151 && c <= 200 ) {
			return 'hot-layer-4'; }
		else if ( c >= 201 ) {
			return 'hot-layer-5'; }
		else { return ''; }

	}
});

selene.directive('onEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.onEnter);
                });

                event.preventDefault();
            }
        });
    };
})
.directive('contenteditable', ['$sce', function($sce) {
	// Make div contenteditable nb-model friendly
	return {
		restrict: 'A',
		require: '?ngModel',
		link: function(scope, element, attrs, ngModel) {
			if (!ngModel) return;

			ngModel.$render = function() {
				element.html($sce.getTrustedHtml(ngModel.$viewValue || ''));
			};

			element.on('blur keyup change', function() {
				scope.$evalAsync(read);
			});
			read();

			function read() {
				var html = element.html();

				if ( attrs.stripBr && html == '<br>' ) {
					html = '';
				}
				ngModel.$setViewValue(html);
			}
		}
	};
}]);

// transform single field objects into array
selene.factory('objectsToArray', function () {

	return function(objects, key) {
		this.result = [];
		for (i in objects) {
			result.push(objects[i][key]);
		}
		return result;
	};

});

selene.service('imgurUpload', ["$q", function($q) {
	// upload images to imgur
	var clientId = "5f2eaa3314e3d73";
	return {
		setClientId: function(id) {
			return clientId = id;
		},
		upload: function(file, options) {
			var deferred, fd, ref, xhr;
			if (options == null) {
				options = {};
			}
			deferred = $q.defer();
			clientId = options.clientId || clientId;
			if (clientId == null) {
				deferred.reject("沒有 ClientId");
				return deferred.promise;
			}
			if (file == null) {
				deferred.reject("沒有選擇檔案");
				return deferred.promise;
			}
			if (!options.canvas) {
				if (!(file != null ? (ref = file.type) != null ? ref.match(/image.*/) : void 0 : void 0)) {
					deferred.reject("找不到圖片");
					return deferred.promise;
				}
			}
			xhr = new XMLHttpRequest();
			xhr.open('POST', 'https://api.imgur.com/3/image.json');
			xhr.setRequestHeader('Authorization', "Client-ID " + clientId);
			xhr.upload.addEventListener('progress', function(event) {
				var percent;
				percent = parseInt(event.loaded / event.total * 100);
				return deferred.notify(percent);
			}, false);
			if (!options.canvas) {
				if (typeof FormData === "undefined" || FormData === null) {
					deferred.reject("瀏覽器不支援FormData");
					return deferred.promise;
				}
				fd = new FormData();
				fd.append('image', file);
				xhr.send(fd);
			}
			if (options.canvas) {
				xhr.send(file);
			}
			xhr.onerror = deferred.reject;
			xhr.onload = function() {
				var result;
				result = JSON.parse(xhr.responseText);
				return deferred.resolve(result);
			};
			return deferred.promise;
		}
	};
}]);


selene.config(['$httpProvider', '$locationProvider', function ($httpProvider, $locationProvider) {

	$locationProvider.html5Mode({
	  enabled: true,
	  requireBase: false
	});

  // Intercept POST requests, convert to standard form encoding
  $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
  $httpProvider.defaults.headers.post["X-Requested-With"] = "XMLHttpRequest";
  $httpProvider.defaults.transformRequest.unshift(function (data, headersGetter) {
    var key, result = [];

    if (typeof data === "string")
      return data;

    for (key in data) {
      if (data.hasOwnProperty(key))
        result.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
    }
    return result.join("&");
  });
}]);
