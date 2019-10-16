// google analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-73885364-1', 'auto');
ga('send', 'pageview');

(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KZ7LTX');

// Messenger Init
Messenger.options = {
	extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
	theme: 'flat',
}

// Moment Relative Time Locale
moment.locale('zh-tw');

// fastclick
$(function() {
	FastClick.attach(document.body);
	$("#login-email").val('g10694024@cycu.edu.tw');
	$("#login-password").val('123456');
	var baseUrl = "http://localhost";
});

// Moment get relativeTime function
function relativeTime(t) {
	return moment(t, 'YYYY-MM-DD HH:mm:ss').fromNow();
}

// Get gender function
function gender(g) {

	var img_male = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAxMjcuNzgyIDEyNy43ODIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEyNy43ODIgMTI3Ljc4MjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxnPjxnPjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNGRkQ0MDA7IiBwb2ludHM9IjkwLjY4NSw1LjkyNyA2NC42OSw1LjkyNyA1MC4zNjUsMzEuMDY2IDYyLjAwNSwzMS4wNjYgNDYuNzM1LDYyLjA5MSA4Ni44NjQsMjYuMTgzIDczLjgyNywyNi4xODMgIi8+PC9nPjxnPjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNGRkIwMDA7IiBwb2ludHM9IjU5LjcyNCwxNC42NDIgNTAuMzY1LDMxLjA2NiA2Mi4wMDUsMzEuMDY2IDQ2LjczNSw2Mi4wOTEgNzcuMTI0LDM0Ljg5OCA2Ni45OTUsMzQuODk4IDc0LjI0NywyNi4xODMgNzMuODI3LDI2LjE4MyA4My40MzEsMTQuNjQyICIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojMzMzNjNBOyIgZD0iTTQ2LjczNCw2My41OTFjLTAuMzE4LDAtMC42MzgtMC4xMDEtMC45MDYtMC4zMDVjLTAuNTcyLTAuNDM1LTAuNzU3LTEuMjEzLTAuNDM5LTEuODU3bDE0LjIwNi0yOC44NjNoLTkuMjI5Yy0wLjUzNCwwLTEuMDI4LTAuMjg0LTEuMjk3LTAuNzQ2cy0wLjI3MS0xLjAzMi0wLjAwNy0xLjQ5Nkw2My4zODYsNS4xODVjMC4yNjgtMC40NjksMC43NjUtMC43NTgsMS4zMDQtMC43NThoMjUuOTk1YzAuNTgyLDAsMS4xMTEsMC4zMzcsMS4zNTgsMC44NjNjMC4yNDcsMC41MjcsMC4xNjcsMS4xNDktMC4yMDUsMS41OTdMNzcuMDI3LDI0LjY4M2g5LjgzN2MwLjYyMiwwLDEuMTgsMC4zODQsMS40MDEsMC45NjVzMC4wNjMsMS4yMzgtMC40MDEsMS42NTNsLTQwLjEzLDM1LjkwOEM0Ny40NTEsNjMuNDYzLDQ3LjA5Myw2My41OTEsNDYuNzM0LDYzLjU5MXogTTUyLjk0NiwyOS41NjZoOS4wNTljMC41MTksMCwxLDAuMjY4LDEuMjczLDAuNzA3YzAuMjczLDAuNDQsMC4zMDEsMC45OSwwLjA3MiwxLjQ1NUw1MS40OTIsNTUuODIxbDMxLjQ0Ni0yOC4xMzhoLTkuMTExYy0wLjU4MiwwLTEuMTExLTAuMzM3LTEuMzU4LTAuODYzYy0wLjI0Ny0wLjUyNy0wLjE2Ny0xLjE0OSwwLjIwNS0xLjU5N0w4Ny40ODQsNy40MjdINjUuNTYyTDUyLjk0NiwyOS41NjZ6Ii8+PC9nPjwvZz48Zz48Zz48cGF0aCBzdHlsZT0iZmlsbDojRkZGODAwOyIgZD0iTTExMy4xLDg0LjQxM2MwLDIwLjY3Ni0yMi4wMzIsMzcuNDQxLTQ5LjIwOSwzNy40NDFjLTI3LjE3OCwwLTQ5LjIwOS0xNi43NjYtNDkuMjA5LTM3LjQ0MWMwLTIwLjY4LDIyLjAzMS00NS40NTksNDkuMjA5LTQ1LjQ1OUM5MS4wNjgsMzguOTU0LDExMy4xLDYzLjczNCwxMTMuMSw4NC40MTN6Ii8+PC9nPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNGRkQ0MDA7IiBkPSJNMTEzLjEsODQuNDEzYzAsMjAuNjc2LTIyLjAzMiwzNy40NDEtNDkuMjA5LDM3LjQ0MWMtMjcuMTc4LDAtNDkuMjA5LTE2Ljc2Ni00OS4yMDktMzcuNDQxYzAtMjAuNjgsMjIuMDMxLTM0LjkyOCw0OS4yMDktMzQuOTI4QzkxLjA2OCw0OS40ODYsMTEzLjEsNjMuNzM0LDExMy4xLDg0LjQxM3oiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0ZGRjgwMDsiIGQ9Ik03NC4zNyw3NC42MTVjMCwxLjM5My00LjY5MSwxLjY0My0xMC40NzksMS42NDNzLTEwLjQ3OS0wLjI1LTEwLjQ3OS0xLjY0M2MwLTEuMzk1LDQuNjkxLTUuMDM3LDEwLjQ3OS01LjAzN1M3NC4zNyw3My4yMiw3NC4zNyw3NC42MTV6Ii8+PC9nPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNGRkIwMDA7IiBkPSJNMTEzLjEsODQuNDEzYzAsMjAuNjc2LTIyLjAzMiwzNy40NDEtNDkuMjA5LDM3LjQ0MWMtMjcuMTc4LDAtNDkuMjA5LTE2Ljc2Ni00OS4yMDktMzcuNDQxYzAtMjAuNjgyLDYuMjYxLDE4LjM0LDQ5LjIwOSwxOC4zNFMxMTMuMSw2My43MzIsMTEzLjEsODQuNDEzeiIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojMzMzNjNBOyIgZD0iTTYzLjg5MSwxMjMuMzU1Yy0yNy45NjEsMC01MC43MDktMTcuNDY5LTUwLjcwOS0zOC45NDFjMC0yMS4yNywyMi42MTktNDYuOTU5LDUwLjcwOS00Ni45NTlTMTE0LjYsNjMuMTQ0LDExNC42LDg0LjQxM0MxMTQuNiwxMDUuODg2LDkxLjg1MiwxMjMuMzU1LDYzLjg5MSwxMjMuMzU1eiBNNjMuODkxLDQwLjQ1NGMtMjYuNDI4LDAtNDcuNzA5LDI0LjA0OC00Ny43MDksNDMuOTU5YzAsMTkuODE4LDIxLjQwMiwzNS45NDEsNDcuNzA5LDM1Ljk0MVMxMTEuNiwxMDQuMjMyLDExMS42LDg0LjQxM0MxMTEuNiw2NC41MDIsOTAuMzE4LDQwLjQ1NCw2My44OTEsNDAuNDU0eiIvPjwvZz48L2c+PGc+PGc+PGc+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0ZGRDQwMDsiIGQ9Ik05LjE5Nyw0Ny4yNzNjNi4zODUsMTAuNTQxLDE1LjMzMSwxNi43MzgsMjMuOTg1LDE3LjgxMWMxLjQ5Mi0xMC43NTQtMC44NzItMjMuMjMyLTcuMjU4LTMzLjc3M0MxOS41MzksMjAuNzY3LDEwLjU5MywxNC41NywxLjk0LDEzLjUwMUMwLjQ0NywyNC4yNTEsMi44MTIsMzYuNzMyLDkuMTk3LDQ3LjI3M3oiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0ZGQjAwMDsiIGQ9Ik0xLjk0LDEzLjUwMWMtMS40OTIsMTAuNzUsMC44NzIsMjMuMjMsNy4yNTgsMzMuNzcxYzYuMzg1LDEwLjU0MSwxNS4zMzEsMTYuNzM4LDIzLjk4NSwxNy44MTFMMS45NCwxMy41MDF6Ii8+PC9nPjxwYXRoIHN0eWxlPSJmaWxsOiMzMzM2M0E7IiBkPSJNMzQuNTg3LDUxLjI5NmMtMS4wNDEtNy4zMzQtMy41OTMtMTQuNTE0LTcuMzc5LTIwLjc2NGMtNi40MTctMTAuNTk0LTE1LjU2LTE3LjM0NC0yNS4wODUtMTguNTJjLTAuODE2LTAuMTAxLTEuNTU3LDAuNDctMS42NjksMS4yODJjLTEuNjExLDExLjYwMiwxLjEwOCwyNC4yNyw3LjQ2LDM0Ljc1NWM0LjMzOSw3LjE2Niw5Ljk2MSwxMi42MjIsMTYuMjU5LDE1Ljc3OGMwLjIxNiwwLjEwOCwwLjQ0NCwwLjE1OSwwLjY3MSwwLjE1OWMwLjU1LDAsMS4wNzktMC4zMDMsMS4zNDItMC44MjhjMC4zNzEtMC43NCwwLjA3Mi0xLjY0Mi0wLjY2OS0yLjAxM2MtNS43OTEtMi45MDMtMTAuOTktNy45NjktMTUuMDM2LTE0LjY1MWMtMS44NjEtMy4wNzEtMy4zODUtNi4zNC00LjU2Ny05LjcxM2M2LjEtMSwxMy4xNTcsMi4xMTcsMTIuMzE0LTEyLjk4N2MyLjMzOCwyLjM2Miw0LjUwMyw1LjEzNyw2LjQxNCw4LjI5MmMzLjU3OSw1LjkwNiw1Ljk5LDEyLjY5NCw2Ljk3NSwxOS42MzFjMC4xMTcsMC44MiwwLjg3OSwxLjM4NSwxLjY5NiwxLjI3NEMzNC4xMzMsNTIuODc2LDM0LjcwMyw1Mi4xMTcsMzQuNTg3LDUxLjI5NnoiLz48L2c+PC9nPjxnPjxnPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNGRkQ0MDA7IiBkPSJNMTE4LjU4NCw0Ny4yNzNjLTYuMzg1LDEwLjU0MS0xNS4zMzEsMTYuNzM4LTIzLjk4NSwxNy44MTFjLTEuNDkyLTEwLjc1NCwwLjg3MS0yMy4yMzIsNy4yNTgtMzMuNzczYzYuMzg2LTEwLjU0MywxNS4zMzItMTYuNzQsMjMuOTg2LTE3LjgwOEMxMjcuMzM0LDI0LjI1MSwxMjQuOTcxLDM2LjczMiwxMTguNTg0LDQ3LjI3M3oiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0ZGQjAwMDsiIGQ9Ik0xMjUuODQzLDEzLjUwMWMxLjQ5MSwxMC43NS0wLjg3MiwyMy4yMy03LjI1OSwzMy43NzFjLTYuMzg1LDEwLjU0MS0xNS4zMzEsMTYuNzM4LTIzLjk4NSwxNy44MTFMMTI1Ljg0MywxMy41MDF6Ii8+PC9nPjxwYXRoIHN0eWxlPSJmaWxsOiMzMzM2M0E7IiBkPSJNMTI3LjMyOCwxMy4yOTVjLTAuMTEyLTAuODEzLTAuODU3LTEuMzgyLTEuNjY5LTEuMjgyYy05LjUyNSwxLjE3Ni0xOC42NjksNy45MjYtMjUuMDg2LDE4LjUyYy0zLjc4Nyw2LjI1My02LjMzOSwxMy40MzQtNy4zNzgsMjAuNzY0Yy0wLjExNiwwLjgyLDAuNDU0LDEuNTgsMS4yNzQsMS42OTZjMC44MzIsMC4xMTQsMS41OC0wLjQ1NSwxLjY5Ni0xLjI3NGMwLjk4Mi02LjkzNCwzLjM5NS0xMy43MjIsNi45NzQtMTkuNjMxYzEuOTExLTMuMTU1LDQuMDc2LTUuOTMsNi40MTQtOC4yOTJjLTAuODQ0LDE1LjEwNCw2LjIxNCwxMS45ODcsMTIuMzE1LDEyLjk4N2MtMS4xODIsMy4zNzMtMi43MDYsNi42NDItNC41NjcsOS43MTNjLTQuMDQ4LDYuNjg0LTkuMjQ3LDExLjc1LTE1LjAzNiwxNC42NTFjLTAuNzQxLDAuMzcxLTEuMDQsMS4yNzItMC42NjksMi4wMTNjMC4yNjMsMC41MjUsMC43OTIsMC44MjgsMS4zNDIsMC44MjhjMC4yMjYsMCwwLjQ1NS0wLjA1MSwwLjY3MS0wLjE1OWM2LjI5Ni0zLjE1NSwxMS45MTgtOC42MTEsMTYuMjU5LTE1Ljc3OEMxMjYuMjE5LDM3LjU2NywxMjguOTM5LDI0Ljg5OSwxMjcuMzI4LDEzLjI5NXoiLz48L2c+PC9nPjwvZz48Zz48Zz48Y2lyY2xlIHN0eWxlPSJmaWxsOiNGRjFBMUE7IiBjeD0iMzIuODg5IiBjeT0iODcuNzc1IiByPSI3LjAxMyIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojRDYxRDFEOyIgZD0iTTM5LjkwMiw4Ny43NzVjMCwzLjg3MS0zLjE0LDcuMDEyLTcuMDEzLDcuMDEyYy0zLjg3NCwwLTcuMDE0LTMuMTQxLTcuMDE0LTcuMDEyIi8+PC9nPjxnPjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGMUExQTsiIGN4PSI5NC44OTIiIGN5PSI4Ny43NzUiIHI9IjcuMDE0Ii8+PC9nPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNENjFEMUQ7IiBkPSJNMTAxLjkwNSw4Ny43NzVjMCwzLjg3MS0zLjE0MSw3LjAxMi03LjAxNCw3LjAxMmMtMy44NzMsMC03LjAxNC0zLjE0MS03LjAxNC03LjAxMiIvPjwvZz48L2c+PHBhdGggc3R5bGU9ImZpbGw6IzMzMzYzQTsiIGQ9Ik03My41MjgsODAuMjgxYy0wLjgyOCwwLTEuNSwwLjY3Mi0xLjUsMS41YzAsMS40MjctMS4xNjIsMi41ODgtMi41OTEsMi41ODhoLTEuNDU2Yy0xLjQyOCwwLTIuNTktMS4xNjEtMi41OS0yLjU4OHYtMS40NTVjMC0wLjA3My0wLjAxMS0wLjE0My0wLjAyMS0wLjIxM2wzLjExLTEuNTU2YzAuNjIyLTAuMzEyLDAuOTQ5LTEuMDEsMC43ODktMS42ODdzLTAuNzY1LTEuMTU1LTEuNDYtMS4xNTVoLTcuODM3Yy0wLjY5NSwwLTEuMywwLjQ3OS0xLjQ2LDEuMTU1czAuMTY3LDEuMzc1LDAuNzg5LDEuNjg3bDMuMTA5LDEuNTU2Yy0wLjAxLDAuMDctMC4wMjEsMC4xNC0wLjAyMSwwLjIxM3YxLjQ1NWMwLDEuNDI3LTEuMTYxLDIuNTg4LTIuNTg5LDIuNTg4aC0xLjQ1N2MtMS40MjksMC0yLjU5MS0xLjE2MS0yLjU5MS0yLjU4OGMwLTAuODI4LTAuNjcyLTEuNS0xLjUtMS41cy0xLjUsMC42NzItMS41LDEuNWMwLDMuMDgxLDIuNTA4LDUuNTg4LDUuNTkxLDUuNTg4aDEuNDU3YzEuNjE2LDAsMy4wNjktMC42OTMsNC4wOS0xLjc5MmMxLjAyMSwxLjA5OSwyLjQ3NSwxLjc5Miw0LjA5MSwxLjc5MmgxLjQ1NmMzLjA4MywwLDUuNTkxLTIuNTA3LDUuNTkxLTUuNTg4Qzc1LjAyOCw4MC45NTMsNzQuMzU3LDgwLjI4MSw3My41MjgsODAuMjgxeiIvPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiM2RDVDNEQ7IiBkPSJNNDcuNzI5LDcwLjE0NGMwLDQuNDQ5LTMuNjA1LDguMDUxLTguMDUzLDguMDUxYy00LjQ0NiwwLTguMDUxLTMuNjAyLTguMDUxLTguMDUxYzAtNC40NDcsMy42MDQtOC4wNTMsOC4wNTEtOC4wNTNDNDQuMTIzLDYyLjA5MSw0Ny43MjksNjUuNjk3LDQ3LjcyOSw3MC4xNDR6Ii8+PC9nPjxnPjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGN4PSIzNS42NzIiIGN5PSI2Ny41MjciIHI9IjMuMjgxIi8+PC9nPjxwYXRoIHN0eWxlPSJmaWxsOiMzMzM2M0E7IiBkPSJNMzkuNjc2LDYwLjU5MWMtMy4yNDUsMC02LjExMywxLjYzLTcuODQsNC4xMTFjLTAuMTA1LDAuMTQzLTAuMTk3LDAuMjkzLTAuMjg2LDAuNDQ3Yy0wLjg5NywxLjQ1NS0xLjQyNSwzLjE2My0xLjQyNSw0Ljk5NWMwLDUuMjY3LDQuMjg0LDkuNTUxLDkuNTUxLDkuNTUxYzUuMjY4LDAsOS41NTMtNC4yODQsOS41NTMtOS41NTFDNDkuMjI5LDY0Ljg3Niw0NC45NDMsNjAuNTkxLDM5LjY3Niw2MC41OTF6IE0zOS42NzYsNzYuNjk1Yy0yLjcyMSwwLTUuMDU4LTEuNjY4LTYuMDQ3LTQuMDM1YzAuNjgxLTAuMDE4LDEuNTExLTAuMjAyLDIuNDQtMC4zOTRjMC4zNTYtMC4wMywwLjY5OS0wLjA5NywxLjAyOS0wLjIwMWMwLjgwOS0wLjE0NSwxLjY3NS0wLjI1OSwyLjU3Ny0wLjI1OWMyLjQxMywwLDQuNTczLDAuODE0LDYuMDQ5LDAuODU0QzQ0LjczNiw3NS4wMjcsNDIuMzk4LDc2LjY5NSwzOS42NzYsNzYuNjk1eiIvPjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGN4PSIzNS42NzIiIGN5PSI2Ny41MjciIHI9IjEuNzc5Ii8+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzZENUM0RDsiIGQ9Ik05Ni4xNTUsNzAuMTQ0YzAsNC40NDktMy42MDQsOC4wNTEtOC4wNTEsOC4wNTFjLTQuNDQ3LDAtOC4wNTItMy42MDItOC4wNTItOC4wNTFjMC00LjQ0NywzLjYwNC04LjA1Myw4LjA1Mi04LjA1M0M5Mi41NTEsNjIuMDkxLDk2LjE1NSw2NS42OTcsOTYuMTU1LDcwLjE0NHoiLz48L2c+PGc+PGNpcmNsZSBzdHlsZT0iZmlsbDojRkZGRkZGOyIgY3g9Ijg0LjEiIGN5PSI2Ny41MjciIHI9IjMuMjgiLz48L2c+PHBhdGggc3R5bGU9ImZpbGw6IzMzMzYzQTsiIGQ9Ik04OC4xMDUsNjAuNTkxYy0zLjI0MywwLTYuMTEsMS42MjktNy44MzcsNC4xMDhjLTAuMTA3LDAuMTQ1LTAuMjAxLDAuMjk4LTAuMjkyLDAuNDU1Yy0wLjg5NiwxLjQ1NC0xLjQyMywzLjE2LTEuNDIzLDQuOTljMCw1LjI2Nyw0LjI4NSw5LjU1MSw5LjU1Miw5LjU1MXM5LjU1MS00LjI4NCw5LjU1MS05LjU1MUM5Ny42NTUsNjQuODc2LDkzLjM3MSw2MC41OTEsODguMTA1LDYwLjU5MXogTTg4LjEwNSw3Ni42OTVjLTIuNzIxLDAtNS4wNTktMS42NjgtNi4wNDgtNC4wMzVjMC42ODktMC4wMTksMS41MjctMC4yMDEsMi40NzEtMC4zOTdjMC4zMzUtMC4wMywwLjY1OC0wLjA5MywwLjk3LTAuMTg5YzAuODE5LTAuMTQ4LDEuNjkzLTAuMjY4LDIuNjA3LTAuMjY4YzIuNDEzLDAsNC41NzEsMC44MTQsNi4wNDcsMC44NTRDOTMuMTYzLDc1LjAyNyw5MC44MjYsNzYuNjk1LDg4LjEwNSw3Ni42OTV6Ii8+PGNpcmNsZSBzdHlsZT0iZmlsbDojRkZGRkZGOyIgY3g9Ijg0LjEwMSIgY3k9IjY3LjUyNyIgcj0iMS43NzkiLz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PC9zdmc+";
	var img_female = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAxMjkuNDA0IDEyOS40MDQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEyOS40MDQgMTI5LjQwNDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxnPjxnPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNFQTgxQkQ7IiBkPSJNMjkuODY5LDc5Ljc4NmMwLDMuMTg4LTYuMzUyLDUuNzcxLTE0LjE4NCw1Ljc3MWMtNy44MzQsMC0xNC4xODYtMi41ODQtMTQuMTg2LTUuNzcxczEyLjQ2Ny0xMi42LDIwLjMwMS0xMi42QzI5LjYzNSw2Ny4xODcsMjkuODY5LDc2LjU5OSwyOS44NjksNzkuNzg2eiIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojRDM2M0E5OyIgZD0iTTI5Ljg2OSw3OS43ODZjMCwzLjE4OC02LjM1Miw1Ljc3MS0xNC4xODQsNS43NzFjLTcuODM0LDAtMTQuMTg2LTIuNTg0LTE0LjE4Ni01Ljc3MXMxMy4xMjktMS44NTUsMjAuOTYzLTEuODU1QzMwLjI5Nyw3Ny45MzEsMjkuODY5LDc2LjU5OSwyOS44NjksNzkuNzg2eiIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojMzMzNjNBOyIgZD0iTTE1LjY4Niw4Ny4wNThDOC4wODIsODcuMDU4LDAsODQuNTA5LDAsNzkuNzg2YzAtNC40ODgsMTMuNjg3LTE0LjEsMjEuODAxLTE0LjFjMy41NzMsMCw5LjU2OCwxLjgzMiw5LjU2OCwxNC4xQzMxLjM2OSw4NC41MDksMjMuMjg5LDg3LjA1OCwxNS42ODYsODcuMDU4eiBNMjEuODAxLDY4LjY4N2MtNy4yOTksMC0xOC41NTUsOC44NTUtMTguODAxLDExLjExNmMwLDEuNzI1LDQuOTQyLDQuMjU1LDEyLjY4Niw0LjI1NWM3Ljc0MywwLDEyLjY4NC0yLjUzLDEyLjY4NC00LjI3MUMyOC4zNjksNzIuNDIxLDI2LjE1OSw2OC42ODcsMjEuODAxLDY4LjY4N3oiLz48L2c+PC9nPjxnPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNFQTgxQkQ7IiBkPSJNOTkuNTM3LDc5Ljc4NmMwLDMuMTg4LDYuMzUsNS43NzEsMTQuMTg0LDUuNzcxczE0LjE4NC0yLjU4NCwxNC4xODQtNS43NzFzLTEyLjQ2Ny0xMi42LTIwLjMwMS0xMi42Qzk5Ljc3MSw2Ny4xODcsOTkuNTM3LDc2LjU5OSw5OS41MzcsNzkuNzg2eiIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojRDM2M0E5OyIgZD0iTTk5LjUzNyw3OS43ODZjMCwzLjE4OCw2LjM1LDUuNzcxLDE0LjE4NCw1Ljc3MXMxNC4xODQtMi41ODQsMTQuMTg0LTUuNzcxcy0xMy4xMjktMS44NTUtMjAuOTYzLTEuODU1Uzk5LjUzNyw3Ni41OTksOTkuNTM3LDc5Ljc4NnoiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzMzMzYzQTsiIGQ9Ik0xMTMuNzIxLDg3LjA1OGMtNy42MDMsMC0xNS42ODQtMi41NDktMTUuNjg0LTcuMjcxYzAtMTIuMjY4LDUuOTk0LTE0LjEsOS41NjYtMTQuMWM4LjExNCwwLDIxLjgwMSw5LjYxMSwyMS44MDEsMTQuMUMxMjkuNDA0LDg0LjUwOSwxMjEuMzI0LDg3LjA1OCwxMTMuNzIxLDg3LjA1OHogTTEwNy42MDQsNjguNjg3Yy00LjM1NywwLTYuNTY2LDMuNzM0LTYuNTY2LDExLjFjMCwxLjc0MSw0Ljk0MSw0LjI3MSwxMi42ODQsNC4yNzFzMTIuNjg0LTIuNTMsMTIuNjg0LTQuMjcxQzEyNi4xNTgsNzcuNTQyLDExNC45MDMsNjguNjg3LDEwNy42MDQsNjguNjg3eiIvPjwvZz48L2c+PC9nPjxnPjxnPjxnPjxlbGxpcHNlIHN0eWxlPSJmaWxsOiNFQTgxQkQ7IiBjeD0iNDIuMTMiIGN5PSIxMDUuODEyIiByeD0iMjEuNjU1IiByeT0iNi41NDEiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0QzNjNBOTsiIGQ9Ik02My43ODUsMTA1LjgxMmMwLDMuNjExLTkuNjk1LDAtMjEuNjU0LDBjLTExLjk2LDAtMjEuNjU1LDMuNjExLTIxLjY1NSwwYzAtMy42MTMsOS42OTUtNi41NDEsMjEuNjU1LTYuNTQxQzU0LjA5LDk5LjI3MSw2My43ODUsMTAyLjE5OSw2My43ODUsMTA1LjgxMnoiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzMzMzYzQTsiIGQ9Ik00Mi4xMzEsMTEzLjg1M2MtMTEuNTA3LDAtMjMuMTU1LTIuNzYyLTIzLjE1NS04LjA0MXMxMS42NDgtOC4wNDEsMjMuMTU1LTguMDQxYzExLjUwNiwwLDIzLjE1NCwyLjc2MiwyMy4xNTQsOC4wNDFTNTMuNjM3LDExMy44NTMsNDIuMTMxLDExMy44NTN6IE00Mi4xMzEsMTAwLjc3MWMtMTMuMDQxLDAtMjAuMTU1LDMuMzMtMjAuMTU1LDUuMDQxczcuMTE0LDUuMDQxLDIwLjE1NSw1LjA0MWMxMy4wNDEsMCwyMC4xNTQtMy4zMywyMC4xNTQtNS4wNDFTNTUuMTcxLDEwMC43NzEsNDIuMTMxLDEwMC43NzF6Ii8+PC9nPjwvZz48Zz48Zz48ZWxsaXBzZSBzdHlsZT0iZmlsbDojRUE4MUJEOyIgY3g9Ijg3LjI3NSIgY3k9IjEwNS44MTIiIHJ4PSIyMS42NTUiIHJ5PSI2LjU0MSIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojRDM2M0E5OyIgZD0iTTY1LjYyLDEwNS44MTJjMCwzLjYxMSw5LjY5NSwwLDIxLjY1NSwwYzExLjk1OSwwLDIxLjY1NCwzLjYxMSwyMS42NTQsMGMwLTMuNjEzLTkuNjk1LTYuNTQxLTIxLjY1NC02LjU0MUM3NS4zMTUsOTkuMjcxLDY1LjYyLDEwMi4xOTksNjUuNjIsMTA1LjgxMnoiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzMzMzYzQTsiIGQ9Ik04Ny4yNzUsMTEzLjg1M2MtMTEuNTA3LDAtMjMuMTU1LTIuNzYyLTIzLjE1NS04LjA0MXMxMS42NDgtOC4wNDEsMjMuMTU1LTguMDQxYzExLjUwNiwwLDIzLjE1NCwyLjc2MiwyMy4xNTQsOC4wNDFTOTguNzgyLDExMy44NTMsODcuMjc1LDExMy44NTN6IE04Ny4yNzUsMTAwLjc3MWMtMTMuMDQxLDAtMjAuMTU1LDMuMzMtMjAuMTU1LDUuMDQxczcuMTE0LDUuMDQxLDIwLjE1NSw1LjA0MWMxMy4wNDEsMCwyMC4xNTQtMy4zMywyMC4xNTQtNS4wNDFTMTAwLjMxNiwxMDAuNzcxLDg3LjI3NSwxMDAuNzcxeiIvPjwvZz48L2c+PC9nPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiM5RTMyNTY7IiBkPSJNMjAuMTg4LDE3LjA1NGMtNS42NTYsNy43NzEtNi44NDIsMTguMzY3LTIuMTMxLDI3LjQ5YzQuNzA5LDkuMTI3LDE0LjAzMSwxNC4yOTcsMjMuNjQ0LDE0LjE4OGM1LjY1Ni03Ljc3MSw2Ljg0Mi0xOC4zNjUsMi4xMzEtMjcuNDlDMzkuMTIyLDIyLjExNywyOS44MDIsMTYuOTQ3LDIwLjE4OCwxNy4wNTR6Ii8+PC9nPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNGRkNBRTg7IiBkPSJNMjAuMTg4LDE3LjA1NGMtNS42NTYsNy43NzEsNC42ODEsMTYuNzQ0LDkuMzkyLDI1Ljg2N2M0LjcwOSw5LjEyNywyLjUwOSwxNS45MiwxMi4xMjIsMTUuODExYzUuNjU2LTcuNzcxLDYuODQyLTE4LjM2NSwyLjEzMS0yNy40OUMzOS4xMjIsMjIuMTE3LDI5LjgwMiwxNi45NDcsMjAuMTg4LDE3LjA1NHoiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0VGQTNDQzsiIGQ9Ik0yMC4xODgsMTcuMDU0Yy01LjY1Niw3Ljc3MSw0LjY4MSwxNi43NDQsOS4zOTIsMjUuODY3YzQuNzA5LDkuMTI3LDIuNTA5LDE1LjkyLDEyLjEyMiwxNS44MTFjNS42NTYtNy43NzEsMy4yMDEtMTEuNzEzLTEuNTEtMjAuODM4QzM1LjQ4MiwyOC43NjcsMjkuODAyLDE2Ljk0NywyMC4xODgsMTcuMDU0eiIvPjwvZz48cGF0aCBzdHlsZT0iZmlsbDojMzMzNjNBOyIgZD0iTTQ1LjE2NSwzMC41NTNjLTQuODM3LTkuMzctMTQuNDA0LTE1LjE0MS0yNC45OTQtMTQuOTk5Yy0wLjQ3NCwwLjAwNi0wLjkxNywwLjIzNC0xLjE5NiwwLjYxN2MtNi4yMjcsOC41NTYtNy4wODksMTkuNjkxLTIuMjUxLDI5LjA2MWM0Ljc4Niw5LjI3NiwxNC4yMTYsMTUuMDAyLDI0LjY2OCwxNS4wMDJjMC4xMDgsMCwwLjIxOC0wLjAwMSwwLjMyNi0wLjAwMmMwLjQ3NC0wLjAwNiwwLjkxNy0wLjIzNCwxLjE5Ni0wLjYxN0M0OS4xNCw1MS4wNiw1MC4wMDMsMzkuOTI0LDQ1LjE2NSwzMC41NTN6IE00NS4wMzMsMzkuODgxYzAuMDA4LDAuMDU4LDAuMDExLDAuMTE2LDAuMDE4LDAuMTc0YzAuMTM2LDEuMDMyLDAuMjEyLDIuMDY4LDAuMjE2LDMuMTA0YzAuMDAxLDAuMjg3LTAuMDE2LDAuNTc0LTAuMDI1LDAuODYxYy0wLjAwOCwwLjI1OS0wLjAwNiwwLjUxOS0wLjAyMywwLjc3N2MtMC4wMjEsMC4zMzUtMC4wNjIsMC42NjgtMC4wOTYsMS4wMDFjLTAuMDIyLDAuMjEtMC4wMzQsMC40MjItMC4wNjEsMC42MzFjLTAuMTI5LDAuOTg5LTAuMzI2LDEuOTY5LTAuNTc1LDIuOTM5Yy0wLjAyNCwwLjA5NC0wLjA0MSwwLjE5LTAuMDY2LDAuMjg0Yy0wLjEzOSwwLjUxNC0wLjI5NiwxLjAyNS0wLjQ2OSwxLjUzMWMtMC4wMDUsMC4wMTYtMC4wMDksMC4wMzItMC4wMTUsMC4wNDhjLTAuMTc3LDAuNTE3LTAuMzczLDEuMDI5LTAuNTg1LDEuNTM2Yy0wLjAwMiwwLjAwNS0wLjAwNCwwLjAxMS0wLjAwNiwwLjAxNmMtMC42NDUsMS41MzctMS40NTIsMy4wMjQtMi40MTgsNC40MzljLTQuODQ1LTAuMTUtNS41NDItMi40MTYtNi45ODYtNy4xMTZjLTAuNzEyLTIuMzE5LTEuNTItNC45NDgtMy4wMy03Ljg3NmMtMS4zMzUtMi41ODYtMy4wOTUtNS4xNDEtNC43OTYtNy42MTFjLTQuMjA5LTYuMTEyLTcuODY4LTExLjQyNi01LjEyNi0xNi4wNjNjMC40NjQsMC4wMDksMC45MjUsMC4wMzgsMS4zODQsMC4wNzJjMC4wOTgsMC4wMDcsMC4xOTcsMC4wMDcsMC4yOTQsMC4wMTZjMC40OCwwLjA0MSwwLjk1NSwwLjEwMywxLjQyOCwwLjE3MWMwLjA4MiwwLjAxMiwwLjE2NSwwLjAxNywwLjI0NiwwLjAzYzAuNDg0LDAuMDc1LDAuOTYyLDAuMTY5LDEuNDM3LDAuMjcyYzAuMDY4LDAuMDE1LDAuMTM4LDAuMDI0LDAuMjA2LDAuMDM5YzAuNTA1LDAuMTEzLDEuMDAzLDAuMjQ1LDEuNDk3LDAuMzg4YzAuMDM3LDAuMDExLDAuMDc0LDAuMDE4LDAuMTExLDAuMDI5YzAuNDc5LDAuMTQyLDAuOTUxLDAuMzAyLDEuNDE4LDAuNDcxYzAuMDUsMC4wMTgsMC4xMDIsMC4wMzIsMC4xNTEsMC4wNWMwLjQ2LDAuMTcsMC45MTMsMC4zNTksMS4zNjEsMC41NTZjMC4wNTQsMC4wMjQsMC4xMSwwLjA0MywwLjE2NCwwLjA2N2MwLjQzNCwwLjE5NCwwLjg1OCwwLjQwNiwxLjI3OSwwLjYyNWMwLjA2NSwwLjAzNCwwLjEzMiwwLjA2MiwwLjE5NywwLjA5NmMwLjQxLDAuMjE4LDAuODExLDAuNDUzLDEuMjA4LDAuNjk0YzAuMDcsMC4wNDMsMC4xNDQsMC4wOCwwLjIxNSwwLjEyM2MwLjM1OSwwLjIyMywwLjcwNywwLjQ2MiwxLjA1NCwwLjcwM2MwLjEwMywwLjA3MSwwLjIxLDAuMTM1LDAuMzExLDAuMjA4YzAuMzQ2LDAuMjQ4LDAuNjgsMC41MTMsMS4wMTMsMC43NzljMC4wOTUsMC4wNzYsMC4xOTUsMC4xNDUsMC4yODksMC4yMjJjMC4zMDksMC4yNTUsMC42MDYsMC41MjYsMC45MDMsMC43OTdjMC4xMDksMC4wOTksMC4yMjQsMC4xOTEsMC4zMzIsMC4yOTNjMC4yNzIsMC4yNTcsMC41MywwLjUyOSwwLjc5MSwwLjc5OWMwLjEyMywwLjEyNywwLjI1MiwwLjI0NiwwLjM3MiwwLjM3NmMwLjIxMSwwLjIyOCwwLjQwOSwwLjQ3LDAuNjExLDAuNzA2YzAuMTU4LDAuMTg0LDAuMzIzLDAuMzYyLDAuNDc3LDAuNTUxYzAuMTk2LDAuMjQyLDAuMzc3LDAuNDk4LDAuNTY0LDAuNzQ5YzAuMTQ3LDAuMTk2LDAuMzAxLDAuMzg1LDAuNDQyLDAuNTg2YzAuMjg5LDAuNDExLDAuNTYyLDAuODM2LDAuODI3LDEuMjY4YzAuMDMsMC4wNDksMC4wNjQsMC4wOTUsMC4wOTQsMC4xNDVjMC4yOTMsMC40ODQsMC41NzEsMC45OCwwLjgzMywxLjQ4OEM0My44MTEsMzQuNDcxLDQ0LjY1MywzNy4xNTgsNDUuMDMzLDM5Ljg4MXogTTE5LjM5LDQzLjg1NmMtMi45NzUtNS43NjEtMy41Mi0xMi4yNjctMS43NTktMTguMjU2YzEuMTA1LDMuNTcyLDMuNTc1LDcuMTc5LDYuMDE1LDEwLjcyM2MxLjY0OCwyLjM5NSwzLjM1Myw0Ljg3LDQuNjAxLDcuMjg2YzEuMzg3LDIuNjg5LDIuMTUzLDUuMTgyLDIuODI5LDcuMzgyYzAuNTI2LDEuNzEyLDEuMDMzLDMuMzM4LDEuNzc3LDQuNzQyQzI3LjEyNCw1My42NDgsMjIuMjk1LDQ5LjQ4OCwxOS4zOSw0My44NTZ6Ii8+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzlFMzI1NjsiIGQ9Ik0xMDkuMjE3LDE3LjA1NGM1LjY1Niw3Ljc3MSw2Ljg0MiwxOC4zNjcsMi4xMzEsMjcuNDljLTQuNzA5LDkuMTI3LTE0LjAzLDE0LjI5Ny0yMy42NDQsMTQuMTg4Yy01LjY1Ny03Ljc3MS02Ljg0Mi0xOC4zNjUtMi4xMzEtMjcuNDlDOTAuMjgzLDIyLjExNyw5OS42MDQsMTYuOTQ3LDEwOS4yMTcsMTcuMDU0eiIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojRkZDQUU4OyIgZD0iTTEwOS4yMTcsMTcuMDU0YzUuNjU2LDcuNzcxLTQuNjgsMTYuNzQ0LTkuMzkxLDI1Ljg2N2MtNC43MDksOS4xMjctMi41MDksMTUuOTItMTIuMTIyLDE1LjgxMWMtNS42NTctNy43NzEtNi44NDItMTguMzY1LTIuMTMxLTI3LjQ5QzkwLjI4MywyMi4xMTcsOTkuNjA0LDE2Ljk0NywxMDkuMjE3LDE3LjA1NHoiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0VGQTNDQzsiIGQ9Ik0xMDkuMjE3LDE3LjA1NGM1LjY1Niw3Ljc3MS00LjY4LDE2Ljc0NC05LjM5MSwyNS44NjdjLTQuNzA5LDkuMTI3LTIuNTA5LDE1LjkyLTEyLjEyMiwxNS44MTFjLTUuNjU3LTcuNzcxLTMuMjAyLTExLjcxMywxLjUwOS0yMC44MzhDOTMuOTIyLDI4Ljc2Nyw5OS42MDQsMTYuOTQ3LDEwOS4yMTcsMTcuMDU0eiIvPjwvZz48cGF0aCBzdHlsZT0iZmlsbDojMzMzNjNBOyIgZD0iTTExMC40MywxNi4xNzFjLTAuMjc5LTAuMzgzLTAuNzIyLTAuNjExLTEuMTk2LTAuNjE3Yy0xMC41NDItMC4xMzUtMjAuMTU2LDUuNjMtMjQuOTkzLDE0Ljk5OWMtNC44MzgsOS4zNzItMy45NzYsMjAuNTA4LDIuMjUxLDI5LjA2MmMwLjI3OSwwLjM4MywwLjcyMiwwLjYxMSwxLjE5NiwwLjYxN2MwLjEwOSwwLjAwMSwwLjIxNywwLjAwMiwwLjMyNiwwLjAwMmMxMC40NTEsMCwxOS44ODItNS43MjYsMjQuNjY3LTE1LjAwMUMxMTcuNTE5LDM1Ljg2MywxMTYuNjU2LDI0LjcyNywxMTAuNDMsMTYuMTcxeiBNODcuNzM5LDMwLjQ0MkM4Ny43NCwzMC40NDEsODcuNzQsMzAuNDQxLDg3LjczOSwzMC40NDJjMC4yOTMtMC40ODQsMC42MDEtMC45NTUsMC45MjItMS40MTRjMC4wMDYtMC4wMDgsMC4wMTMtMC4wMTYsMC4wMTktMC4wMjVjMC42MzktMC45MDgsMS4zMzMtMS43NjYsMi4wNzctMi41NjljMC4wMDYtMC4wMDcsMC4wMTMtMC4wMTMsMC4wMTktMC4wMTljMC4zNy0wLjM5OCwwLjc1MS0wLjc4NCwxLjE0NS0xLjE1NmMwLjAwNS0wLjAwNSwwLjAxMS0wLjAwOSwwLjAxNi0wLjAxNGMwLjM5NS0wLjM3MiwwLjgwMS0wLjczMSwxLjIxOS0xLjA3NWMwLjAxLTAuMDA4LDAuMDIxLTAuMDE2LDAuMDMyLTAuMDI0YzAuNDEzLTAuMzM5LDAuODM2LTAuNjY1LDEuMjY5LTAuOTc2YzAuMDQ2LTAuMDMzLDAuMDk1LTAuMDYyLDAuMTQyLTAuMDk1YzAuNC0wLjI4MywwLjgwNi0wLjU1OCwxLjIyMi0wLjgxNmMwLjA3NC0wLjA0NiwwLjE1Mi0wLjA4NSwwLjIyNi0wLjEzYzAuMzkzLTAuMjM4LDAuNzg5LTAuNDcxLDEuMTk1LTAuNjg3YzAuMDk0LTAuMDUsMC4xOTMtMC4wOTIsMC4yODgtMC4xNDFjMC4zOTEtMC4yMDEsMC43ODQtMC40LDEuMTg3LTAuNThjMC4xMi0wLjA1NCwwLjI0NS0wLjA5OCwwLjM2NS0wLjE1YzAuMzgzLTAuMTY0LDAuNzY2LTAuMzI4LDEuMTU4LTAuNDczYzAuMTQyLTAuMDUzLDAuMjg5LTAuMDk0LDAuNDMyLTAuMTQ0YzAuMzc2LTAuMTMxLDAuNzUyLTAuMjY0LDEuMTM2LTAuMzc3YzAuMTQ3LTAuMDQzLDAuMjk4LTAuMDc1LDAuNDQ2LTAuMTE2YzAuMzg1LTAuMTA2LDAuNzctMC4yMTQsMS4xNjItMC4zMDFjMC4xNTItMC4wMzQsMC4zMDctMC4wNTYsMC40NTktMC4wODdjMC4zOTMtMC4wOCwwLjc4NS0wLjE2MiwxLjE4NC0wLjIyNGMwLjE1LTAuMDIzLDAuMzAzLTAuMDM0LDAuNDU0LTAuMDU1YzAuNDA2LTAuMDU1LDAuODExLTAuMTExLDEuMjIyLTAuMTQ3YzAuMTI3LTAuMDExLDAuMjU2LTAuMDExLDAuMzg0LTAuMDJjMC40My0wLjAzMSwwLjg2MS0wLjA1OSwxLjI5Ni0wLjA2OGMyLjc0Miw0LjYzNy0wLjkxNyw5Ljk1MS01LjEyNSwxNi4wNjRjLTEuNzAxLDIuNDcxLTMuNDYsNS4wMjUtNC43OTUsNy42MTFjLTEuNTEsMi45MjctMi4zMTgsNS41NTYtMy4wMyw3Ljg3NWMtMS40NDQsNC43LTIuMTQsNi45NjctNi45ODYsNy4xMTZjLTAuOTY2LTEuNDE0LTEuNzczLTIuOTAxLTIuNDE4LTQuNDM4Yy0wLjAxNi0wLjAzOS0wLjAyOS0wLjA3OS0wLjA0NS0wLjExOGMtMi43NDUtNi42MzEtMi40OTgtMTQuMTcxLDAuODkyLTIwLjczOUM4Ny4xNjksMzEuNDIyLDg3LjQ0NywzMC45MjUsODcuNzM5LDMwLjQ0MnogTTExMC4wMTUsNDMuODU3Yy0yLjkwNiw1LjYzMi03LjczNCw5Ljc5Mi0xMy40NjEsMTEuODc2YzAuNzQ0LTEuNDAzLDEuMjUxLTMuMDMsMS43NzctNC43NDJjMC42NzUtMi4yLDEuNDQxLTQuNjkyLDIuODI5LTcuMzgxYzEuMjQ4LTIuNDE3LDIuOTUyLTQuODkzLDQuNi03LjI4NmMyLjQ0LTMuNTQ0LDQuOTEtNy4xNTEsNi4wMTUtMTAuNzI0QzExMy41MzUsMzEuNTg5LDExMi45ODksMzguMDk2LDExMC4wMTUsNDMuODU3eiIvPjxnPjxnPjxwYXRoIHN0eWxlPSJmaWxsOiNGRkNBRTg7IiBkPSJNMTEzLjkxMiw3MC4xMTdjMCwyMC42NzYtMjIuMDMyLDM3LjQ0MS00OS4yMDksMzcuNDQxYy0yNy4xNzgsMC00OS4yMDktMTYuNzY2LTQ5LjIwOS0zNy40NDFjMC0yMC42OCwyMi4wMzEtNDUuNDU5LDQ5LjIwOS00NS40NTlDOTEuODgsMjQuNjU4LDExMy45MTIsNDkuNDM3LDExMy45MTIsNzAuMTE3eiIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojRUZBM0NDOyIgZD0iTTExMy45MTIsNzAuMTE3YzAsMjAuNjc2LTIyLjAzMiwzNy40NDEtNDkuMjA5LDM3LjQ0MWMtMjcuMTc4LDAtNDkuMjA5LTE2Ljc2Ni00OS4yMDktMzcuNDQxYzAtMjAuNjgsMjIuMDMxLTM0LjkyOCw0OS4yMDktMzQuOTI4QzkxLjg4LDM1LjE4OSwxMTMuOTEyLDQ5LjQzNywxMTMuOTEyLDcwLjExN3oiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0VBODFCRDsiIGQ9Ik0xMTMuOTEyLDcwLjExN2MwLDIwLjY3Ni0yMi4wMzIsMzcuNDQxLTQ5LjIwOSwzNy40NDFjLTI3LjE3OCwwLTQ5LjIwOS0xNi43NjYtNDkuMjA5LTM3LjQ0MWMwLTIwLjY4Miw2LjI2MSwxOC4zNCw0OS4yMDksMTguMzRDMTA3LjY1LDg4LjQ1NiwxMTMuOTEyLDQ5LjQzNSwxMTMuOTEyLDcwLjExN3oiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzMzMzYzQTsiIGQ9Ik02NC43MDMsMTA5LjA1OGMtMjcuOTYxLDAtNTAuNzA5LTE3LjQ2OS01MC43MDktMzguOTQxYzAtMjEuMjcsMjIuNjItNDYuOTU5LDUwLjcwOS00Ni45NTlzNTAuNzA5LDI1LjY4OSw1MC43MDksNDYuOTU5QzExNS40MTIsOTEuNTg5LDkyLjY2NCwxMDkuMDU4LDY0LjcwMywxMDkuMDU4eiBNNjQuNzAzLDI2LjE1OGMtMjYuNDI4LDAtNDcuNzA5LDI0LjA0OC00Ny43MDksNDMuOTU5YzAsMTkuODE4LDIxLjQwMiwzNS45NDEsNDcuNzA5LDM1Ljk0MXM0Ny43MDktMTYuMTIzLDQ3LjcwOS0zNS45NDFDMTEyLjQxMiw1MC4yMDUsOTEuMTMxLDI2LjE1OCw2NC43MDMsMjYuMTU4eiIvPjwvZz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzE0QTU5NDsiIGQ9Ik00OC41NDEsNjcuOTU4YzAsNC40NDktMy42MDUsOC4wNTEtOC4wNTMsOC4wNTFjLTQuNDQ2LDAtOC4wNTEtMy42MDItOC4wNTEtOC4wNTFjMC00LjQ0NywzLjYwNC04LjA1MSw4LjA1MS04LjA1MUM0NC45MzYsNTkuOTA4LDQ4LjU0MSw2My41MTEsNDguNTQxLDY3Ljk1OHoiLz48L2c+PGc+PGNpcmNsZSBzdHlsZT0iZmlsbDojRkZGRkZGOyIgY3g9IjM2LjQ4NSIgY3k9IjY1LjM0MSIgcj0iMy4yODEiLz48L2c+PHBhdGggc3R5bGU9ImZpbGw6IzMzMzYzQTsiIGQ9Ik00MC40ODgsNTguNDA4Yy0zLjIzOSwwLTYuMTAyLDEuNjI0LTcuODMsNC4wOTdjLTAuMTExLDAuMTUtMC4yMDksMC4zMDctMC4zMDIsMC40N2MtMC44OTQsMS40NTMtMS40MTksMy4xNTYtMS40MTksNC45ODNjMCw1LjI2Nyw0LjI4NSw5LjU1MSw5LjU1MSw5LjU1MWM1LjI2OCwwLDkuNTUzLTQuMjg0LDkuNTUzLTkuNTUxUzQ1Ljc1Niw1OC40MDgsNDAuNDg4LDU4LjQwOHogTTQwLjQ4OCw3NC41MDljLTIuNzIxLDAtNS4wNTgtMS42NjgtNi4wNDYtNC4wMzRjMC42ODgtMC4wMTgsMS41MjUtMC4yLDIuNDY4LTAuMzk2YzAuMzM2LTAuMDMsMC42Ni0wLjA5MywwLjk3My0wLjE5YzAuODE4LTAuMTQ4LDEuNjkyLTAuMjY3LDIuNjA2LTAuMjY3YzIuNDEzLDAsNC41NzIsMC44MTMsNi4wNDgsMC44NTNDNDUuNTQ4LDcyLjg0MSw0My4yMSw3NC41MDksNDAuNDg4LDc0LjUwOXoiLz48Y2lyY2xlIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBjeD0iMzYuNDg0IiBjeT0iNjUuMzQyIiByPSIxLjc4Ii8+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzE0QTU5NDsiIGQ9Ik05Ni45NjgsNjcuOTU4YzAsNC40NDktMy42MDQsOC4wNTEtOC4wNTEsOC4wNTFjLTQuNDQ3LDAtOC4wNTItMy42MDItOC4wNTItOC4wNTFjMC00LjQ0NywzLjYwNC04LjA1MSw4LjA1Mi04LjA1MUM5My4zNjMsNTkuOTA4LDk2Ljk2OCw2My41MTEsOTYuOTY4LDY3Ljk1OHoiLz48L2c+PGc+PGNpcmNsZSBzdHlsZT0iZmlsbDojRkZGRkZGOyIgY3g9Ijg0LjkxMiIgY3k9IjY1LjM0MSIgcj0iMy4yOCIvPjwvZz48cGF0aCBzdHlsZT0iZmlsbDojMzMzNjNBOyIgZD0iTTg4LjkxNyw1OC40MDhjLTMuMjQsMC02LjEwMywxLjYyNC03LjgzMSw0LjA5N2MtMC4xMTEsMC4xNS0wLjIwOSwwLjMwNy0wLjMwMiwwLjQ3Yy0wLjg5NCwxLjQ1My0xLjQxOSwzLjE1Ni0xLjQxOSw0Ljk4M2MwLDUuMjY3LDQuMjg1LDkuNTUxLDkuNTUyLDkuNTUxYzUuMjY2LDAsOS41NTEtNC4yODQsOS41NTEtOS41NTFTOTQuMTgzLDU4LjQwOCw4OC45MTcsNTguNDA4eiBNODguOTE3LDc0LjUwOWMtMi43MjEsMC01LjA1OS0xLjY2OC02LjA0Ny00LjAzNGMwLjY4OC0wLjAxOCwxLjUyNS0wLjIsMi40NjgtMC4zOTZjMC4zMzYtMC4wMywwLjY1OS0wLjA5MywwLjk3MS0wLjE4OWMwLjgxOS0wLjE0OCwxLjY5NC0wLjI2OCwyLjYwOC0wLjI2OGMyLjQxMiwwLDQuNTcxLDAuODEzLDYuMDQ2LDAuODUzQzkzLjk3NSw3Mi44NDEsOTEuNjM4LDc0LjUwOSw4OC45MTcsNzQuNTA5eiIvPjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGN4PSI4NC45MTIiIGN5PSI2NS4zNDIiIHI9IjEuNzgiLz48Zz48cGF0aCBzdHlsZT0iZmlsbDojRkZDQUU4OyIgZD0iTTcyLjI2Niw2OS44MTZjMCwxLjAxMi0zLjQwNCwxLjE5My03LjYwNiwxLjE5M2MtNC4yLDAtNy42MDUtMC4xODItNy42MDUtMS4xOTNjMC0xLjAxLDMuNDA1LTMuNjU0LDcuNjA1LTMuNjU0QzY4Ljg2MSw2Ni4xNjEsNzIuMjY2LDY4LjgwNiw3Mi4yNjYsNjkuODE2eiIvPjwvZz48Zz48cGF0aCBzdHlsZT0iZmlsbDojOUUzMjU2OyIgZD0iTTU1LjgwNyw3Ny45MzFjMCw0LjkxMiwzLjk4Miw4Ljg5NSw4Ljg5NSw4Ljg5NWM0LjkxNCwwLDguODk3LTMuOTgyLDguODk3LTguODk1SDU1LjgwN3oiLz48L2c+PGc+PHBhdGggc3R5bGU9ImZpbGw6IzMzMzYzQTsiIGQ9Ik02NC43MDIsODguMzI1Yy01LjczMiwwLTEwLjM5Ni00LjY2My0xMC4zOTYtMTAuMzk1YzAtMC44MjgsMC42NzEtMS41LDEuNS0xLjVoMTcuNzkyYzAuODI5LDAsMS41LDAuNjcyLDEuNSwxLjVDNzUuMDk5LDgzLjY2Miw3MC40MzUsODguMzI1LDY0LjcwMiw4OC4zMjV6IE01Ny40NTksNzkuNDMxYzAuNjk1LDMuMzYsMy42NzksNS44OTUsNy4yNDMsNS44OTVjMy41NjQsMCw2LjU0OC0yLjUzNCw3LjI0NC01Ljg5NUg1Ny40NTl6Ii8+PC9nPjxnPjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGQ0FFODsiIGN4PSI2NC43MDIiIGN5PSIzNi4yNjUiIHI9IjE5LjIxIi8+PC9nPjxnPjxjaXJjbGUgc3R5bGU9ImZpbGw6I0VGQTNDQzsiIGN4PSI2NC43MDIiIGN5PSI0My44NjgiIHI9IjE5LjIxIi8+PC9nPjxwYXRoIHN0eWxlPSJmaWxsOiMzMzM2M0E7IiBkPSJNNjQuNzAzLDE1LjU1NGMtNS4zMzksMC0xMC4xOTcsMi4wNDgtMTMuODc0LDUuMzc4Yy0wLjEwMSwwLjA1Ni0wLjIwNywwLjA5Ny0wLjI5NiwwLjE3OGMtOC4zMzksNy42NDEtOC45MDgsMjAuNjQ0LTEuMjY5LDI4Ljk4NmMzLjAxNywzLjI5MSw3LjEzNSw1LjIxMSwxMS41OTUsNS40MDdjMC4yNTEsMC4wMTEsMC41MDEsMC4wMTcsMC43NSwwLjAxN2M0LjE4OCwwLDguMTY3LTEuNTQ1LDExLjI3My00LjM5MmMyLjY5Mi0yLjQ2Niw0LjI2My01LjgzMyw0LjQyMi05LjQ4MWMwLjE2LTMuNjQ5LTEuMTEyLTcuMTQzLTMuNTgtOS44MzZjLTQuMTg2LTQuNTY4LTExLjMwOS00Ljg4LTE1Ljg3OC0wLjY5NWMtMy43NzYsMy40NjYtNC4wMzQsOS4zNTUtMC41NzUsMTMuMTMxYzAuNTYsMC42MSwxLjUwOSwwLjY1NCwyLjExOSwwLjA5MmMwLjYxMS0wLjU2LDAuNjUyLTEuNTA4LDAuMDkzLTIuMTE5Yy0yLjM0Mi0yLjU1Ni0yLjE2Ny02LjU0NSwwLjM5LTguODkyYzMuMzUtMy4wNjcsOC41NzItMi44MzcsMTEuNjM5LDAuNTExYzEuOTI3LDIuMTAzLDIuOTE5LDQuODI5LDIuNzk1LDcuNjc4Yy0wLjEyNCwyLjg0OC0xLjM1LDUuNDc2LTMuNDUyLDcuNGMtMi43LDIuNDc1LTYuMjAyLDMuNzQ2LTkuODY1LDMuNTljLTMuNjYxLTAuMTYxLTcuMDQtMS43MzYtOS41MTUtNC40MzdjLTIuOTU0LTMuMjI2LTQuNDU2LTcuMjY3LTQuNTctMTEuMzNjMC4wNTEtMC4xNSwwLjA4NC0wLjMwOSwwLjA4NC0wLjQ3NmMwLTkuNzY2LDcuOTQ1LTE3LjcxMSwxNy43MTEtMTcuNzExYzkuNzY1LDAsMTcuNzA5LDcuOTQ1LDE3LjcwOSwxNy43MTFjMCwwLjgyOCwwLjY3MSwxLjUsMS41LDEuNXMxLjUtMC42NzIsMS41LTEuNUM4NS40MTIsMjQuODQ1LDc2LjEyMiwxNS41NTQsNjQuNzAzLDE1LjU1NHoiLz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PC9zdmc+";

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

// Define Selene not login ErrorMsg
function notloginMsg() {
	Messenger().post({
		message: "趕快加入好玩又有趣的 Selene 吧！",
		type: "success",
		showCloseButton: true,
		hideAfter: 3
	});
}


// feedback item json
function feedback_json (id) {

	$.ajax({
		url: baseUrl + '/other/problem/item/' + id,
		dataType: 'json',
		error: function (xhr) {
			errorMsg();
		},
		success: function (response) {

			var response = $.parseJSON(JSON.stringify(response));
			if (response.status == true) {

				$("#problem_view").append(
					'<div class="ui basic segment">' +
						'<h2 class="ui header centered">' +
							'<i class="bug icon"></i>' +
							response.result.bg_title +
						'</h2>' +
					'</div>' +
					'<div class="ui stackable one column grid">' +
						'<div class="sixteen wide column fluid">' +
							'<div class="ui comments">' +
								'<div class="comment">' +
									'<a class="avatar">' +
										'<img src="//semantic-ui.com/images/avatar/small/joe.jpg">' +
									'</a>' +
									'<div class="content">' +
										'<a class="author">' + response.result.firstname + '</a>' +
										'<div class="metadata">' +
											'<div class="date">' + response.result.bg_time + '</div>' +
											'<div class="rating">' +
												'<i class="star icon"></i>' +
												(response.result.bg_type == 0 ? "問題" : "建議") +
											'</div>' +
										'</div>' +
										'<div class="text">' +
											formatter(response.result.bg_content) +
										'</div>' +
									'</div>' +
								'</div>' +
							'</div>' +

							'<div class="ui comments">' +
								'<div class="comment">' +
									'<a class="avatar">' +
										'<img src="//semantic-ui.com/images/avatar/small/steve.jpg">' +
									'</a>' +
									'<div class="content">' +
										'<a class="author">管理員</a>' +
										'<div class="text">' +
											(response.result.bg_reply_ck == 1 ? formatter(response.result.bg_reply) : "即將為您解答...") +
										'</div>' +
									'</div>' +
								'</div>' +
							'</div>' +
						'</div>' +
					'</div>'
				);
			}
			else{
				window.location.href = baseUrl + '/other/problem';
			}
		}
	});
}

function load_vote_result_list () {

	$.ajax({
		type: 'post',
		url: baseUrl + '/activity/vote/result/list',
		dataType: 'json',
		error: function (xhr) {
			errorMsg();
		},
		success: function (response) {
			var response = $.parseJSON(JSON.stringify(response));

			if (response.status == true) {

				$.each(response.result, function(i) {

					$("#vote-result-list").append(

						'<div class="column">' +
							'<div class="ui card centered card fluid">' +
								'<a class="ui">' +
									'<div class="image-square image radius-4" style="background-image: url(' + response.result[i].g_cover + ')"></div>' +
								'</a>' +
								'<div class="content center aligned">' +
									'<a class="header">' + response.result[i].g_name + '</a>' +
								'</div>' +
								'<div class="extra content center aligned">' +
		                            '<a target="_self" href="http://167.71.210.153/activity/result/' + response.result[i].g_id + '"><button class="ui basic button"><i class="large trophy black icon"></i> 查看名次</button></a>' +
		                        '</div>' +
							'</div>' +
						'</div>'
					);
				});

			}
			else{
				$("#vote-result-list").before(
					'<div class="ui success message">' +
	                    '<p>現在沒有開完票的競賽 QQ</p>' +
	                '</div>'
				);
			}
		}
	});
}

// 載入可投票競賽
function loadvote () {

	$.ajax({
		type: 'post',
		url: baseUrl + '/activity/vote_info',
		dataType: 'json',
		error: function (xhr) {
			errorMsg();
		},
		success: function (response) {
			var response = $.parseJSON(JSON.stringify(response));

			if (response.status == true) {

				$.each(response.result, function(i) {

					$("#vote_column").append(

						'<div class="column">' +
							'<div class="ui card centered card fluid">' +
								'<a class="ui">' +
									'<div class="image-square image radius-4" style="background-image: url(' + response.result[i].g_cover + ')"></div>' +
								'</a>' +
								'<div class="content center aligned">' +
									'<a class="header">' + response.result[i].g_name + '</a>' +
								'</div>' +
								'<div class="extra content center aligned">' +
		                            '<a href="http://167.71.210.153/activity/vote/' + response.result[i].g_id + '"><button class="ui notinverted nav-blue button" id="' + response.result[i].g_id + '"><i class="large fire icon"></i> 進入戰場</button></a>' +
		                        '</div>' +
							'</div>' +
						'</div>'
					);
				});

			}
			else{
				$("#vote_column").before(
					'<div class="ui success message">' +
	                    '<p>現在沒有可投票的活動 QQ</p>' +
	                '</div>'
				);
			}
		}
	});

}


// activity/攻城戰
function loadSiege() {
	$.ajax({
		async: false,
		type: 'post',
		dataType: 'json',
		url: baseUrl + '/activity/query/siege_info',
		error: function (xhr) {

		},
		success: function (response) {

			var response = $.parseJSON(JSON.stringify(response));

			if (response.attacked === null || response.attacked == '0') {
				$("#open-attack").append('<button class="ui button notinverted darkred" id="siege-start-attack">發動攻擊</button>');
			}
			else{
				$("#open-attack").append('<button class="ui button black disabled">今日已攻擊過</button>');
			}
			$("#blood").append(response.result.sc_blood);

			if (response.record === null) {
				$('#siege-attack-record, #self_attack_records').hide();
				$("#siege-attack-record").parent().append(
					'<div class="ui positive message" id="not-attack-record">' +
						'<p>還沒有攻擊紀錄，趕快攻打別的學校吧！</p>' +
					'</div>'
				);
			}
			$.each(response.record, function(i) {

				$('#self_attack_records').append(
					'<div class="ui icon message">' +
	                    '<i class="lightning icon"></i>' +
	                    '<div class="content">' +
	                        '<div class="header">' +
								response.record[i].sc_name +
	                        '</div>' +
	                        '<p>普通攻擊，血量減 1</p>' +
	                    '</div>' +
	                '</div>');
			});

		}
	});
}


// account隱藏姓名
function hidename(is_hide) {

	$.ajax({
		url: baseUrl + '/account/profile/save/hidename',
		data: {
			is_hide: is_hide,
		},
		dataType: 'json',
		type: 'POST',
		error: function(xhr) {
			errorMsg();
		},
		success: function(response) {

			var response = $.parseJSON(JSON.stringify(response));

			if (response.status != true) {
				errorMsg();
			}
			else {

				switch ( response.result ) {
					case 1:
						var is_hide = "隱藏";
						break;

					case 0:
						var is_hide = "顯示";
						break;
				}

				Messenger().post({
					message: "姓名已切換為"+is_hide,
					type: "success",
					showCloseButton: true,
					hideAfter: 3
				});

				$('#profile-hide span').html('('+is_hide+')');

			}
		}
	});
}

function rece_message_edit () {
	$.ajax({
		url: baseUrl + '/account/profile/save/recemessage',
		dataType: 'json',
		type: 'POST',
		error: function (xhr) {
			errorMsg();
		},
		success: function (response) {

			var res = $.parseJSON(JSON.stringify(response));

			console.log(res);
		}
	});
}

// 載入投票完的競賽結果
function load_vote_result_item (id) {

	$.ajax({
		type: 'post',
		url: baseUrl + '/activity/result/item/info/' + id,
		dataType: 'json',
		error: function (xhr) {
			errorMsg();
		},
		success: function (response) {
			var response = $.parseJSON(JSON.stringify(response));

			if (response.status == true) {

				$.each(response.result, function(i) {

					$("#vote-result-item").append(

						'<div class="column">' +
							'<div class="ui card centered card fluid">' +
								'<a class="ui">' +
									'<div class="image-square image radius-4" style="background-image: url(' + response.result[i].gj_url + ')"></div>' +
								'</a>' +
								'<a class="ui left black corner label">' +
									'<i class="diamond icon"></i>' +
								'</a>' +
								'<div class="content center aligned">' +
									'<a class="header">' + response.result[i].gj_msname + '</a>' +
									'<div class="meta">' + response.result[i].gj_nickname + '</div>' +
									'<div class="ui green bottom right attached label">' + response.result[i].all_vote + ' 票</div>' +
								'</div>' +
							'</div>' +
						'</div>'
					);
				});

			}
			else{
				window.location.href = baseUrl + '/activity/result';
			}
		}
	});
}

// 載入可投票競賽內的項目
function loadvote_item (id) {

	$.ajax({
		type: 'post',
		url: baseUrl + '/activity/vote/item/' + id,
		dataType: 'json',
		error: function (xhr) {
			errorMsg();
		},
		success: function (response) {
			var response = $.parseJSON(JSON.stringify(response));

			if (response.status == true) {

				$.each(response.result, function(i) {

					if (response.result[i].is_vote === '1') {
						$("#vote_item_column").append(
							'<div class="column">' +
								'<div class="ui card centered card fluid">' +
									'<a class="ui">' +
										'<div class="image-square image radius-4" style="background-image: url(' + response.result[i].gj_url + ')"></div>' +
									'</a>' +
									'<div class="content center aligned">' +
										'<a class="header">' + response.result[i].gj_msname + '</a>' +
										'<div class="meta">' + response.result[i].gj_nickname + '</div>' +
									'</div>' +
									'<div class="extra content center aligned">' +
										'<button class="ui basic button disabled"><i class="large heart empty red icon"></i>已經投了</button>' +
									'</div>' +
								'</div>' +
							'</div>'
						);
					}
					else{
						$("#vote_item_column").append(
							'<div class="column">' +
								'<div class="ui card centered card fluid">' +
									'<a class="ui">' +
										'<div class="image-square image radius-4" style="background-image: url(' + response.result[i].gj_url + ')"></div>' +
									'</a>' +
									'<div class="content center aligned">' +
										'<a class="header">' + response.result[i].gj_msname + '</a>' +
										'<div class="meta">' + response.result[i].gj_nickname + '</div>' +
									'</div>' +
									'<div class="extra content center aligned">' +
										'<button class="ui basic button votelike" item="' + response.result[i].gj_item + '" id="' + response.result[i].gj_order + '"><i class="large heart empty red icon"></i>我喜歡</button>' +
									'</div>' +
								'</div>' +
							'</div>'
						);
					}
				});
			}
			else{
				Messenger().post({
					message: "現在沒有可投票的競賽 QQ",
					type: "error",
					showCloseButton: true,
					hideAfter: 2
				});
			}
		}
	});
}

// 確定投票
function vote_confirm (item, id) {

	$.ajax({
		type: 'post',
		url: baseUrl + '/activity/vote/confirm',
		dataType: 'json',
		data: {
			id : id,
			item : item,
		},
		error: function (xhr) {
			Messenger().post({
				message: "投票失敗！",
				type: "error",
				showCloseButton: true,
				hideAfter: 3
			});
		},
		success: function (response) {
			var response = $.parseJSON(JSON.stringify(response));

			if (response.status == true) {

				$(".votelike").addClass('disabled');
				$(".votelike").html('<i class="large heart empty red icon"></i> 已經投了');
				Messenger().post({
					message: "謝謝投票！",
					type: "success",
					showCloseButton: true,
					hideAfter: 3
				});
			}
			else{
				Messenger().post({
					message: "投票失敗！",
					type: "error",
					showCloseButton: true,
					hideAfter: 3
				});
			}
		}
	});
}

// 5 column news feedback for json
function feedback () {

	$.ajax({
		url: baseUrl + '/other/myfeedback/item',
		dataType: 'json',
		error: function (xhr) {
			errorMsg();
		},
		success: function (response) {

			var response = $.parseJSON(JSON.stringify(response));
			if (response.status == true) {

				$.each(response.result, function(i) {

					$("#myfeedback").append(
						'<tr>' +
							'<td class="center aligned">' +
								(response.result[i].bg_type == 0 ? "問題" : "建議") +
							'</td>' +
							'<td>' +
								response.result[i].bg_title +
							'</td>' +
							'<td>' +
								(response.result[i].bg_reply_ck == 1 ? '<a class="ui orange label">已讀</a>' : "未讀") +
							'</td>' +
							'<td>' +
								'<a target="_self" href="http://167.71.210.153/other/problem/' + response.result[i].bg_id + '"><button class="ui icon button">' +
									'<i class="comment icon"></i>' +
								'</button></a>' +
							'</td>' +
						'</tr>'
					);
				});
			}
		}
	});
}

// 發文規章 Modal
function showRulesModal() {
	$("#newpost-rules-modal").modal('setting', 'closable', false).modal('show');
}



var join_info_image;

$(document).ready(function() {

	$("div[contentEditable='plaintext-only']").click(function(){
		$(this).focus();
	});

	$('a[href][target!=_blank]').attr({'target':'_self'});

	$('.ui.accordion').accordion();
	$('.ui.dropdown').dropdown();
	$('#article-reply-input-container').hide();

	$('#reply-bar').hide();

	// click activity like
	$(document).on('click', '.votelike', function(){
		vote_confirm($(this).attr('item'), $(this).attr('id'));
	});

	$("#reply, #article_reply_button").click(function(){
		$("#article-reply-input-container").toggle();
		$("#reply-content").focus();
	});

	// focus div instead textarea
	$(".div-textarea, #post-content").click(function(){
		$(".div-textarea").focus();
	});


	$("#report").click(function(){
		$("#article-report").modal('show');
	});

	// newpost upload images
	$("#newpost-imgur").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			url: "http://localhost/selene/other/ajax_upload_imgur",
			type: "POST",
			dataType:'json',
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(response) {

				var response = $.parseJSON(JSON.stringify(response));
				$("#newpost-choose-image").val('');
				$("#editorjs").append(response.result);
			},
			error: function() {
				errorMsg();
			}
	   });
	}));

	// problem upload images
	$("#problem-imgur").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			url: "http://167.71.210.153/other/ajax_upload_imgur",
			type: "POST",
			dataType:'json',
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(response) {

				var response = $.parseJSON(JSON.stringify(response));
				$("#problem-choose-image").val('');
				$("#content").html($("#content").text() + '\r\n' + response.result);
			},
			error: function() {
				errorMsg();
			}
	   });
	}));

	// talk upload images
	$(".talk-imgur").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			url: "http://167.71.210.153/other/ajax_upload_imgur",
			type: "POST",
			dataType:'json',
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(response) {

				var response = $.parseJSON(JSON.stringify(response));
				$(".talk-choose-image").val('');
				$(".talk-content").html($(".talk-content").text() + '\r\n' + response.result);
			},
			error: function() {
				errorMsg();
			}
	   });
	}));

	// 私訊 button 操控 file 瀏覽檔案
	$(".talk-choose-image").change(function(){
		$(".talk-upload").click();
		Messenger().post({
			message: "上傳完成將自動插入文章！",
			type: "info",
			showCloseButton: true,
			hideAfter: 2
		});
	});

	// 私訊 button 操控 file 瀏覽檔案
	$(".talk-choose-image-phone").change(function(){
		$(".talk-upload-phone").click();
		Messenger().post({
			message: "上傳完成將自動插入文章！",
			type: "info",
			showCloseButton: true,
			hideAfter: 2
		});
	});

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

	// 提報bug button 操控 file 瀏覽檔案
	$("#problem-choose-image").change(function(){
		$("#problem-upload").click();
		Messenger().post({
			message: "上傳完成將自動插入！",
			type: "info",
			showCloseButton: true,
			hideAfter: 2
		});
	});

	// 上傳大頭貼
	$("#change-pic-choose-image").change(function(){

		$('#change-pic-modal').modal('hide');

		var uploadData = new FormData();
		uploadData.append( 'userImage', $('#change-pic-choose-image')[0].files[0]);

		Messenger().post({
			message: "大頭貼上傳中",
			type: "info",
			showCloseButton: true,
		});

		$.ajax({
			url: "http://167.71.210.153/account/profile/save/upload",
			type: "POST",
			dataType:'json',
			data:  uploadData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(response) {

				var response = $.parseJSON(JSON.stringify(response));

				if (response.status == true ) {

					Messenger().hideAll();
					Messenger().post({
						message: "上傳成功！",
						type: "success",
						showCloseButton: true,
						hideAfter: 3
					});

					setTimeout(function(){ window.location.reload(); }, 1000);
				}
			},
			error: function() {
				errorMsg();
			}
	   });

	});

	// 重寄啟用信
	$("#login-resend").click(function(){
		$('#login-resend-modal').modal('show');
	});

	// 忘記密碼
	$("#login-forget").click(function(){
		$('#login-forget-modal').modal('show');
	});

	// 無法接受發文規章
	$("#newpost-no").click(function(){
		window.location.href = baseUrl + '/a';
	});

	// 接受發文規章
	$("#newpost-yes").click(function(){
		$("#newpost-rules-modal").modal('hide');
	});

	// 發文點擊 icon 選擇圖片
	$("#newpost-select-pic").click(function(){
		$("#newpost-choose-image").click();
	});

	// 回覆點擊 icon 選擇圖片
	$("#reply-select-pic").click(function(){
		$("#reply-choose-image").click();
	});

	// 私訊點擊 icon 選擇圖片
	$(".talk-select-pic").click(function(){
		$(".talk-choose-image").click();
	});

	// 提報BUG點擊 icon 選擇圖片
	$("#problem-select-pic").click(function(){
		$("#problem-choose-image").click();
	});

	// account feedback
	$("#feedback").click(function(){
		$.ajax({
			url: baseUrl + '/other/feedback',
			data: {
				title   : $("#title").val(),
				content : $("#content").text(),
				type  : $("#type").val()
			},
			dataType: 'json',
			type: 'POST',
			error: function (xhr) {
				errorMsg();
			},
			success: function (response) {

				var response = $.parseJSON(JSON.stringify(response));
				if (response.status == true) {

					$("#myfeedback").empty();
					feedback();

					Messenger().post({
						message: "提報完成！",
						type: "info",
						showCloseButton: true,
						hideAfter: 3
					});

					$("#title").val('');
					$("#content").text('');
				}
				else{
					$.each(response.errors, function(field, i) {

						$(field).parents(".field").addClass('error');
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
	});

	// 送出註冊
	$("#join-confirm").click(function(){

		$.ajax({
			type: 'post',
			url: baseUrl + '/join/confirm',
			dataType: 'json',
			data: {
				school 		: $("#join-school").val(),
				dept 		: $("#join-dept").val(),
				email 		: $("#join-email").val(),
				firstname 	: $("#join-firstname").val(),
				gender 		: $("#join-gender").val(),
				psw 		: $("#join-psw").val(),
				ck_psw 		: $("#join-ck_psw").val(),
			},
			error: function (xhr) {
				Messenger().post({
					message: "註冊失敗！",
					type: "error",
					showCloseButton: true,
					hideAfter: 2
				});
			},
			success: function (response) {
				var response = $.parseJSON(JSON.stringify(response));

				if (response.status == true) {

					Messenger().post({
						message: "註冊成功！",
						type: "success",
						showCloseButton: true,
						hideAfter: 2
					});
					localStorage.setItem("referrer", "join_confirm");

					setTimeout(function(){
						window.location.href = baseUrl + '/join/success/' + $("#join-school").val();
					}, 500);
				}
				else{

					if (response.info == "Email error") {
						Messenger().post({
							message: "校園信箱後綴錯誤！",
							type: "error",
							showCloseButton: true,
							hideAfter: 6
						});
						$('#join-email').parents(".field").addClass('error');
					}
					$.each(response.errors, function(field, i) {

						$('#join-' + field).parents(".field").addClass('error');

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
	});

	// Choose School list Msg
	$("#join-school-value").change(function(){

		var id = $(this).val()-1;
		$("#school-msg").html(
			'<div class="ui blue message transition" id="school-msg-' + School_List[id].id + '">' +
				'<div class="header">關於' + School_List[id].title + '信箱</div>' +
				'<ul class="list">' +
					'<li>格式：' + School_List[id].ex + '</li>' +
					(School_List[id].mark === '' ? '' : '<li>備註：' + School_List[id].mark + '</li>') +
					'<li><a href="' + School_List[id].link + '">進入信箱</a></li>' +
				'</ul>' +
			'</div>'
		);
	});

	// 註冊欄位填寫後清除 error class
	$(".join-choose").change(function(){
		$(this).parents(".field").removeClass('error');
	});

	// 參加活動作品上傳
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			url: "http://167.71.210.153/other/ajax_upload_imgur",
			type: "POST",
			dataType:'json',
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(response) {
				var response = $.parseJSON(JSON.stringify(response));

				$("#join-info-load").remove();
				$("#uploadForm").after('<button class="ui notinverted drawred icon button" id="join-info-remove"><i class="remove circle icon"></i></button>');
				$("#join-info-view").append('<hr /><img class="ui small image" src="' + response.result + '">');
				join_info_image = response.result;
			},
			error: function() {
				errorMsg();
			}
	   });
	}));

	// 發文隱藏上傳扭 [自動上傳]
	$("#newpost-upload, #problem-upload, .talk-upload, .talk-upload-phone, #reply-upload").hide();

	// 開啟參加競賽 modal
	$(".join-now").click(function(){
        $(".ui .modal").modal("show");
    });

	// 參加競賽 button 操控 file 瀏覽檔案
    $(document).on('click', '#join-info-choose', function () {
        $("#join-info-choose-file").click();
    });


	// 參加活動偵測檔案選取
    $(document).on('change', '#join-info-choose-file', function () {
        $("#join-info-choose").hide();
        $("#join-info-upload").show();
    });

	// 參加活動作品上傳 loading 效果
    $(document).on('click', '#join-info-upload', function () {
        $("#join-info-upload").hide();
        $("#join-info-choose-file").hide();
        $("#uploadForm").after('<button class="ui basic loading button" id="join-info-load">loading...</button>');
    });

	// 參加活動移除上傳作品
    $(document).on('click', '#join-info-remove', function () {
        $("#join-info-view").empty();
        $("#join-info-choose-file").show();
        $("#join-info-choose").show();
        $("#join-info-remove").remove();
        $("#join-info-choose-file").val('');
		join_info_image = "";
    });

	// 關閉搜尋攻擊學校 focus
	$("#siege-school-keywords").blur();

	// 參加或動上傳扭
	$("#join-info-upload").hide();

	// 啟動 tab
	$('.item[data-tab]').tab();

	// 選擇圖片
	$(".select-pic-yes").click(function(){
		$(".select-pic-file").click();
	});
	$(".select-pic").click(function(){
		$(".select-pic-modal").modal('show');
	});
	$(".select-pic-no").click(function(){
		$(".select-pic-modal").modal('hide');
	});

	// click OK close modal
	$(".modal-ok").click(function(){
		$('.ui.basic.modal').modal('hide');
	});

	// Profile Start

	// account/個人資料儲存
	$('#profile-save').click(function() {
		$.ajax({
			url: baseUrl + '/account/profile/save',
			data: {
				introduction: $('#profile-edit-introduction textarea').val(),
				specialty: $('#profile-edit-specialty textarea').val(),
				signature: $('#profile-edit-signature textarea').val(),
				receMessage: $("#profile-edit-receMessage").val()
			},
			dataType: 'json',
			type: 'POST',
			error: function(xhr) {
				errorMsg();
				$('#profile-save').addClass('disabled');
			},
			success: function(response) {

				var response = $.parseJSON(JSON.stringify(response));

				$('.field').removeClass('error');
				if (response.status != true) {

					$.each(response.errors, function(field, i) {
						$('#profile-edit-'+field+' .field').addClass('error');

						Messenger().post({
							message: i,
							type: "error",
							showCloseButton: true,
							hideAfter: 6
						});

						$('#profile-save').addClass('disabled');

					});
				}
				else {

					Messenger().post({
						message: "資料已儲存",
						type: "success",
						showCloseButton: true,
						hideAfter: 3
					});

					$('#profile-save').addClass('disabled');

				}
			}
		});

	});

	// Profile Short
	$("#profile-shortened").click(function(){

		$.ajax({
			url : baseUrl + '/account/profile/short',
			dataType : 'json',
			type : 'POST',
			data : {
				username : $("#profile-short-username").val(),
				password : $("#profile-short-password").val(),
			},
			error : function(xhr) {
				errorMsg();
			},
			success : function(response) {

				var response = $.parseJSON(JSON.stringify(response));
				if (response.status == true) {
					Messenger().post({
						message: "恭喜！現在可以用短帳號登入囉",
						type: "info",
						showCloseButton: true,
						hideAfter: 3
					});
					setTimeout(function(){
						window.location.href = baseUrl + '/logout';
					}, 1500);
				}
				else{
					$.each(response.errors, function(field, i) {

						$('#profile-short-' + field).parents(".field").addClass('error');
						$('#profile-short-' + field).val('');
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
	});

	// 短帳號欄位填寫後清除 error class
	$(".profile-short").change(function(){
		$(this).parents(".field").removeClass('error');
	});

	// Profile Edit Password
	$("#profile-edited").click(function(){

		$.ajax({
			url : baseUrl + '/account/profile/edit/password',
			dataType : 'json',
			type : 'POST',
			data : {
				password 	 : $("#profile-edit-password-password").val(),
				ck_password  : $("#profile-edit-password-ck-password").val(),
				old_password : $("#profile-edit-password-old-password").val(),
			},
			error : function(xhr) {
				errorMsg();
			},
			success : function(response) {

				var response = $.parseJSON(JSON.stringify(response));
				if (response.status == true) {
					Messenger().post({
						message: "更改完成！請重新登入",
						type: "info",
						showCloseButton: true,
						hideAfter: 3
					});
					setTimeout(function(){
						window.location.href = baseUrl + '/logout';
					}, 2000);
				}
				else{
					Messenger().post({
						message: "資料填寫錯誤",
						type: "error",
						showCloseButton: true,
						hideAfter: 3
					});
				}
			}
		});
	});


	// Profile Edit Email
	$("#profile-email-edited").click(function () {

		$.ajax({
			url: baseUrl + '/account/profile/edit/email',
			dataType: 'json',
			type: 'POST',
			data: {
				password: $("#profile-edit-email-curr-password").val(),
				email: $("#profile-edit-email-email").val()
			},
			error: function (xhr) {
				errorMsg();
			},
			success: function (response) {

				var response = $.parseJSON(JSON.stringify(response));
				if (response.status == true) {
					Messenger().post({
						message: "更改完成！",
						type: "info",
						showCloseButton: true,
						hideAfter: 3
					});
					$("#profile-edit-email-modal").modal('hide');
					$("#profile-edit-email-curr-password").val('');
					$("#profile-edit-email-email").val('');
				}
				else {
					Messenger().post({
						message: "資料填寫錯誤",
						type: "error",
						showCloseButton: true,
						hideAfter: 3
					});
				}
			}
		});

	});

	// Close Modal
	$(".modal-cancel").click(function(){
		$('.ui.modal').modal('hide');
	});

	$('.special.cards .image').dimmer({
	  on: 'hover'
	});

	$('.change-pic').click(function(){
		$("#change-pic-modal").modal('show');
	});

	$('#profile-short').click(function(){
		$("#profile-short-modal").modal('show');
	});

	$("#profile-short-setup").click(function(){
		$("#profile-short-second-modal").modal('show');
	});

	$('#profile-hide').click(function(){
		$("#hide-name-modal").modal('show');
	});

	$('#change-pic-yes').click(function(){
		$('input[type=file]').click();
	});

	$('#change-pic-no').click(function(){
		$('#change-pic-modal').modal('hide');
	});

	$('#hide-name-unhide').click(function(){
		$('#hide-name-modal').modal('hide');
		hidename('unhide');
	});

	$('#hide-name-hide').click(function(){
		$('#hide-name-modal').modal('hide');
		hidename('hide');
	});
	// Profile End

	// left items sidebar open
	$("#sidebar-open").click(function(){
        $('#sidebar-menu').sidebar('setting', 'transition', 'overlay').sidebar('toggle');
    });

	// left school list sidebar open
	$("#sidebar-school-open").click(function(){
        $('#sidebar-school').sidebar('setting', 'transition', 'overlay').sidebar('toggle');
    });

	$("#sidebar-dis-open").click(function(){
		$("#sidebar-dis").sidebar('setting', 'transition', 'overlay').sidebar('toggle');
	});

	$("#notice-open").click(function(){
		$("#sidebar-notice").sidebar('setting', 'transition', 'overlay').sidebar('toggle');
	});

	$("#reply-function-open").click(function(){
		$("#talk-reply-function").sidebar('setting', {'transition' : 'overlay', 'dimPage' : false}).sidebar('toggle');
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

	// Scroll to bottom on opening modal
	$('.scroll-to-bottom-onmodal').click(function() {
		$('#article_modal').animate({
			scrollTop: $('#article_reply').height()
		}, 600);
	});

	// Siege Search Autocomplete
	$('#siege-search-school').search({
		source: School_List
	});

	// Siege Search Autocomplete
	$('#join-dept-search').search({
		source: Dept_List
	});

	// Siege Search Autocomplete
	$('#join-school-search').search({
		source: School_List,
	});

	// Query All School to Lists
	$("body").on('click', '#siege-start-attack', function() {

		// Close auto focus input
		$("#siege-choose-modal").modal("setting", {
			autofocus : false,
		}).modal("show");

		// Search four area school append to lists
		for (var i = 1; i <= 4; i++) {
			for (var j = 0; j < School_List.length; j++) {
				if (School_List[j].area.indexOf(i) != '-1') {
					switch (i) {
						case 1:
							$('#siege-school-north').append(
								'<div class="item">' +
									'<div class="content">' +
										'<div class="ui segment floated basic">' +
											'<h4 school_id="' + School_List[j].id + '" area="' + School_List[j].area + '" class="ui header search-school-option">' + School_List[j].title + '</h4>' +
										'</div>' +
									'</div>' +
								'</div>'
							);
							break;
						case 2:
							$('#siege-school-center').append(
								'<div class="item">' +
									'<div class="content">' +
										'<div class="ui segment floated basic">' +
											'<h4 school_id="' + School_List[j].id + '" area="' + School_List[j].area + '" class="ui header search-school-option">' + School_List[j].title + '</h4>' +
										'</div>' +
									'</div>' +
								'</div>'
							);
							break;
						case 3:
							$('#siege-school-south').append(
								'<div class="item">' +
									'<div class="content">' +
										'<div class="ui segment floated basic">' +
											'<h4 school_id="' + School_List[j].id + '" area="' + School_List[j].area + '" class="ui header search-school-option">' + School_List[j].title + '</h4>' +
										'</div>' +
									'</div>' +
								'</div>'
							);
							break;
						case 4:
							$('#siege-school-east').append(
								'<div class="item">' +
									'<div class="content">' +
										'<div class="ui segment floated basic">' +
											'<h4 school_id="' + School_List[j].id + '" area="' + School_List[j].area + '" class="ui header search-school-option">' + School_List[j].title + '</h4>' +
										'</div>' +
									'</div>' +
								'</div>'
							);
							break;
					}
				}
			}
		}
	});

	var confirm_attack_school;
	// Confirm Attack School
	$('body').on('click', '.search-school-option', function() {
		$("#siege-confirm-attack").modal('show');
		$("#confirm-school-name").html('確定攻擊 "' + $(this).text() + '" 嗎?');
		confirm_attack_school = $(this).attr('school_id');
	});


	// Search All School
	$("#siege-school-search").click(function(){

		var keywords = $("#siege-school-keywords").val();

		if (keywords) {
			var is_school = false;
			var result_school;
			var school_id;
			var school_area;
			for (var i = 0; i < School_List.length; i++) {
				if (School_List[i].title.indexOf(keywords) != '-1') {
					is_school = true;
					result_school = School_List[i].title;
					school_id = School_List[i].id;
					school_area = School_List[i].area;
				}
			}
			if (is_school == false) {
				Messenger().post({
					message: "找不到學校，善用搜尋提示能減少失誤！",
					type: "error",
					showCloseButton: true,
					hideAfter: 3
				});
				$("#siege-school-keywords").val('');
			}
			else{
				confirm_attack_school = school_id;
				$("#siege-confirm-attack").modal('show');
				$("#confirm-school-name").html('確定攻擊 "' + result_school + '" 嗎?');
				$("#siege-school-keywords").val('');
			}
		}
		else{
			Messenger().post({
				message: "請輸入關鍵字！",
				type: "error",
				showCloseButton: true,
				hideAfter: 3
			});
		}
	});

	$("#confirm_attack").click(function(){

		$.ajax({
			type: 'post',
			url: baseUrl + '/activity/siege/attack',
			dataType: 'json',
			data: {
				school_id : confirm_attack_school,
			},
			error: function (xhr) {
				errorMsg();
			},
			success: function (response) {
				var response = $.parseJSON(JSON.stringify(response));

				if (response.status == true) {

					if (response.attacked === 0) {
						$("#open-attack").html('<button class="ui button notinverted darkred" id="siege-start-attack">發動攻擊</button>');
					}
					else{
						$("#open-attack").html('<button class="ui button black disabled">今日已攻擊過</button>');
					}

					Messenger().post({
						message: "已發動攻擊！",
						type: "success",
						showCloseButton: true,
						hideAfter: 2
					});
					$('#siege-attack-record, #self_attack_records').show();
					$("#not-attack-record").hide();
					$('#self_attack_records').text('');
					$.each(response.record, function(i) {
						$('#self_attack_records').append(
							'<div class="ui icon message">' +
			                    '<i class="lightning icon"></i>' +
			                    '<div class="content">' +
			                        '<div class="header">' +
										response.record[i].sc_name +
			                        '</div>' +
			                        '<p>普通攻擊，血量減 1</p>' +
			                    '</div>' +
			                '</div>');
					});
				}
				else{
					Messenger().post({
						message: "發動攻擊失敗！",
						type: "error",
						showCloseButton: true,
						hideAfter: 2
					});
				}
			}
		});
	});

	// login confirm
	$("#login-confirm").click(function(){
		login();
	});

	// login keypress enter submit
	$("#login-email, #login-password").keypress(function(e){
		code = (e.keyCode ? e.keyCode : e.which);
		if (code == 13) {
			login();
		}
	});

	// login function
	function login () {

		$.ajax({
			type: 'post',
			url: baseUrl + '/login/confirm',
			dataType: 'json',
			data: {
				email 	 : $("#login-email").val(),
				password : $("#login-password").val(),
			},
			error: function (xhr) {
				Messenger().post({
					message: "登入失敗！",
					type: "error",
					showCloseButton: true,
					hideAfter: 2
				});
			},
			success: function (response) {
				var response = $.parseJSON(JSON.stringify(response));

				if (response.status == true) {

					Messenger().post({
						message: "歡迎回來！",
						type: "success",
						showCloseButton: true,
						hideAfter: 2
					});

					setTimeout(function(){
						window.location.href = baseUrl + '/a'
					}, 500);
				}
				else{

					if (response.failed == true) {
						window.location.href = baseUrl + '/login'
					}
					else{
						$.each(response.errors, function(field, i) {

							$('#login-' + field).parents(".field").addClass('error');

							Messenger().post({
								message: i,
								type: "error",
								showCloseButton: true,
								hideAfter: 6
							});
						});
					}
				}
			}
		});
	}

	$('#invite-friends-send').click(function() {
		$.ajax({
			url: baseUrl + '/friend/invite',
			data: {
				message: $('#invite-friends-msg').val(),
			},
			dataType: 'json',
			type: 'POST',
			error: function(xhr) {
				errorMsg();
			},
			success: function(response) {

				var response = $.parseJSON(JSON.stringify(response));

				$('.field').removeClass('error');
				if (response.status != true) {

					$.each(response.errors, function(field, i) {

						$('#invite-friends-msg').parent().addClass('error');

						Messenger().post({
							message: i,
							type: "error",
							showCloseButton: true,
							hideAfter: 6
						});

					});
				}
				else {

					Messenger().post({
						message: "成功送出邀請",
						type: "success",
						showCloseButton: true,
						hideAfter: 3
					});

					location.reload();
				}
			}
		});

	});

} );

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
	{ title: '國際貿易運籌', id: '504'},
	{ title: '旅館與會展管理', id: '505'},
	{ title: '多媒體與遊戲設計', id: '506'},
	{ title: '生活創意設計', id: '507'},
	{ title: '電腦輔助工業設計', id: '508'},
	{ title: '工商業設計', id: '509'},
	{ title: '休閒餐飲', id: '510'},
	{ title: '觀光旅遊', id: '511'},
	{ title: '健康管理', id: '512'},
	{ title: '專案管理', id: '513'},
	{ title: '餐旅經營', id: '514'},
	{ title: '視覺設計', id: '515'},
	{ title: '視覺創意', id: '516'},
	{ title: '遊戲開發', id: '517'},
	{ title: '時尚造型設計', id: '518'},
	{ title: '整體造型', id: '519'},
	{ title: '健康照顧社會工作', id: '520'},
	{ title: '華文傳播與創意', id: '521'},
	{ title: '財務資訊與金融', id: '522'},
	{ title: '奈米科技學', id: '523'},
	{ title: '機械工程學', id: '524'},
	{ title: '生物環境工程學', id: '525'},
	{ title: '電機資訊學', id: '526'},
	{ title: '工業與系統工程學', id: '527'},
	{ title: '國際經營與貿易學', id: '528'},
	{ title: '國際商學', id: '529'},
	{ title: '商業巨量資料管理', id: '530'},
	{ title: '財經法律學', id: '531'},
	{ title: '工程法律學', id: '532'},
	{ title: '室內設計學', id: '533'},
	{ title: '商業設計學', id: '534'},
	{ title: '景觀學', id: '535'},
	{ title: '文創設計學', id: '536'},
	{ title: '設計學', id: '537'},
	{ title: '教育學', id: '538'},
	{ title: '應用外國語文學', id: '539'},
	{ title: '應用華語文學', id: '540'},
	{ title: '數位音樂應用學', id: '541'},
	{ title: '製造工程與管理學', id: '542'},
	{ title: '生物科技與工程學', id: '543'},
	{ title: '化學工程與材料科學學', id: '544'},
	{ title: '工業工程與管理學', id: '545'},
	{ title: '先進能源學', id: '546'},
	{ title: '財務金融暨會計學', id: '547'},
	{ title: '資訊社會學', id: '548'},
	{ title: '生物與醫學資訊學', id: '549'},
	{ title: '社會暨政策科學學', id: '550'},
	{ title: '文化產業與文化政策學', id: '551'},
	{ title: '電信工程', id: '552' },
	{ title: '電機與控制工程', id: '553' },
	{ title: '顯示科技', id: '554' },
	{ title: '生醫工程', id: '555' },
	{ title: '電機學院產業研發', id: '556' },
	{ title: '資訊科學與工程', id: '557' },
	{ title: '多媒體工程', id: '558' },
	{ title: '網路工程', id: '559' },
	{ title: '光電系統', id: '560' },
	{ title: '影像與生醫光電', id: '561' },
	{ title: '照明與能源光電', id: '562' },
	{ title: '平面顯示技術', id: '563' },
	{ title: '加速器光源科技與應用', id: '564' },
	{ title: '聲音與音樂創意科技', id: '565' },
	{ title: '奈米科學及工程學', id: '566' },
	{ title: '電子物理學', id: '567' },
	{ title: '數學建模與科學', id: '568' },
	{ title: '分子科學', id: '569' },
	{ title: '分子醫學與生物工程', id: '570' },
	{ title: '生物資訊及系統生物', id: '571' },
	{ title: '運輸與物流管理學', id: '572' },
	{ title: '管理科學學', id: '573' },
	{ title: '交通運輸', id: '574' },
	{ title: '資訊管理與財務金融', id: '575' },
	{ title: '外國語文學系暨外國文學與語言學', id: '576' },
	{ title: '英語教學', id: '577' },
	{ title: '應用藝術', id: '578' },
	{ title: '社會與文化', id: '579' },
	{ title: '人文社會學系暨族群與文化', id: '580' },
	{ title: '傳播與科技學', id: '581' },
	{ title: '科技法律', id: '582' },
];

// School List Last is 49
var School_List = [
	{ title: '龍華科技大學', id: '1', area: '1', ex: '學號@gm.lhu.edu.tw', link: 'http://web.gm.lhu.edu.tw/', mark: '' },
	{ title: '健行科技大學', id: '2', area: '1', ex: '學號@uch.edu.tw', link: 'https://mail.uch.edu.tw/', mark: '' },
	{ title: '中華科技大學', id: '3', area: '1', ex: 's+學號@ccs.cust.edu.tw', link: 'http://ccs.cust.edu.tw/roundcube/', mark: '' },
	{ title: '開南大學', id: '4', area: '1', ex: '學號@mail.knu.edu.tw', link: 'http://mail.knu.edu.tw/index.html', mark: '' },
	{ title: '弘光科技大學', id: '5', area: '2', ex: 'U102P212@ms.hk.edu.tw', link: 'http://ms.hk.edu.tw/webmail', mark: '預設密碼為身份證字號，且為小寫' },
	{ title: '中臺科技大學', id: '6', area: '2', ex: 'D10401051@ms3.ctust.edu.tw', link: 'http://eip.ctust.edu.tw/mailIndex.do', mark: '' },
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
	{ title: '南亞技術學院', id: '21', area: '1', ex: '1041222103@tiit.edu.tw', link: 'http://mail.tiit.edu.tw/index.html', mark: '預設密碼為學號' },
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
	{ title: '中原大學', id: '50', area: '1', ex: 's+學號@cycu.edu.tw', link: 'https://mail.cycu.edu.tw/indexi2.html', mark: '' },
	{ title: '元智大學', id: '51', area: '1', ex: 's+學號@mail.yzu.edu.tw', link: 'https://webmail04.yzu.edu.tw/owa', mark: '' },
	{ title: '交通大學', id: '52', area: '1', ex: '自訂+@nctu.edu.tw', link: 'https://fwebmail.nctu.edu.tw/roundcube/', mark: '' },
];

// Facebook Plugin
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
