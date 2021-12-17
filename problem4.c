        // 1 2 3    00 01 02 
        // 4 5 6    10 11 12
        // 7 8 9    20 21 22 

        // 7 4 1    20 10 00 
        // 8 5 2    21 11 01
        // 9 6 3    22 12 02
#include<stdio.h>
int main()
{
    int size;
    scanf("%d",&size);
    int ar[size][size];
    int i,j;
    for(i=0;i<size;i++)
    {
       for(j=0;j<size;j++)
       {
           scanf("%d",&ar[i][j]);
       }
    }
    for(i=0;i<size;i++)
    {
       for(j=size;j>=0;j--)
       {
           printf("%d ",ar[i][j]);
           printf("\n");
       }
    }
    return 0;
    
}