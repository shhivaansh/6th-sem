#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#include<unistd.h>
#include<arpa/inet.h>

#define PORT 8080

int main(){
  int fd, new_socket;
  
  struct sockaddr_in addr;
  
  int len=sizeof(addr);
  
  char buffer[1024]={0};
  
  fd=socket(AF_INET, SOCK_STREAM, 0);
  if(fd<0){
    perror("Socket creation failed");
    exit(1);
  }
  
  addr.sin_family=AF_INET;
  addr.sin_addr.s_addr=INADDR_ANY;
  addr.sin_port=htons(PORT);
  
  if(bind(fd,(struct sockaddr*)&addr,sizeof(addr))<0){
    perror("Bind Failed");
    close(fd);
    exit(1);
  }
  
  if(listen(fd,1)<0){
    perror("Listen failed");
    close(fd);
    exit(1);
  }
  
  printf("Server is listening on port %d...\n",PORT);
  
  new_socket=accept(fd,(struct sockaddr*)&addr,(socklen_t*)&len);
  
  if(new_socket<0){
    perror("Action failed");
    close(fd);
    exit(1);
  }
  
  read(new_socket,buffer,sizeof(buffer));
  printf("Received message: %s\n",buffer);
  
  close(fd);
  close(new_socket);
  
  return 0;
}
