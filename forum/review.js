window.onload = function () {
    $('.praise').click(function(){
        praiseReview($(this));
    });
    $('.praisePost').click(function(){
        praisePost($(this));
    });
    /*赞赏评论
    */
    function praiseReview(obj){
        var praiseCount = $(obj).find('.praiseCount');
        var praiseText = $(obj).find('.praiseText');
        var rID = $(obj).find('#rID').val();
        if(praiseText.text()==''){
            praiseText.text('取消赞');
            var oldTotal = parseInt(praiseCount.text()?praiseCount.text():0);
            var newTotal = oldTotal+1;
            praiseCount.text(newTotal);
            givePraise(rID);
        }else{
            praiseText.text('');
            var oldTotal = parseInt(praiseCount.text()?praiseCount.text():0);
            var newTotal = oldTotal-1;
            if(newTotal){
                praiseCount.text(newTotal);
            }else{
                praiseCount.text('');
            }
            withdraw(rID);
        }
    }

    /*赞赏帖子
    */
    function praisePost(obj){
        var praiseCount = $(obj).find('.praiseCount');
        var praiseText = $(obj).find('.praiseText');
        var praiseIcon = $(obj).find('.glyphicon');
        var pID = $(obj).find('#pID').val();
        if(praiseText.text()==''){
            praiseText.text('取消赞');
            var oldTotal = parseInt(praiseCount.text()?praiseCount.text():0);
            var newTotal = oldTotal+1;
            praiseCount.text(newTotal);
            givePostPraise(pID);
        }else{
            praiseText.text('');
            var oldTotal = parseInt(praiseCount.text()?praiseCount.text():0);
            var newTotal = oldTotal-1;
            if(newTotal){
                praiseCount.text(newTotal);
            }else{
                praiseCount.text('');
            }
            withPostdraw(pID);
        }
    }
}