<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>凡客VANCL-互联网快时尚品牌，服装，鞋，配饰，网上购物货到付款网站，7天无条件退货</title>
	<meta name="keywords" content="凡客官网">
	<meta name="description" content="">
	<base target="_blank">

	<link rel="stylesheet" href="vacal/vacal.css">
</head>

<body>
	<!-- 网页头部部分 -->
	<div class="headPart">

		<!-- 头部广告 -->
		<div class="HeaderTop">
			<div class="headerTop">
				<div class="headerTopRight">
					<div class="hTRL">
						<a href="http://catalog.vancl.com/zhuanti/tg_20100510.html">网站公告</a>
					</div>
					<div class="hTRR">
						<a href="" class="vweixin"></a>
						<a href="http://weibo.com/vancl?sudaref=login.sina.com.cn&retcode=6102" class="vweibo"></a>
					</div>
				</div>
				<div class="headerTopLeft">
					<span>您好,欢迎光临凡客诚品!&nbsp;</span>
					<a href="https://login.vancl.com/login/login.aspx?http%3A%2F%2Fwww.vancl.com%2F">登录</a>
					<a href="">|</a>
					<a href="https://login.vancl.com/login/reg.aspx?http%3A%2F%2Fwww.vancl.com%2F">注册</a>
					<a href="">&nbsp;我的订单</a>
				</div>
			</div>
		</div>

		<!-- 输入搜索部分 -->
		<div class="inputPart">
			<div class="inputSearch">
				<div class="SearchTab">
					<div class="SearchTab_1">
						<input type="text" class="searchText" name="keywords" value="">
						<input type="button" class="searchBtn" value="">
					</div>

					<div class="SearchTab_2">
						<a href="" class="shopping" style="color: white;font-size: 12px">购物车(0)</a>
					</div>

					<div style="clear: both;"></div>

					<div class="hotWords">
						<p class="words">
							<span class="hotsearch">热门搜索:</span>
							<?php
								//后台数据嵌入示例
								foreach($menu_5_data as $menu){
									$menu_extA = unserialize($menu['menucontent']);
									echo '<a href="'.$menu_extA['link'].'">'.$menu['ctitle'].'</a>';
								}
							?>
							
						</p>
					</div>
				</div>
			</div>
		</div>

		<!-- 菜单部分 -->
		<div class="menu">
			<ul>
				<li class="logo">
					<a href="http://www.vancl.com/"></a>
				</li>
				<li><a href="http://www.vancl.com/">首页</a></li>
				<li class="line"></li>
				<li>
					<a href="">衬衫</a>
					<ul>
						<li><a href="">免烫</a></li>
						<li><a href="">高支</a></li>
						<li><a href="">休闲</a></li>
						<li><a href="">法兰绒</a></li>
						<li><a href="">牛津纺</a></li>
						<li><a href="">青年布</a></li>
						<li><a href="">牛仔</a></li>
						<li><a href="">麻</a></li>
						<li><a href="">府绸</a></li>
						<li><a href="">私人订制</a></li>
					</ul>
				</li>
				<li class="line"></li>
				<li>
					<a href="">羽绒服</a>
					<ul>
						<li><a href="">男款</a></li>
						<li><a href="">女款</a></li>
					</ul>
				</li>
				<li class="line"></li>
				<li>
					<a href="">外套</a>
					<ul>
						<li><a href="">羽绒服</a></li>
						<li><a href="">大衣</a></li>
						<li><a href="">西服</a></li>
						<li><a href="">夹克</a></li>
						<li><a href="">卫衣</a></li>
					</ul>
				</li>
				<li class="line"></li>
				<li>
					<a href="">针织衫</a>
					<ul>
						<li><a href="">羊绒衫</a></li>
						<li><a href="">羊毛衫</a></li>
						<li><a href="">棉线衫</a></li>
						<li><a href="">空调衫</a></li>
					</ul>
				</li>
				<li class="line"></li>
				<li>
					<a href="">水柔棉</a>
					<ul>
						<li><a href="">拉链开衫</a></li>
						<li><a href="">长袖V领</a></li>
						<li><a href="">长袖圆领</a></li>
						<li><a href="">短袖</a></li>
					</ul>
				</li>
				<li class="line"></li>
				<li>
					<a href="">裤装</a>
					<ul>
						<li><a href="">商务</a></li>
						<li><a href="">休闲裤</a></li>
						<li><a href="">牛仔裤</a></li>
						<li><a href="">麻裤子</a></li>
						<li><a href="">针织裤</a></li>
					</ul>
				</li>
				<li class="line"></li>
				<li>
					<a href="">鞋</a>
					<ul>
						<li><a href="">复古跑鞋</a></li>
						<li><a href="">户外鞋</a></li>
						<li><a href="">帆布鞋</a></li>
						<li><a href="">皮鞋</a></li>
						<li><a href="">休闲鞋</a></li>
					</ul>
				</li>
				<li class="line"></li>
				<li>
					<a href="">袜品</a>
					<ul>
						<li><a href="">中筒袜</a></li>
						<li><a href="">连裤袜</a></li>
						<li><a href="">船袜</a></li>
					</ul>
				</li>
				<li class="line"></li>
				<li>
					<a href="">家居配饰</a>
					<ul>
						<li><a href="">床品三件套</a></li>
						<li><a href="">床品四件套</a></li>
						<li><a href="">羽绒被</a></li>
						<li><a href="">鹅绒被</a></li>
						<li><a href="">蚕丝被</a></li>
						<li><a href="">羽毛枕</a></li>
						<li><a href="">摇粒绒毯</a></li>
						<li><a href="">珊瑚绒毯</a></li>
						<li><a href="">珊瑚绒睡袍</a></li>
						<li><a href="">配饰</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<!--轮播部分-->
	<div id="container" class="dc3">
		<ul class="pic">
			<li>
				<a href="http://catalog.vancl.com/downcoat/znwk.html#ref=hp-hp-focus-1_2-v:n "><img src="vacal/images/凡客只能控温羽绒服.jpg " alt="pic1"></a>
			</li>
			<li>
				<a href="http://downcoat.vancl.com/#ref=hp-hp-focus-1_3-v:n"><img src="vacal/images/羽绒服.jpg" alt="pic2 "></a>
			</li>
			<li>
				<a href="http://coats.vancl.com/#ref=hp-hp-focus-1_4-v:n"><img src="vacal/images/外套.jpg" alt="pic3"></a>
			</li>
			<li>
				<a href="http://shirts.vancl.com/#ref=hp-hp-focus-1_5-v:n"><img src="vacal/images/凡客衬衫.jpg" alt="pic4"></a>
			</li>
			<li>
				<a href="http://fanbuxie.vancl.com/#ref=hp-hp-focus-1_6-v:n"><img src="vacal/images/凡客运动鞋.jpg" alt="pic1"></a>
			</li>
			<!-- 克隆第一张 -->
		</ul>
	</div>

	<!--圣诞优惠展台-->
	<div class="getMoney">
		<a href=" "><img src="vacal/images/充值优惠.jpg" alt=" "></a>
	</div>

	<div class="discount">
		<img src="vacal/images/圣诞促销.jpg" alt=" ">
	</div>

	<div class="showPic">
		<div class="partone ">
			<a href=" "><img src="vacal/images/christmas-bk01.jpg " alt=" "></a>
			<h3>凡客衬衫&nbsp;法兰绒&nbsp;领尖扣&nbsp;男款<span>充值购买<em>79</em>元</span></h3>
		</div>
		<div class="parttwo">
			<div class="one">
				<a href=" "><img src="vacal/images/christmas-bk02.jpg " alt=" "></a>
				<h3>凡客衬衫&nbsp;法兰绒&nbsp;男款<span>充值购买<em>79</em>元</span></h3>
			</div>

			<div class="two">
				<a href=" "><img src="vacal/images/christmas-bk03.jpg " alt=" "></a>
				<h3>吉国武&nbsp;免烫&nbsp;温莎领&nbsp;2.0<span>充值购买<em>129</em>元</span></h3>
			</div>
		</div>
		<div class="partthree">
			<a href=" "><img src="vacal/images/christmas-bk04.jpg " alt=" "></a>
			<h3>弹力修身&nbsp;小方领衬衫<span>充值购买<em>109</em>元</span></h3>
		</div>
	</div>

	<div class="showPic ">
		<div class="partone ">
			<a href=" "><img src="vacal/images/christmas-bk05.jpg " alt=" "></a>
			<h3>羽绒服&nbsp;轻暖95绒&nbsp;连帽&nbsp;女款<span>充值购买<em>184</em>元</span></h3>
		</div>
		<div class="parttwo ">
			<div class="one ">
				<a href=" "><img src="vacal/images/christmas-bk06.jpg " alt=" "></a>
				<h3>羽绒服&nbsp;轻暖95绒&nbsp;连帽<span>充值购买<em>184</em>元</span></h3>
			</div>

			<div class="two ">
				<a href=" "><img src="vacal/images/christmas-bk07.jpg " alt=" "></a>
				<h3>羽绒服&nbsp;轻暖95绒&nbsp;立领<span>充值购买<em>184</em>元</span></h3>
			</div>
		</div>
		<div class="partthree ">
			<a href=" "><img src="vacal/images/christmas-bk08.jpg " alt=" "></a>
			<h3>凡客休闲鞋&nbsp;2&nbsp;女款<span>充值购买<em>188</em>元</span></h3>
		</div>
	</div>


	<!--打折优惠展台-->
	<div class="discount ">
		<img src="vacal/images/圣诞促销.jpg " alt=" ">
	</div>

	<div class="showPic ">
		<div class="partone ">
			<a href=" "><img src="vacal/images/djdz-0101.jpg " alt=" "></a>
			<h3>凡客羊毛大衣&nbsp;强缩绒&nbsp;DUFFEL&nbsp;男款<span>充值折后最低<em>419.65</em>元</span></h3>
		</div>
		<div class="parttwo ">
			<div class="one ">
				<a href=" "><img src="vacal/images/djdz-0102.jpg " alt=" "></a>
				<h3>羊毛西服<span>充值折后最低<em>454.65</em>元</span></h3>
			</div>

			<div class="two ">
				<a href=" "><img src="vacal/images/djdz-0103.jpg " alt=" "></a>
				<h3>西服&nbsp;小翻领<span>充值折后最低<em>174.65</em>元</span></h3>
			</div>
		</div>
		<div class="partthree ">
			<a href=" "><img src="vacal/images/djdz-0104.jpg " alt=" "></a>
			<h3>青果领大衣<span>充值折后最低<em>419.65</em>元</span>
			</h3>
		</div>
	</div>

	<div class="showPic ">
		<div class="partone ">
			<a href=" "><img src="vacal/images/djdz-0201.jpg " alt=" "></a>
			<h3>凡客羊毛大衣&nbsp;手工双面呢&nbsp;领尖扣&nbsp;西服领长款&nbsp;女款<span>充值折后最低<em>524.65</em>元</span></h3>
		</div>
		<div class="parttwo ">
			<div class="one ">
				<a href=" "><img src="vacal/images/djdz-0202.jpg " alt=" "></a>
				<h3>手工双面呢<span>充值折后最低<em>419.65</em>元</span></h3>
			</div>

			<div class="two ">
				<a href=" "><img src="vacal/images/djdz-0203.jpg " alt=" "></a>
				<h3>羊绒大衣<span>充值折后最低<em>699.65</em>元</span></h3>
			</div>
		</div>
		<div class="partthree ">
			<a href=" "><img src="vacal/images/djdz-0204.jpg " alt=" "></a>
			<h3>手工双面呢<span>充值折后最低<em>699.65</em>元</span></h3>
		</div>
	</div>

	<div class="showPic ">
		<div class="partone ">
			<a href=" "><img src="vacal/images/djdz-0301.jpg " alt=" "></a>
			<h3>凡客卫衣&nbsp;中空棉拉链开衫&nbsp;男款<span>充值折后最低<em>279.65</em>元</span></h3>
		</div>
		<div class="parttwo ">
			<div class="one ">
				<a href=" "><img src="vacal/images/djdz-0302.jpg " alt=" "></a>
				<h3>基础拉链开衫<span>充值折后最低<em>122.15</em>元</span></h3>
			</div>

			<div class="two ">
				<a href=" "><img src="vacal/images/djdz-0303.jpg " alt=" "></a>
				<h3>基础拉链开衫<span>充值折后最低<em>122.15</em>元</span></h3>
			</div>
		</div>
		<div class="partthree ">
			<a href=" "><img src="vacal/images/djdz-0304.jpg " alt=" "></a>
			<h3>基础套头衫<span>充值折后最低<em>104.65</em>元</span></h3>
		</div>
	</div>

	<div class="showPic ">
		<div class="partone ">
			<a href=" "><img src="vacal/images/djdz-0401.jpg " alt=" "></a>
			<h3>凡客羽绒服&nbsp;智能温控&nbsp;鹅绒增强版&nbsp;男款<span>充值折后最低<em>524.65</em>元</span></h3>
		</div>
		<div class="parttwo ">
			<div class="one ">
				<a href=" "><img src="vacal/images/djdz-0402.jpg " alt=" "></a>
				<h3>95绒&nbsp;机车立领<span>充值折后最低<em>244.65</em>元</span></h3>
			</div>

			<div class="two ">
				<a href=" "><img src="vacal/images/djdz-0403.jpg " alt=" "></a>
				<h3>N-3B&nbsp;95鹅绒<span>充值折后最低<em>419.65</em>元</span></h3>
			</div>
		</div>
		<div class="partthree ">
			<a href=" "><img src="vacal/images/djdz-0404.jpg " alt=" "></a>
			<h3>鹅绒加厚拼接<span>充值折后最低<em>419.65</em>元</span></h3>
		</div>
	</div>

	<div class="showPic ">
		<div class="partone ">
			<a href=" "><img src="vacal/images/djdz-0501.jpg " alt=" "></a>
			<h3>凡客羊毛衫&nbsp;圆领套衫&nbsp;男款<span>充值折后最低<em>164.15</em>元</span></h3>
		</div>
		<div class="parttwo ">
			<div class="one ">
				<a href=" "><img src="vacal/images/djdz-0502.jpg " alt=" "></a>
				<h3>精纺V领开衫<span>充值折后最低<em>220.15</em>元</span></h3>
			</div>

			<div class="two ">
				<a href=" "><img src="vacal/images/djdz-0503.jpg " alt=" "></a>
				<h3>羊绒菱形条纹<span>充值折后最低<em>454.65</em>元</span></h3>
			</div>
		</div>
		<div class="partthree ">
			<a href=" "><img src="vacal/images/djdz-0504.jpg " alt=" "></a>
			<h3>羊绒绞花套衫<span>充值折后最低<em>699.65</em>元</span></h3>
		</div>
	</div>

	<div class="showPic_Last ">
		<div>
			<a href=" "><img src="vacal/images/kz01.jpg " alt=" "></a>
			<h3>牛仔裤&nbsp;高腰<span>充值折后最低<em>104.65</em>元</span></h3>
		</div>
		<div>
			<a href=" "><img src="vacal/images/kz02.jpg " alt=" "></a>
			<h3>弹力灯芯绒<span>充值折后最低<em>129.15</em>元</span></h3>
		</div>
		<div>
			<a href=" "><img src="vacal/images/kz03.jpg " alt=" "></a>
			<h3>全棉直筒<span>充值折后最低<em>129.15</em>元</span></h3>
		</div>
		<div style="margin-right:0px; ">
			<a href=" "><img src="vacal/images/kz04.jpg " alt=" "></a>
			<h3>水洗锥形窄脚<span>充值折后最低<em>104.65</em>元</span></h3>
		</div>
	</div>

	<div style="clear:both; width:100%;height:0px; "></div>

	<!--主页底部-->
	<div class="foot ">
		<div class="footserve ">
			<div>
				<a href=" ">
					<p class="onlinePic "><img src="vacal/images/onlinecustomer.png " alt=" "></p>
					<p class="onlineTime "> 7X9小时在线客服</p>
				</a>
			</div>
			<div>
				<a href=" ">
					<p class="seven "><img src="vacal/images/seven.png " alt=" "></p>
					<p>7天内退换货</p>
					<p>购物满199元免运费</p>
				</a>
			</div>
			<div style="border-right:none; ">
				<p>
					<a href=" "><img src="vacal/images/二维码.jpg " alt=" " style="width:104px;height:104px; "></a>
				</p>
				<p>扫描下载<em>凡客</em>客户端</p>
			</div>
		</div>

		<div class="serveline ">
			<a href=" ">关于凡客</a>
			<a href=" ">新手指南</a>
			<a href=" ">配送范围及时间</a>
			<a href=" ">支付方式</a>
			<a href=" ">售后服务</a>
			<a href=" " style="border-right: 0px; ">帮助中心</a>
		</div>
	</div>

	<!--广告和赞助及友情链接部分-->
	<div class="footerArea ">
		<div class="footBottom ">
			<p>Copyright 2007 - 2016 vancl.com All Rights Reserved 京ICP证100557号 京公网安备11011502002400号 出版物经营许可证新出发京批字第直110138号</p>
			<p>凡客诚品（北京）科技有限公司</p>
		</div>

		<div class="Clear "></div>

		<div class="subFooter ">
			<a href=" " class="one "></a>
			<span class="two "></span>
			<a href=" " class="three "></a>
			<a href=" " class="four "></a>
			<a href=" " class="five "></a>
			<a href=" " class="six "><img src="vacal/images/CCTV.png " alt=" "></a>
		</div>
	</div>

	<!--固定的导航栏-->
	<div class="BayWindow ">
		<a href=" "><img src="vacal/images/baywindow.png " alt=" "></a>
	</div>


</body>

</html>
