class navep{
private:
	int x,y;
	int corazon;
	int vidas;
public:
	navep(int,int,int,int);
	void impnav();
	void bornav();
	void mover(char);
	void corazones();
	void muerte();
	int X();
	int Y();
	bool gameend();
	friend class asteroide;
};
