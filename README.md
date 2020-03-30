# 0320_PHP_Correction_Atelier_PDO

## DATABASE

>
> CREATE DATABASE blog;
> USE blog;
>
> CREATE TABLE article(
> id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
> title VARCHAR(80),
> content TEXT,
> author VARCHAR(80)
> );
>

## CRUD pour article :

index.php => get all articles // SELECT * FROM article; GET
create.php => post on article // INSERT INTO article (title, content, author) VALUES (:title, :content, :author); // FORMULAIRE POST
edit.php => update on article // UPDATE artcile SET title=:title, content=:content, author=:author; // FORMULAIRE POST
delete.php => delete on article // DELETE FROM article WHERE id=:id; GET
