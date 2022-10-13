# PHP Vigenére rejtjelező

* Vigenère rejtjelező egy régimódi ma már nem használt titkosítási módszer. 
* A titkosításhoz szükséges egy titkos kulcs, melynek segítségével fejthetjük vissza az eredeti szöveget.

## Használat
* Szöveg titkosításához szükséges függvény meghívása. A visszatérő érték lesz a titkosított szöveg.
```
titkosit("Titkosítani kívánt szöveg","Titkos kulcs");
```
* Titkosított szöveg visszafejtése fügvénnyel. A visszatérő érték lesz a dekódolt szöveg
```
megfejt("Megfejteni kívánt szöveg","Titkos kulcs");
```
## Korlátok
* Jelenleg csak az angol ABC betűivel és számokkal működik.
* A szóköz eltávolításra kerül a titkosítás közben.
* Kis és nagybetű között nem tesz különbséget, mindenképpen nagybetűs eredmény érkezik vissza.
* ~~Semilyen írásjel nem használható, alkalmazása hibát okozhat.~~

Publikált változat:
<a href="https://benstudio.hu/generators/vigenere">Link</a>
