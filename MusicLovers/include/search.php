<head>
<link href="css/container.css" rel="stylesheet" type="text/css" media="all" />
</head>
	<div id="search">
    <hr style="margin:0px;"/>

		<form name="myForm" action="search_result.php" onsubmit="return validateForm()" method="get">
            <input type="text" name="search_txt" id="search" placeholder="Search by song name or singer name..." style="height:24px; width:300px; line-height:30px; border-radius:5px;">
            <input type="submit" name="search_btn" value="Search" style="height:30px; width:70px; border-radius:5px; background: linear-gradient(to bottom, #0FC , #fff);">
        </form>
    <hr style="margin:0px;"/>
    </div>