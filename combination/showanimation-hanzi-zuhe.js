/**
 * Created by liuyubobobo on 14-4-11.
 * my site: http://www.liuyubobobo.com
 */
function showNumberWithAnimation( i , j , randNumber ){

    var numberCell = $('#number-cell-' + i + "-" + j );

    numberCell.css('background-color',getNumberBackgroundColor( randNumber ) );
    numberCell.css('color',getNumberColor( randNumber ) );
    numberCell.css('border-radius',0.04*cellSideLength);
    numberCell.text( getNumberText( board[i][j] ) );

    numberCell.animate({
        width:cellSideLength,
        height:cellSideLength,
        top:getPosTop( i , j ),
        left:getPosLeft( i , j )
    },300);

    numberCell.addClass('spinner');
}

function showMoveAnimation( fromx , fromy , tox, toy ){

    var numberCell = $('#number-cell-' + fromx + '-' + fromy );
    numberCell.animate({
        top:getPosTop( tox , toy ),
        left:getPosLeft( tox , toy )
    },200);
}

function updateScore( score ,cache ){
    var percent = Math.ceil(score/20.48) + '%';
    $('#score').text( percent);
    $('#score').attr('aria-valuenow',percent);
    $('#score').css('width',percent );

    if (score==16 && jieshi == 0) {
        $('#winword').html('艹，读音为ǎo，同“草”。用作偏旁。<br>俗称“草头”或“草字头”。');
        $('#wingame').modal('show');
        jieshi=1;
    }

    if(score==512 && winflag == 0){
        $('#winword').html('这个字念xian哦，第一声<br><span class="texton">韱</span>：◎ 山韭，一种草。<br>◎ 古同“纤”，细小。');
        $('#wingame').modal('show');
        winflag=1;
    }
    if(score==1024 && winflag == 1){
        $('#winword').html('已经很厉害啦！<br>还可能有比-<span class="texton">龍</span>-更复杂的字吗？');
        $('#wingame').modal('show');
        winflag=2;
    }
    if(score==2048 && winflag == 2){
        $('#winword').html('恭喜你，找寻到笔画最多的汉字-<span class="texton">𪚥</span>-啦！<br>=。=不过可能显示不出来啊！');
        $('#wingame').modal('show');
        winflag=0;
    }

    var cacheper = Math.abs((cache/81.92)-(score/20.48)); 
    $('#cache').attr('aria-valuenow',cacheper);
    $('#cache').css('width',cacheper+'%');
}

function showMergeAnimation(i,j){
    var numberCell = $('#number-cell-' + i + "-" + j );
    // numberCell.animate({
    //     width:1.3*cellSideLength,
    //     height:1.3*cellSideLength,
    //     position:'relative'
    // },100);
    // numberCell.animate({
    //     width: cellSideLength,
    //     height: cellSideLength
    // },100);
    numberCell.addClass('shake-slow');
    numberCell.addClass('shake-constant');

    numberCell.animate({
        fontSize:cellSideLength
    },100);
}