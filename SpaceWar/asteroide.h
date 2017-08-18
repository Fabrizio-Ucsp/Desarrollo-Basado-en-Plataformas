class asteroide{
private:
	int x,y;
public:
	asteroide(int,int);
	void impast();
	void mover();
	void colision(navep&);
	void reload();
	int X();
	int Y();
};
