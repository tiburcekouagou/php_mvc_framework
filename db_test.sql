-- -------------------------------------------------
-- Base de données de test
-- -------------------------------------------------

--
-- Structure de la table
--

CREATE TABLE posts (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(120) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Données Test
--

INSERT INTO posts (title, content) VALUES 
('Premier article', 'Ceci est un article très intéressant'),
('Second article', 'Ceci est un article fascinant'),
('Troisième article', 'Ceci est un article éducatif');