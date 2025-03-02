//Design a lex code to check whether an identifier is valid or invalid. 
//It can start either with an underscore or digit. Maximum length – 31. No special symbol

%{
    #include <stdio.h>
    int c = 0;
%}

%%
["_a-zA-Z"]["a-zA-Z0-9_"]* {
    c += yyleng;
    if (c <= 31 && c >= 3) {
        printf("Accepted");
    }
}
.* { printf("Rejected"); }
%%

int yywrap() {
    return 1;
}

int main() {
    printf("Enter: ");
    yylex();
    return 0;
}
