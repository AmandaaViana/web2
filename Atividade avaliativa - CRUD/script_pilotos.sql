CREATE TABLE piloto ( 
    id int AUTO_INCREMENT NOT NULL,  
    nome varchar(70) NOT NULL,   
    idade int NOT NULL, 
    id_equipe int NOT NULL,  /*Select*/
    id_montadora int NOT NULL, /*Select*/
    id_series int NOT NULL, /*Select*/
    CONSTRAINT pk_piloto PRIMARY KEY (id)
); 

CREATE TABLE equipe ( 
    id int AUTO_INCREMENT NOT NULL,  
    nome varchar(50) NOT NULL,
    CONSTRAINT pk_equipe PRIMARY KEY (id)
); 

CREATE TABLE montadora ( 
    id int AUTO_INCREMENT NOT NULL, 
    nome varchar(50) NOT NULL,   
    CONSTRAINT pk_carro PRIMARY KEY (id)
); 

CREATE TABLE series (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    CONSTRAINT pk_series PRIMARY KEY (id)
);

ALTER TABLE piloto ADD CONSTRAINT fk_equipe FOREIGN KEY (id_equipe) REFERENCES equipe (id);
ALTER TABLE piloto ADD CONSTRAINT fk_montadora FOREIGN KEY (id_montadora) REFERENCES montadora (id);
ALTER TABLE piloto ADD CONSTRAINT fk_series FOREIGN KEY (id_series) REFERENCES series (id);

INSERT INTO equipe (nome) 
VALUES ('Hendrick Motorsports'), ('Joe Gibbs Racing'), ('Team Penske'), ('23XI Racing'), ('Trackhouse Racing'), 
       ('Richard Childress Racing'), ('Wood Brothers Racing'), ('RFK Racing'), ('Richard Childress Racing'),
       ('Spire Motorsports'), ('Legacy Motor Club'), ('	Kaulig Racing');

INSERT INTO montadora (nome) 
VALUES ('Chevrolet'), ('Toyota'), ('Ford');

INSERT INTO series (nome) 
VALUES ('NASCAR Cup Series'),
       ('NASCAR Xfinity Series'),
       ('NASCAR Truck Series'),
       ('ARCA Menards Series');

ALTER TABLE piloto ADD COLUMN vitorias INT NOT NULL DEFAULT 0;