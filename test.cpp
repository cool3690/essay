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
void myfunc( bool show,int tmp ,vector <int> &v2){
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
        else{show=false;}


   }
}

bool func(int tmp ,vector <int> v2){
    int j;
    bool show=false;
 while(tmp>0){
                 for( j=0; j<v2.size(); j++) {
                    if(v2[j]==tmp%10){
                       show=true;
                       v2[j]=-1;
                       tmp=tmp/10;
                       break;
                    }
                 }
                 if(show==false)return false;

            }
        return true;
}
int main()
{   vector <int> v1;
    int x=0;
    cin>>x;
    int z=sqrt(x);
    int y=x;
    int j=0;
    while(y>0){
        v1.push_back(y%10);
        y=y/10;

    }
    sort(v1.begin(),v1.end());
  //  for(unsigned  i=0; i<v1.size(); i++){cout << v1[i] << " ";}
      vector <int> v2=v1;

bool show=false;



//cout<<show<<""<<endl;

 //for(unsigned  i=0; i<v2.size(); i++){cout << v2[i] << " ";}

    for(int i=2;i<=z;i++)
    {v2=v1;

     show=false;
        if(x%i!=0){continue;}
        else{
             int tmp=x/i;
             int tmp2=i;
             cout<<tmp<<"  "<<tmp2<<endl;
           myfunc(show,tmp,v2);
            for( j=0; j<v2.size(); j++) {

                    cout<<"  "<< v2[j]<<"  ";
                 }
                 cout<<endl;
           if(show==false){cout<<"PASS"<<endl;continue;}
           else{

              myfunc(show,tmp2,v2);
               for( j=0; j<v2.size(); j++) {

                    cout<<"  "<< v2[j]<<"  ";
                 }
                 cout<<endl;
             /*  if(show==false)continue;

               else{
                 for( j=0; j<v2.size(); j++) {
                   // if(v2[j]!=-1){show=false;break;}
                    cout<<i<< v2[j];
                 }
                 if(show==true){
                    cout<<"This is  vampire number";
                    break;
                 }
               }
               */
           }


        }

    }
  /*  */
    return 0;
}
