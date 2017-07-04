function addCookie(key, value, day) {
    var date = new Date();
    date.setDate(date.getDate() + day); //当前的日期+10天
    document.cookie = key + '=' + encodeURI(value) + ';expires=' + date; //date:修改的日期（年月日时分秒日期）     
}

function getCookie(key) {
    var arr = decodeURI(document.cookie).split('; '); //数组的每一项都是一个键值对。
    for (var i = 0; i < arr.length; i++) {
        var newarr = arr[i].split('='); //将arr数组再次拆分成一个新的数组newarr
        if (newarr[0] == key) { //比较每个新数组的key值，输出value;
            return newarr[1];
        }
    }
}

function delCookie(key) {
    addCookie(key, 'value', -1);
}
