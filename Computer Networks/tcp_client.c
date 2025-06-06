#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#include<unistd.h>
#include<arpa/inet.h>

#define PORT 8080

int main(){
  int fd;
  struct sockaddr_in addr;
  char* msg="HELLO FROM CLIENT";
  
  fd=socket(AF_INET,SOCK_STREAM,0);
  if(fd<0){
    perror("Socket creation failed");
    exit(1);
  }
  
  addr.sin_family=AF_INET;
  addr.sin_addr.s_addr=inet_addr("127.0.0.1");
  addr.sin_port=htons(PORT);
  
  if(connect(fd,(struct sockaddr*)&addr,sizeof(addr))<0){
    perror("Connection failed");
    close(fd);
    exit(1);
  }
  
  send(fd,msg,strlen(msg),0);
  printf("Message sent: %s\n",msg);
  
  close(fd);
  
  return 0;
}
