#include <iostream>
#include<vector>
#include<algorithm>
#include<cmath>
using namespace std;
int test(int x ){
    if (x == 0)
        return 0;
    else if (x == 1)
        return 1;
    else
        return  test(x-1)+test(x-2);
}

int gcd(int m, int n) {
    if(n == 0) {
        return m;
    }
    else {
            cout<<m<<" , ";
        return gcd(n, m % n);
    }
}
/**/
void myfunc( bool &show,int &tmp, vector <int> &v2){
    int j;
    show=false;
    while(tmp>0){

        for( j=0; j<v2.size(); j++) {
          if( v2[j]==tmp%10){
			 show=true;
			  v2[j]=-1;
			 tmp=tmp/10;
			 break;
           }
        }
        if(show==false)break;
        else if(tmp==0)break;
        else {show=false;}


   }
}

void cal(bool &show, int x, vector <int > &ans){
while(x){
        show=false;
        int tmp=x%10;
    for(int i=0;i<ans.size();i++){
        if(ans[i]==tmp){
            show=true;
            ans[i]=-1;
            break;
        }
    }
    x=x/10;
  if(!show) {break;}

  }
}


bool isVampire(int x, int y) {
  int sum=x*y;
  vector <int> ans;
  while(sum){
   ans.push_back(sum%10);
   sum=sum/10;
  }
  sort(ans.begin(),ans.end());
  bool show=false;

cal(show,x,ans);
cal(show,y,ans);
if(!show){return false;}
  return true;
}
int main()
{   vector <int> v1;
    int x=0;
    int j=0;
    /*
    while(cin>>x){
        int z=sqrt(x);
    int y=x;

    while(y){
        v1.push_back(y%10);
        y=y/10;

    }
    sort(v1.begin(),v1.end());
  //  for(unsigned  i=0; i<v1.size(); i++){cout << v1[i] << " ";}
      vector <int> v2=v1;
      bool show=false;


    for(int i=2;i<=z;i++)
    {v2=v1;

     show=false;
        if(x%i!=0){continue;}
        else{
             int tmp=x/i;
             int tmp2=i;
           myfunc(show,tmp, v2);

           if(show==false){ continue;}
           else{
              myfunc(show,tmp2,v2);
              if(show==false)continue;
               else{
                    cout<<"This is  vampire number";
                    break;

               }
           }
        }

    }
    }

   */

    int y=0;
    while(cin>>x>>y){
         cout<<isVampire(x,y)<<endl;
    }

    return 0;
}
