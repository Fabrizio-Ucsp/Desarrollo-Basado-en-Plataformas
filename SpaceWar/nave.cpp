#include "nave.h"
#include <bits/stdc++.h>
#include <windows.h>
#include <conio.h>
#include "funciones.h"
using namespace std;
navep::navep(int a,int b,int _corazon,int _vidas){
	x=a;
	y=b;
	corazon=_corazon;
	vidas=_vidas;
}
void navep::impnav(){
	gotox(x,y);cout<<"__";
	gotox(x,y+1);cout<<"| \\";
	gotox(x,y+2);cout<<"=[_|H)--._____";
	gotox(x,y+3);cout<<"=[+--,-------'";
	gotox(x,y+4);cout<<" [|_/\"\"";
}
void navep::bornav(){
	gotox(x,y);cout<<"  ";
	gotox(x,y+1);cout<<"   ";
	gotox(x,y+2);cout<<"              ";
	gotox(x,y+3);cout<<"              ";
	gotox(x,y+4);cout<<"       ";
}
void navep::mover(char in){
	bornav();
	if(in=='a' and x>2){x--;};
	if(in=='d'and x<86){x++;};
	if(in=='w' and y>4){y--;};
	if(in=='s'and y<30){y++;};
	if(in=='t'){corazon--;};
	impnav();
	corazones();
}
void navep::corazones(){
	gotox(50,2);cout<<"Vidas : "<<vidas;
	gotox(70,2);cout<<"Salud :     ";
	for(int i=0;i<corazon;i++){gotox(77+i,2);cout<<char(3);}
}
void navep::muerte(){
	if(corazon==0){
		bornav();
		gotox(x,y);cout<<"__";
		gotox(x,y+1);cout<<"| \\";
		gotox(x,y+2);cout<<"=[*******_____";
		gotox(x,y+3);cout<<"=*********---'";
		gotox(x,y+4);cout<<" [|*****";
		Sleep(200);
		bornav();
		gotox(x,y);cout<<"__";
		gotox(x,y+1);cout<<"|*\\     *";
		gotox(x,y+2);cout<<"=[++**++*___*_";
		gotox(x,y+3);cout<<"*=******+**-*'";
		gotox(x,y+4);cout<<" *++**++  *  .";
		Sleep(200);
		gotox(x,y);cout<<"   ";
		gotox(x,y+1);cout<<"         ";
		gotox(x,y+2);cout<<"              ";
		gotox(x,y+3);cout<<"              ";
		gotox(x,y+4);cout<<"              ";
		vidas--;
		corazon=3;
		corazones();
		impnav();
		
	}
}
int navep::X(){return x;}
int navep::Y(){return y;}
bool navep::gameend(){if(vidas==0){return true;}else{return false;}}
