%{
#include <stdio.h>
int s=0, n=0, t=0, c=0, w=0;
%}
%%
\n      { n++; c+=yyleng; }
\t      { t++; c+=yyleng; }
[" "]   { s++; c+=yyleng; }
[a-zA-Z0-9]* { w++; c+=yyleng; }
.       { c+=1; }
%%
int yywrap(){
    return 1;
}

int main(){
    printf("Enter: ");
    yylex();
    printf("\nLines are: %d", n);
    printf("\nTabs are: %d", t);
    printf("\nSpaces are: %d", s);
    printf("\nCharacters: %d", c);
    printf("\nWords: %d", w);
    return 0;
}
