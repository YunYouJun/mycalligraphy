/**
 * Created by liuyubobobo on 14-4-11.
 * my site: http://www.liuyubobobo.com
 */
function showNumberWithAnimation( i , j , randNumber ){

    var numberCell = $('#number-cell-' + i + "-" + j );

    numberCell.css('background-color',getNumberBackgroundColor( randNumber ) );
    numberCell.css('color',getNumberColor( randNumber ) );
    numberCell.text( getNumberText( board[i][j] ) );

    numberCell.animate({
        width:cellSideLength,
        height:cellSideLength,
        top:getPosTop( i , j ),
        left:getPosLeft( i , j )
    },100);
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

    var cacheper = Math.abs((cache/81.92)-(score/20.48)); 
    $('#cache').attr('aria-valuenow',cacheper);
    $('#cache').css('width',cacheper+'%');
}
