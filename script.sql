create database libreria;
use libreria;

create table autori (
	id INT auto_increment primary key,
	nome varchar(52)
);

create table generi (
	id INT auto_increment primary key,
	genere varchar(52)
);

create table libri (
    id INT auto_increment primary key,
    titolo VARCHAR(52) not null,
    autore int,
    genere int,
    prezzo DECIMAL(8,2) check (prezzo >= 0),
    anno_pubblicazione int,
    foreign key (autore) references autori(id),
    foreign key (genere) references generi(id)
);

INSERT INTO autori (nome) VALUES
('J.K. Rowling'),
('George R.R. Martin'),
('J.R.R. Tolkien'),
('Agatha Christie'),
('Stephen King');

INSERT INTO generi (genere) VALUES
('Fantasy'),
('Giallo'),
('Horror'),
('Fantascienza'),
('Romanzo Storico');

INSERT INTO libri (titolo, autore, genere, prezzo, anno_pubblicazione) VALUES
('Harry Potter e la Pietra Filosofale', 1, 1, 19.99, 1997),
('Il Trono di Spade', 2, 1, 25.00, 1996),
('Il Signore degli Anelli', 3, 1, 30.50, 1954),
('Assassinio sull\'Orient Express', 4, 2, 15.99, 1934),
('Shining', 5, 3, 20.00, 1977);