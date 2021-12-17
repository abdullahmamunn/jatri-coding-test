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
       for(j=size-1;j>=0;j--)
       {
           printf("%d ",ar[j][i]);

       }
       printf("\n");
    }
    return 0;

}
