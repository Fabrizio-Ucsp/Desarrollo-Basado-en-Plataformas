#include "asteroide.h"
#include <bits/stdc++.h>
#include <conio.h>
#include "funciones.h"
using namespace std;
asteroide::asteroide(int _x,int _y){y=_y;x=_x;}
void asteroide::impast(){
	gotox(x,y);cout<<char(184);
}
void asteroide::mover(){
	gotox(x,y);cout<<" ";
	x--;
	if(x<2){
		y=rand()%30+4;
		x=99;
	}
	impast();
}
void asteroide::colision(navep &naveaux){
	if(y>=naveaux.y and y<=naveaux.y+4 and x>=naveaux.x and x<=naveaux.x+11){
		naveaux.corazon--;
		naveaux.impnav();
		naveaux.corazones();
		gotox(x,y);cout<<" ";
		y=rand()%30+4;
		x=99;
	}
}
void asteroide::reload(){x=rand()%9+90;y=rand()%31+4;}
int asteroide::X(){return x;}
int asteroide::Y(){return y;}
