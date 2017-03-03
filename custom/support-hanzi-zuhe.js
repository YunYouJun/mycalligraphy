/**
 * Created by liuyubobobo on 14-4-11.
 * my site: http://www.liuyubobobo.com
 */

documentWidth = window.screen.availWidth;
gridContainerWidth = 0.92 * documentWidth;
cellSideLength = 0.18 * documentWidth;
cellSpace = 0.04*documentWidth;

function getPosTop( i , j ){
    return cellSpace + i*( cellSpace + cellSideLength );
}

function getPosLeft( i , j ){
    return cellSpace + j*( cellSpace + cellSideLength );
}

function getNumberBackgroundColor( number ){
    switch( number ){
        case 2:return "rgba(60,60,60,0.7)";break;
        case 4:return "rgba(80,80,80,0.7)";break;
        case 8:return "rgba(110,110,110,0.7)";break;
        case 16:return "rgba(140,140,140,0.7)";break;
        case 32:return "rgba(170,170,170,0.7)";break;
        case 64:return "rgba(180,180,180,0.7)";break;
        case 128:return "rgba(190,190,190,0.7)";break;
        case 256:return "rgba(210,210,210,0.8)";break;
        case 512:return "rgba(220,220,220,0.8)";break;
        case 1024:return "rgba(235,235,235,0.9)";break;
        case 2048:return "rgba(245,245,245,0.9)";break;
        case 4096:return "rgba(255,255,255,1)";break;
        // case 8192:return "#93c";break;
    }

    return "black";
}

function getNumberColor( number ){
    switch( number ){
        case 2:return "#AAA";break;
        case 4:return "#BBB";break;
        case 8:return "#CCC";break;
        case 16:return "#DDD";break;
        case 32:return "#EEE";break;
        case 64:return "#FFF";break;
        case 128:return "#505050";break;
        case 256:return "#444";break;
        case 512:return "#333";break;
        case 1024:return "#222";break;
        case 2048:return "#111";break;
        case 4096:return "#000";break;
        // case 8192:return "#93c";break;
    }
}

function getNumberText( number ){
    switch( number ){
        case 2:return "-";break;
        case 4:return "一";break;
        case 8:return "十";break;
        case 16:return "艹";break;
        case 32:return "日";break;
        case 64:return "田";break;
        case 128:return "用";break;
        case 256:return "韭";break;
        case 512:return "韱";break;
        case 1024:return "龍";break;
        case 2048:return "𪚥";break;
        case 4096:return "*";break;
        default:break;
    }

    return "black";
}

function nospace( board ){

    for( var i = 0 ; i < 4 ; i ++ )
        for( var j = 0 ; j < 4 ; j ++ )
            if( board[i][j] == 0 )
                return false;

    return true;
}

function canMoveLeft( board ){

    for( var i = 0 ; i < 4 ; i ++ )
        for( var j = 1; j < 4 ; j ++ )
            if( board[i][j] != 0 )
                if( board[i][j-1] == 0 || board[i][j-1] == board[i][j] )
                    return true;

    return false;
}

function canMoveRight( board ){

    for( var i = 0 ; i < 4 ; i ++ )
        for( var j = 2; j >= 0 ; j -- )
            if( board[i][j] != 0 )
                if( board[i][j+1] == 0 || board[i][j+1] == board[i][j] )
                    return true;

    return false;
}

function canMoveUp( board ){

    for( var j = 0 ; j < 4 ; j ++ )
        for( var i = 1 ; i < 4 ; i ++ )
            if( board[i][j] != 0 )
                if( board[i-1][j] == 0 || board[i-1][j] == board[i][j] )
                    return true;

    return false;
}

function canMoveDown( board ){

    for( var j = 0 ; j < 4 ; j ++ )
        for( var i = 2 ; i >= 0 ; i -- )
            if( board[i][j] != 0 )
                if( board[i+1][j] == 0 || board[i+1][j] == board[i][j] )
                    return true;

    return false;
}

function noBlockHorizontal( row , col1 , col2 , board ){
    for( var i = col1 + 1 ; i < col2 ; i ++ )
        if( board[row][i] != 0 )
            return false;
    return true;
}

function noBlockVertical( col , row1 , row2 , board ){
    for( var i = row1 + 1 ; i < row2 ; i ++ )
        if( board[i][col] != 0 )
            return false;
    return true;
}

function nomove( board ){
    if( canMoveLeft( board ) ||
        canMoveRight( board ) ||
        canMoveUp( board ) ||
        canMoveDown( board ) )
        return false;

    return true;
}

