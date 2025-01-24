create database libreria;
use libreria;

create table libri (
    id INT auto_increment primary key,
    titolo VARCHAR(52) not null,
    autore VARCHAR(52) not null,
    genere VARCHAR(52) not null,
    prezzo DECIMAL(8,2) check (prezzo >= 0),
    anno_pubblicazione INT
);

select * from libri;

insert into libri(titolo, autore, genere, prezzo, anno_pubblicazione)
values ("Divina Commedia", "Dante Alighieri", "Fantasy", 10.99, 1300);