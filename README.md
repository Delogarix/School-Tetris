## Mini-tetris

### Building project

To build and test a new C++ file :
```bash
g++ .\main.cpp -o tetris2.exe -Wall -I include/ -L lib/Windows/ -lraylib -lgdi32 -lwinmm -lopengl32
```
To build and test the HTML document :
```bash
em++ -o tetris.html main.cpp -Os -Wall ./lib/Web/libraylib.a -I. -I ./include -L. -s USE_GLFW=3 --shell-file shell/shell.html -DPLATFORM_WEB
```

### Setup a database

First create a database named
```sql
tetris
```
And then add the LEADERBOARD table to it
Dont forget to change the passwd inside 'score.php'
