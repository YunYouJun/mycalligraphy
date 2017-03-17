window.onload = function () {
    $('.praise').click(function(){
        praiseReview($(this));
    });
    /*赞赏评论
    */
    function praiseReview(obj){
        var praiseCount = $(obj).find('.praiseCount');
        var praiseText = $(obj).find('.praiseText');
        if(praiseText.text()==''){
            praiseText.text('取消赞');
            var oldTotal = parseInt(praiseCount.text()?praiseCount.text():0);
            var newTotal = oldTotal+1;
            praiseCount.text(newTotal);
        }else{
            praiseText.text('');
            var oldTotal = parseInt(praiseCount.text()?praiseCount.text():0);
            var newTotal = oldTotal-1;
            if(newTotal){
                praiseCount.text(newTotal);
            }else{
                praiseCount.text('');
            }

        }
    }

    //评论
    var textArea = boxs[i].getElementsByClassName('comment')[0];
    //评论获取焦点
    textArea.onfocus = function () {
        this.parentNode.className = 'text-box text-box-on';
        this.value = this.value == '评论…' ? '' : this.value;
        this.onkeyup();
    }

    //评论失去焦点
    textArea.onblur = function () {
        var me = this;
        var val = me.value;
        if (val == '') {
            timer = setTimeout(function () {
                me.value = '评论…';
                me.parentNode.className = 'text-box';
            }, 200);
        }
    }

    //评论按键事件
    textArea.onkeyup = function () {
        var val = this.value;
        var len = val.length;
        var els = this.parentNode.children;
        var btn = els[1];
        var word = els[2];
        if (len <=0 || len > 140) {
            btn.className = 'btn btn-off';
        }
        else {
            btn.className = 'btn';
        }
        word.innerHTML = len + '/140';
    }
}