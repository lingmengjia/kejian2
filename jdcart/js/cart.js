;
(function($) {
    //购物车
    //1、获取数据,推荐商品的数据
    $.ajax({
        url: 'json/cart.json',
        dataType: 'json',
        async: false
    }).done(function(data) {
        var str = '<ul>'
        for (var i = 0; i < data.length; i++) {
            str += '<li>' +
                '<div class="goodsinfo">' +
                '<div class="p-img">' +
                '<a href=""><img class="loadimg" src="' + data[i].img + '" alt=""  sid="' + data[i].sid + '" /></a>' +
                '</div>' +
                '<div class="p-name">' +
                '<a class="loadt" href="">' + data[i].title + '</a>' +
                '</div>' +
                ' <div class="p-price"><strong><em>￥</em><i class="loadpcp">' + data[i].price + '</i></strong></div>' +
                '<div class="p-btn"><a href="javascript:void(0)"><b></b>加入购物车</a></div>' +
                ' </div>' +
                ' </li>';
        }
        str += '</ul>';
        $('.goods-list').html(str);
        if (getCookie('cartsid')) {
            var s = getCookie('cartsid').split(','); //编号  [1,2,3,4]
            var n = getCookie('cartnum').split(','); //num  [3,4,5,6]
            for (var i = 0; i < s.length; i++) {
                createcart(s[i], n[i]);
            }
        }
    });

    //2、判断当前的sid存在于cookie中，如果存在cookie数量+1，否则创建购物车。思路利用数组来判断。cookie里面存储是商品的编号和商品的数量
    var sidarr = []; //存放商品编号的数组
    var numarr = []; //存放商品数量的数组

    function cookietoarray() { //将cookie转换成数组,约定存储cookie名称
        if (getCookie('cartsid')) { //cartsid:存放商品编号cookie的名称
            sidarr = getCookie('cartsid').split(',');
        }

        if (getCookie('cartnum')) { //cartsid:存放商品数量cookie的名称
            numarr = getCookie('cartnum').split(',');
        }
    }

    //点击加入购物车：如果sid存在cookie数量+1，否则创建购物车列表
    $('.p-btn').on('click', function() {
        var $sid = $(this).parents('.goodsinfo').find('.loadimg').attr('sid'); //取按钮对应的id
        cookietoarray(); //cookie变成数组
        //判断sid是否存在cookie的数组中
        if ($.inArray($sid, sidarr) != -1) { //存在
            $('.goods-item:visible').each(function() {
                if ($sid == $(this).find('.goods-pic img').attr('sid')) {
                    var $count = $(this).find('.quantity-form input').val(); //获取数量
                    $count++; //数量累加
                    $(this).find('.quantity-form input').val($count); //返回数量
                    var $dprice = parseFloat($(this).find('.b-price strong').html());
                    $(this).find('.b-sum strong').html(($dprice * $count).toFixed(2)); //计算总和
                    numarr[$.inArray($sid, sidarr)] = $count; //sid的位置和数量的位置是对应的，sid的位置求得数量的位置。
                    addCookie('cartnum', numarr.toString(), 7);
                    total();
                }
            });
        } else { //不存在：1、添加cookie，2、创建商品列表
            sidarr.push($sid);
            addCookie('cartsid', sidarr.toString(), 7);
            numarr.push(1);
            addCookie('cartnum', numarr.toString(), 7);
            createcart($sid, 1);
        }
    });

    function createcart(sid, num) { //sid：按钮点击传过来的
        $.ajax({
            url: 'json/cart.json',
            dataType: 'json',
            async: false
        }).done(function(data) {
            for (var i = 0; i < data.length; i++) {
                if (sid == data[i].sid) { //按钮点击传过来的id==数据里面的id
                    var $clone = $('.goods-item:hidden').clone(true); //对隐藏的进行克隆
                    $clone.find('img').attr({
                        src: data[i].img,
                        sid: data[i].sid
                    });
                    $clone.find('.goods-d-info a').html(data[i].title);
                    $clone.find('.b-price strong').html(data[i].price);
                    $clone.find('.quantity-form input').val(num); //将数量赋值给商品列表的数量
                    var $count = $clone.find('.quantity-form input').val();
                    $clone.find('.b-sum strong').html(parseFloat((data[i].price) * $count).toFixed(2));
                    $clone.css('display', 'block');
                    $('.item-list').append($clone);

                }
            }
            kong();
            total();
        })

    }



    //购物车空空的哦~，去看看心仪的商品吧~
    kong();

    function kong() {
        if (getCookie('cartsid')) {
            $('.empty-cart').hide();
        } else {
            $('.empty-cart').show();
        }
    }


    //计算总价和总的商品件数
    total();

    function total() {
        var $totalprice = 0;
        var $totalnum = 0;
        $('.goods-item:visible').each(function() {
            if ($(this).find('input:checkbox').is(':checked')) { //控制复选框是否被选中
                $totalprice += parseFloat($(this).find('.b-sum strong').html());
                $totalnum += parseInt($(this).find('.quantity-form input').val());
            }
        });
        $('.totalprice').html('￥' + $totalprice);
        $('.amount-sum em').html($totalnum);
    }


    //全选按钮

    $('.allsel').on('change', function() { //选择上下两个全选按钮
        if ($(this).prop('checked')) {
            $('.goods-item:visible').find('input:checkbox').prop('checked', true);
        } else {
            $('.goods-item:visible').find('input:checkbox').prop('checked', false);
        }
        //将全选按钮的值给自己
        $('.allsel').prop('checked', $(this).prop('checked'));
        total();
    })

    var $inputs = $('.goods-item:visible').find('input:checkbox').length;
    $('.goods-item:visible').find('input:checkbox').on('change', function() {
        if ($('.goods-item:visible').find('input:checked').size() == $inputs) {
            $('.allsel').prop('checked', true);
        } else {
            $('.allsel').prop('checked', false);
        }
        total();
    });



    //删除(删除一行、删除选中的)
    $('.b-action').on('click', 'a:first', function() { //？？事件代理
        $(this).parents('.goods-item').remove();
        total();
        cookietoarray(); //cookie编号值转换的数组
        delgoodscookie($(this).parents('.goods-item').find('img').attr('sid'), sidarr);
        var $inputs = $('.goods-item:visible').find('input:checkbox').length;
        $('.goods-item:visible').find('input:checkbox').on('change', function() {
            if ($('.goods-item:visible').find('input:checked').size() == $inputs) {
                $('.allsel').prop('checked', true);
            } else {
                $('.allsel').prop('checked', false);
            }
        });
    });


    //删除选中的
    $('.operation a:first').on('click', function() {
        $('.goods-item:visible').each(function() {
            if ($(this).find('input:checkbox').is(':checked')) {
                $(this).remove();
                delgoodscookie($(this).find('img').attr('sid'), sidarr);
            }
        });
        total();
        var $inputs = $('.goods-item:visible').find('input:checkbox').length;
        $('.goods-item:visible').find('input:checkbox').on('change', function() {
            if ($('.goods-item:visible').find('input:checked').size() == $inputs) {
                $('.allsel').prop('checked', true);
            } else {
                $('.allsel').prop('checked', false);
            }
        });

    })

    function delgoodscookie(sid, sidarr) { //sid:图片的编号  sidarr:cookie编号值转换的数组
        numarr.splice($.inArray(sid, sidarr), 1);
        sidarr.splice($.inArray(sid, sidarr), 1);
        addCookie('cartsid', sidarr.toString(), 7);
        addCookie('cartnum', numarr.toString(), 7);
    }

    //++ -- 
    $('.quantity-add').on('click',function(){
    	var $num=$(this).prev().val();
    	$num++;
    	if($num>99){
    		$num=99;
    	}
    	$(this).prev().val($num);
    	rowprice($(this));
    });


    $('.quantity-down').on('click',function(){
    	var $num=$(this).next().val();
    	$num--;
    	if($num<1){
    		$num=1;
    	}
    	$(this).next().val($num);
    	rowprice($(this));
    });

    $('.b-quantity input').on('input',function(){
    	var $reg=/^\d+$/;
    	var $value=$(this).val();
    	if($reg.test($value)){
    		if($value>99){
    			$(this).val(99);
    		}else if($value<1){
    			$(this).val(1);
    		}else{
    			$(this).val($value);
    		}
    	}else{
    		$(this).val(1);
    	}
    	rowprice($(this));

    });

    function rowprice(obj){
    	var $dj=parseFloat(obj.parents('.goods-item').find('.b-price strong').html());//获取对应的单价
    	var $inputvalue=obj.parents('.goods-item').find('.quantity-form input').val();//input值
    	obj.parents('.goods-item').find('.b-sum strong').html(($dj*$inputvalue).toFixed(2));

    	var $s=obj.parents('.goods-item').find('.goods-pic img').attr('sid');
    	//获取sid
    	cookietoarray();
    	numarr[$.inArray($s,sidarr)]=$inputvalue//获取sid在cookie的位置

    	addCookie('cartnum',numarr.toString(),7);
    	total();
    }




})(jQuery)
