#include <stdlib.h>
#include <stdio.h>
#include <ctype.h>
int main(){
    char a[1024];
    char b[1024];
    char* temp;
    int flag = 0;
    FILE *fp;
    fp = fopen("data.txt","r");
    char c;
    while((c=fgetc(fp))!=EOF){
        temp = a;
        while(c!=' ' && c != EOF){
            temp[0] = c;
            c = fgetc(fp);
            temp++;
        }
        c = fgetc(fp);
        c = toupper (c);
        temp[0]='\0';
        temp = b;
        while(c!='\n' && c != EOF){
            if(flag==1){
                c = toupper(c);
                flag=0;
            }
            if(c==' ')
                flag = 1;
            temp[0] = c;
            temp++;
            c = fgetc(fp);
        } 
        temp[0]='\0';
        printf("INSERT INTO loc VALUES ('%s','%s');\n",a,b);
    }
    fclose(fp);
}
        

